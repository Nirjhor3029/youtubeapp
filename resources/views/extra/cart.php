<?php
if(Auth::check()){
$totalquery = DB::table('query_cart')
->where('user_id', Auth::user()->id)
->count();
echo $totalquery;
}else{
  echo "0";
}
 ?>
