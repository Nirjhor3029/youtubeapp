<?php
if(Auth::check()){
$totalquery = DB::table('inboxes')
->where('user_id', Auth::user()->id)
->where('is_open',0)
->count();
echo $totalquery;
}else{
  echo "0";
}
 ?>
