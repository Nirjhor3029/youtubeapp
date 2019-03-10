<?php
if(Auth::check()){
$totalquery = DB::table('wishlist')
->where('user_id', Auth::user()->id)
->where('status',0)
->count();
echo $totalquery;
}else{
  echo "0";
}
 ?>
