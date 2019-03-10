<?php
$experience = $request->experience;
$city = "";
$price = $request->price;

// If experience present and light,city null filter
if (isset($experience) && empty($city) && empty($price)) {
  //echo "I am with experience";
  if ($experience == '>20') {
    $datas = $datas->where('feature_2','>',20);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]]);
  }
  $datas = $datas->with('vendor')->get();
}
// End, If experience present and light,city null filter


// If price present light,experience null filter
elseif (isset($price) && empty($city) && empty($experience)) {
  //echo "I am with price";
  $datas = $datas->where('low_price','>=',$price)->with('vendor')->get();
}
// End, If price present light,experience null filter


// If price present and light, experience null filter
elseif (isset($price) && isset($experience)) {
  echo "I am with price and experience";
  if ($experience == '>20') {
    $datas = $datas->where('feature_2','>',20)->where('low_price','>=',$price);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price);
  }
  $datas = $datas->with('vendor')->get();
}

// If all empty
elseif(empty($price) && empty($light) && empty($experience) && empty($city)){
$datas = $datas->with('vendor')->get()->all();
}
// End, If all empty
?>
