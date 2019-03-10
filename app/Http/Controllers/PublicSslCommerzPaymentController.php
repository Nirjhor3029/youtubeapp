<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;

use App\Models\order;
use App\Models\my_vendors;
use App\Models\invoice;
use App\Models\sslorder;
use Illuminate\Routing\UrlGenerator;
use App\Http\Controllers;

session_start();

class PublicSslCommerzPaymentController extends Controller
{
    public function index(Request $request)
    {
        # Here you have to receive all the order data to initiate the payment.
        # Lets your oder transaction information are saving in a table called "orders"
        # In orders table order unique identity is "order_id","order_status" field contain status of the transaction, "grand_total" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        $post_data = array();
        $post_data['total_amount'] = $request->total; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $request->transid; // tran_id must be unique
        #Start to save these value  in session to pick in success page.
        $_SESSION['payment_values']['tran_id'] = $post_data['tran_id'];
        #End to save these value  in session to pick in success page.

        $server_name = $request->root() . "/";
        $post_data['success_url'] = $server_name . "success";
        $post_data['fail_url'] = $server_name . "fail";
        $post_data['cancel_url'] = $server_name . "cancel";

        # CUSTOMER INFORMATION
        $user = Auth::user();
        $post_data['cus_name'] = $user->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_phone'] = $user->contact;
        // $post_data['cus_add1'] = 'Customer Address';
        // $post_data['cus_add2'] = "";
        // $post_data['cus_city'] = "";
        // $post_data['cus_state'] = "";
        // $post_data['cus_postcode'] = "";
        // $post_data['cus_country'] = "Bangladesh";
        // $post_data['cus_fax'] = "";
        # SHIPMENT INFORMATION
        // $post_data['ship_name'] = 'ship_name';
        // $post_data['ship_add1 '] = 'Ship_add1';
        // $post_data['ship_add2'] = "";
        // $post_data['ship_city'] = "";
        // $post_data['ship_state'] = "";
        // $post_data['ship_postcode'] = "";
        // $post_data['ship_country'] = "Bangladesh";
        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b'] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        #Get the order ids with comma separated value
        $orders = order::where("user_id", "=", $user->id)->where('temp_add', '=', 1)->where('payment_type', 0)->where('online_paid', 0)->pluck('id')->implode(',');

        #Insert data to the final sslorder table
        $ssl = new sslorder;
        $ssl->currency = $post_data['currency'];
        $ssl->total_amount = $request->total;
        $ssl->tran_id = $request->transid;
        $ssl->cus_name = $user->name;
        $ssl->cus_email = $user->email;
        $ssl->cus_phone = $user->contact;
        $ssl->order_id = $orders;
        $ssl->order_status = 'Pending';
        $ssl->save();
        $_SESSION['wire_id'] = $ssl->id;

        $sslc = new SSLCommerz();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->initiate($post_data, false);
        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {
        //return $request;
        //echo "Transaction is Successful";
        //exit;
        $sslc = new SSLCommerz();

        //dd($sslc) ;
        #Start to received these value from session. which was saved in index function.
        $tran_id = $_SESSION['payment_values']['tran_id'];

        #End to received these value from session. which was saved in index function.
        #Check order status in order tabel against the transaction id or order id.
        $order_detials = sslorder::where('tran_id', $tran_id)->first();
        //dd($order_detials);
        if ($order_detials->order_status == 'Pending') {
            $validation = $sslc->orderValidate($tran_id, $order_detials->total_amount, $order_detials->currency, $request->all());
            //dd($validation);
            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_sslorder = sslorder::where('tran_id', $tran_id)
                    ->update(['order_status' => 'Complete']);
                echo "<br >Validated - Transaction is successfully Complete";

                //exit;
                /*
                Update the invoice table and order table, like bkash transaction table and URL redirect to your prefer location
                */
                $user = Auth::user();

                $datas = order::where("user_id", "=", $user->id)->where('temp_add', '=', 1)->where('payment_type', 0)->where('online_paid', 0)->with('catagory')->with('vendor')->with('product')->get();
                $orders = order::where("user_id", "=", $user->id)->where('temp_add', '=', 1)->where('payment_type', 0)->where('online_paid', 0)->pluck('id')->implode(',');

                // Add Invoice with bkash Id and order Id
                $newinvoice = new invoice;
                $newinvoice->wire_id = $_SESSION['wire_id'];
                $newinvoice->orders_id = $orders;
                $newinvoice->save();
                // get the latest inserted row id from invoice table
                $order_invoice = $newinvoice->id;

                // Update the order table
                foreach ($datas as $data) {
                    $neworder = order::find($data->id);
                    $neworder->payment_type = 1;
                    $neworder->online_paid = 1;
                    $neworder->temp_add = 2;
                    $neworder->invoice_id = $order_invoice;
                    $neworder->save();

                    $addmyvendor = new my_vendors;
                    $addmyvendor->user_id = $user->id;
                    if (count($data->vendor) > 0) {
                        $addmyvendor->vendors_name = $data->vendor->title;
                        $addmyvendor->contact_details = $data->vendor->contact;
                    } elseif (count($data->product) > 0) {
                        $addmyvendor->vendors_name = $data->product->title;
                        $addmyvendor->vendors_name = $data->product->contact;
                    }
                    $addmyvendor->catagory = $data->catagory->name;
                    $addmyvendor->service_time = $data->time;
                    $addmyvendor->service_date = $data->order_date;
                    $addmyvendor->total_payment = $data->total;
                    $addmyvendor->advance_payment = $data->advance;
                    $addmyvendor->due_payment = $data->total - $data->advance;
                    $addmyvendor->save();
                }
               // return redirect()->route('checkout', ['payment' => 2]);
               // return redirect()->route('checkout', ['payment' => 2]);

                /*nir code*/
                $tranDetail_directFromSSL = [
                  'tran_id' => $request->tran_id,
                  'card_type' => $request->card_type,
                  'tran_date' => $request->tran_date,
                  'currency' => $request->currency,
                  'currency_type' => $request->currency_type,
                  'val_id' => $request->val_id,
                  'currency_amount' => $request->currency_amount,
                ];
                return view('user.success')
                    ->with('tran_id',$tran_id)
                    ->with('tranDetail_directFromSSL',$tranDetail_directFromSSL)
                    ->with('order_detials',$order_detials);

                /*return redirect()->route('paySuccess', Auth::user()->id)
                    ->with('tran_id',$tran_id)
                    ->with('order_detials',$order_detials);*/

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table. Reroute to where needed
                */
                $update_product = sslorder::where('tran_id', $tran_id)
                    ->update(['order_status' => 'Failed']);
                echo "Validation Fail";
            }
        } else if ($order_detials->order_status == 'Processing' || $order_detials->order_status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Complete";
            return redirect()->route('payment');
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }

    }

