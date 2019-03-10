<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 3/3/2019
 * Time: 2:15 PM
 */

use Illuminate\Support\Facades\Auth;
if(Auth::check()){
    $totalquery = DB::table('query_cart')
        ->where('user_id', Auth::user()->id)
        ->where('status',1)
        ->count();
    echo $totalquery;
}else{
    echo "0";
}
?>