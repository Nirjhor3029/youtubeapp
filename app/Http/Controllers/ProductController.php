<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\HotOffers;
use App\Models\catagory;
use App\Models\product_image;
use File;

class ProductController extends Controller
{



    /**
     *  for path [ is it running on live ?   ]
     **/


    public function getPath(){
        $pattern ="/.com/";
        $server_name = $_SERVER['SERVER_NAME'];
        //echo "Server Name:".$server_name;

        $path = public_path();

        if(preg_match($pattern,$server_name)){

            $path = str_replace("ayojok_base/public", "public_html", $path);
        }
        //echo "<br> $path";
        return $path;
    }


    public function index()
    {
        $datas = catagory::where('is_service',0)->get();

        //badge
        $badges = array();
        $i = 0;
        foreach($datas as $data){
            $badges[$i] = products::where('catagory_id',$data->id)->count();
            $i++;
        }

        return view('admin.product_categories',compact('datas','badges'));
    }
    public function index2($id)
    {
        //echo $id;
        //exit;
        $datas = products::where('catagory_id',$id)->with('catagory')->get();
        return view('admin.products',compact('datas'));
    }


    public function create()
    {
        $catagories = catagory::where('is_service',0)->where('status',1)->get();
        return view('admin.add-service',compact('catagories'));
    }


    public function store(Request $request)
    {

        //dd($request->all());
        $add = new Products;
        $add->catagory_id = $request->service_catagory;
        $add->title = $request->service_title;
        $add->short_des = $request->short_description;
        $add->long_des = $request->long_description;
        $add->contact = $request->seller_contact;
        $add->price = $request->service_price;
        $add->suffix = $request->price_suffix;
        $add->save();

        $image = $request->file('feature_image');
        $path = $this->getPath();
        $destinationPath = $path.'/img/ayojok-product/profile/';
        $input['imagename'] = $add->id.'.'.$image->getClientOriginalExtension();

        $image->move($destinationPath, $input['imagename']);

        $fileurl = 'img\ayojok-product\profile\\'.$input['imagename'];

        Products::where('id',$add->id)->update(['image' => $fileurl]) ;

        if($request->hasFile('extra_image')){
            $i = 0;
            $path = $this->getPath();
            $destinationPath = $path.'/img/ayojok-product/';
            foreach ($request->extra_image as $extra_image) {
                $i++;
                $input['imagename'] = $add->id.'_img'.$i.'.'.$extra_image->getClientOriginalExtension();

                $extra_image->move($destinationPath, $input['imagename']);

                $fileurl = 'img\ayojok-product\\'.$input['imagename'];

                $addimg = new product_image;
                $addimg->products_id = $add->id;
                $addimg->img_location = $fileurl;
                $addimg->save() ;
            }
        }
        return redirect()->back();
    }


    public function show($id)
    {
        $datas = Products::where('id',$id)->with('catagory')->with('images')->get();
        //dd($datas);
        return view('admin.products-single',compact('datas'));
    }


    public function edit($id)
    {
        $datas = Products::where('id',$id)->with('catagory')->with('images')->get();
        $catagories = catagory::where('is_service',0)->where('status',1)->get();
        //dd($productimage);
        return view('admin.products-edit',compact('datas','catagories'));
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());
        $add = Products::find($id);
        $add->title = $request->service_title;
        $add->short_des = $request->short_description;
        $add->long_des = $request->long_description;
        $add->contact = $request->seller_contact;
        $add->price = $request->service_price;
        $add->suffix = $request->price_suffix;
        $add->save();

        if($request->hasFile('feature_image')){

            $path = $this->getPath();
            $destinationPath = $path.'/img/ayojok-product/profile/';

            /**   Delete feature image from directory **/
            $featpath = $path.'\\'.$add->image;
            $featpath = str_replace("\\",'/', $featpath);
            if(File::exists($featpath)){
                File::delete($featpath);
            }

            //File::delete($add->image);

            /** Add the new image file **/
            $image = $request->file('feature_image');
            $input['imagename'] = $add->id.'.'.$image->getClientOriginalExtension();

            $image->move($destinationPath, $input['imagename']);

            $fileurl = 'img\ayojok-product\profile\\'.$input['imagename'];

            Products::where('id',$add->id)->update(['image' => $fileurl]) ;
        }



        if($request->hasFile('extra_image')){

            $dels = product_image::where('products_id',$id)->get();

            $path = $this->getPath();
            $destinationPath = $path.'/img/ayojok-product/';

            foreach ($dels as $del) {

                /** Activate on live server, Delete feature image from directory **/
                $extrapath = $path.'\\'.$del->img_location;
                $extrapath = str_replace("\\",'/', $extrapath);
                if(File::exists($extrapath)){
                    File::delete($extrapath);
                }
                /** End of active on live server **/
                //File::delete($del->img_location);
            }
            $delete = product_image::where('products_id',$id)->delete();

            $i = 0;
            foreach ($request->extra_image as $extra_image) {
                $i++;
                $input['imagename'] = $add->id.'_img'.$i.'.'.$extra_image->getClientOriginalExtension();

                $extra_image->move($destinationPath, $input['imagename']);

                $fileurl = 'img\ayojok-product\\'.$input['imagename'];

                $addimg = new product_image;
                $addimg->products_id = $add->id;
                $addimg->img_location = $fileurl;
                $addimg->save() ;
            }
        }
        return redirect()->back();
    }


    public function destroy($id)
    {

        $remove = Products::find($id);


        /*Delete image*/
        $path = $this->getPath();
        $destinationPath = $path.'/img/ayojok-product/profile/';

        /**   Delete feature image from directory **/
        $featpath = $path.'\\'.$remove->image;
        $featpath = str_replace("\\",'/', $featpath);
        if(File::exists($featpath)){
            File::delete($featpath);
        }

        /**Delete extra images =>  multi image**/
        $destinationPath = $path.'/img/ayojok-product/';

        $dels = product_image::where('products_id',$id)->get();


        foreach ($dels as $del) {

            /** Activate on live server, Delete feature image from directory **/
            $extrapath = $path.'\\'.$del->img_location;
            $extrapath = str_replace("\\",'/', $extrapath);
            if(File::exists($extrapath)){
                File::delete($extrapath);
            }
            /** End of active on live server **/
            //File::delete($del->img_location);
        }

        $remove->delete();

        return redirect()->route('service.index');
    }
    public function suspend($id)
    {
        $remove = Products::find($id);
        $remove->status = 1;
        $remove->save();

        return redirect()->route('service.index');
    }

    public function active($id)
    {
        $remove = Products::find($id);
        $remove->status = 0;
        $remove->save();

        return redirect()->route('service.index');
    }
}
