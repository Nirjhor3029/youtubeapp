<?php
$city = "";
$experience = $request->experience;
$event_type = $request->event_type;
$price = $request->price;

// If experience present and event_type,city null filter
if (isset($experience) && empty($event_type) && empty($price)) {
  //echo "I am with experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->with('vendor')->get();
  }
}
// End, If experience present and event_type,city null filter

// If event_type present city,experience null filter
elseif (isset($event_type) && empty($experience) && empty($city)) {
  //echo "I am with event_type";
    $datas = $datas->where('event_type','like','%'.$event_type.'%')->with('vendor')->get();
}
// End, If event_type present city,experience null filter

// If experience, event_type present city null filter
elseif (isset($experience) && isset($event_type) && empty($price)) {
  //echo "I am here with experience and event_type";
  if ($experience == ">20") {
    //echo $event_type."+ 1-20";
    $datas = $datas->where('event_type','like','%'.$event_type.'%')->where('feature_2','>',20);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('event_type','like','%'.$event_type.'%')->whereBetween('feature_2',[$explode[0],$explode[1]]);
  }
  $datas = $datas->with('vendor')->get();
}
//End, If experience, event_type present city null filter



// If price present event_type,experience null filter
elseif (isset($price) && empty($event_type) && empty($experience)) {
  //echo "I am with price";
  $datas = $datas->where('low_price','>=',$price)->with('vendor')->get();
}
// End, If price present event_type,experience null filter

// If price, event_type present and experience null filter
elseif (isset($price) && isset($event_type) && empty($experience)) {
  //echo "If price, event_type present and experience,city null filter";
    $datas = $datas->where('low_price','>=',$price)->where('event_type','like','%'.$event_type.'%')->with('vendor')->get();

}
// End, If price, event_type present and experience null filter

// If price, event_type and experience present filter
elseif (isset($price) && isset($event_type) && isset($experience)) {
  //echo "I am with price, event_type and experience";
  if ($experience == ">20") {
    $datas = $datas->where('event_type','like','%'.$event_type.'%')->where('feature_2','>',20)->where('low_price','>=',$price);
  }
  else{
    $explode = explode('-',$experience);
    $datas->where('event_type','like','%'.$event_type.'%')->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price);
  }
  $datas = $datas->with('vendor')->get();
}
// If price, event_type and experience present filter

// If price present and event_type, experience null filter
elseif (isset($price) && empty($event_type) && isset($experience)) {
  //echo "I am with price and experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->where('low_price','>=',$price)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price)->with('vendor')->get();
  }
}

// If all empty
elseif (empty($price) && empty($event_type) && empty($experience) && empty($city)) {
  $datas = $datas->with('vendor')->get()->all();
}
// End, If all empty

?>
