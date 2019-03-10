<?php
$city = "";
$experience = $request->experience;
$home_service = $request->home_service;
$price = $request->price;

// If experience present and home_service,city null filter
if (isset($experience) && empty($home_service) && empty($price)) {
  //echo "I am with experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->with('vendor')->get();
  }
}
// End, If experience present and home_service,city null filter

// If home_service present city,experience null filter
elseif (isset($home_service) && empty($experience)) {
  //echo "I am with home_service";
    $datas = $datas->where('feature_3','=',$home_service)->with('vendor')->get();
}
// End, If home_service present city,experience null filter

// If experience, home_service present city null filter
elseif (isset($experience) && isset($home_service) && empty($price)) {
  //echo "I am here with experience and home_service";
  if ($experience == ">20") {
    $datas = $datas->where('feature_3','=',$home_service)->where('feature_2','>',20);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('feature_3','=',$home_service)->whereBetween('feature_2',[$explode[0],$explode[1]]);
  }
  $datas = $datas->with('vendor')->get();
}
//End, If experience, home_service present city null filter



// If price present home_service,experience null filter
elseif (isset($price) && empty($home_service) && empty($experience)) {
  //echo "I am with price";
  $datas = $datas->where('low_price','>=',$price)->with('vendor')->get();
}
// End, If price present home_service,experience null filter

// If price, home_service present and experience null filter
elseif (isset($price) && isset($home_service) && empty($experience)) {
  echo "If price, home_service present and experience,city null filter";
    $datas = $datas->where('low_price','>=',$price)->where('feature_3','=',$home_service)->with('vendor')->get();

}
// End, If price, home_service present and experience null filter

// If price, home_service and experience present filter
elseif (isset($price) && isset($home_service) && isset($experience)) {
  //echo "I am with price, home_service and experience";
  if ($experience == ">20") {
    //echo "fixed,1-20";
    $datas = $datas->where('feature_3','=',$home_service)->where('feature_2','>',20)->where('low_price','>=',$price);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('feature_3','=',$home_service)->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price);
  }
  $datas = $datas->with('vendor')->get();
}
// If price, home_service and experience present filter

// If price present and home_service, experience null filter
elseif (isset($price) && empty($home_service) && isset($experience)) {
  //echo "I am with price and experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->where('low_price','>=',$price)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price)->with('vendor')->get();
  }
}

// If all empty
elseif (empty($price) && empty($home_service) && empty($experience) && empty($city)) {
  $datas = $datas->with('vendor')->get()->all();
}
// End, If all empty

?>
