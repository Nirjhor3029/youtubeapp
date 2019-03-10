<?php
$city = "";
$experience = $request->experience;
$speciality = $request->speciality;
$price = $request->price;

// If experience present and speciality,city null filter
if (isset($experience) && empty($speciality) && empty($city) && empty($price)) {
  //echo "I am with experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->with('vendor')->get();
  }
}
// End, If experience present and speciality,city null filter

// If speciality present city,experience null filter
elseif (isset($speciality) && empty($experience) && empty($city)) {
  //echo "I am with speciality";
    $datas = $datas->where('speciality_type','like','%'.$speciality.'%')->with('vendor')->get();
}
// End, If speciality present city,experience null filter

// If experience, speciality present city null filter
elseif (isset($experience) && isset($speciality) && empty($city) && empty($price)) {
  //echo "I am here with experience and speciality";
  if ($experience == ">20") {
    $datas = $datas->where('speciality_type','like','%'.$speciality.'%')->where('feature_2','>',20);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('speciality_type','like','%'.$speciality.'%')->whereBetween('feature_2',[$explode[0],$explode[1]]);
  }
  $datas = $datas->with('vendor')->get();
}
//End, If experience, speciality present city null filter



// If price present speciality,experience null filter
elseif (isset($price) && empty($speciality) && empty($experience) && empty($city)) {
  //echo "I am with price";
  $datas = $datas->where('low_price','>=',$price)->with('vendor')->get();
}
// End, If price present speciality,experience null filter

// If price, speciality present and experience null filter
elseif (isset($price) && isset($speciality) && empty($experience) && empty($city)) {
  //echo "If price, speciality present and experience,city null filter";
    $datas = $datas->where('low_price','>=',$price)->where('speciality_type','like','%'.$speciality.'%')->with('vendor')->get();

}
// End, If price, speciality present and experience null filter

// If price, speciality and experience present filter
elseif (isset($price) && isset($speciality) && isset($experience) && empty($city)) {
  //echo "I am with price, speciality and experience";
  if ($experience == ">20") {
    $datas = $datas->where('speciality_type','like','%'.$experience.'%')->where('feature_2','>',20)->where('low_price','>=',$price);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('speciality_type','like','%'.$experience.'%')->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price);
  }
  $datas = $datas->with('vendor')->get();
}
// If price, speciality and experience present filter

// If price present and speciality, experience null filter
elseif (isset($price) && empty($speciality) && isset($experience)) {
  //echo "I am with price and experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->where('low_price','>=',$price)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price)->with('vendor')->get();
  }
}

// If all empty
elseif (empty($price) && empty($speciality) && empty($experience) && empty($city)) {
  $datas = $datas->with('vendor')->get()->all();
}
// End, If all empty

?>