    public function fail(Request $request)
    {
        $tran_id = $_SESSION['payment_values']['tran_id'];
        $order_detials = sslorder::where('tran_id', $tran_id)->first();
        if ($order_detials->order_status == 'Pending') {
            $update_product = sslorder::where('tran_id', $tran_id)
                ->update(['order_status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->order_status == 'Processing' || $order_detials->order_status == 'Complete') {
            echo "Fail - Transaction is already Successful";
        } else {
            echo "Fail - Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $_SESSION['payment_values']['tran_id'];
        $order_detials = sslorder::where('tran_id', $tran_id)->first();
        if ($order_detials->order_status == 'Pending') {
            $update_product = sslorder::where('tran_id', $tran_id)
                ->update(['order_status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->order_status == 'Processing' || $order_detials->order_status == 'Complete') {
            echo "Cancel - Transaction is already Successful";
        } else {
            echo "Cancel -Transaction is Invalid";
        }

    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {
            $tran_id = $request->input('tran_id');
            #Check order status in order tabel against the transaction id or order id.
            $order_details = sslorder::where('tran_id', $tran_id)->first();
            if ($order_details->order_status == 'Pending') {
                $sslc = new SSLCommerz();
                $validation = $sslc->orderValidate($tran_id, $order_details->grand_total, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successfull transaction to customer
                    */
                    $update_product = sslorder::where('tran_id', $tran_id)
                        ->update(['order_status' => 'Complete']);

                    echo "IPN - Transaction is successfully Complete";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = sslorder::where('tran_id', $tran_id)
                        ->update(['order_status' => 'Failed']);

                    echo "IPN - Validation Fail";
                }

            } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Complete";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Inavalid Data";
        }
    }
}
