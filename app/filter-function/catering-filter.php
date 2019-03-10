<?php
$city = "";
$experience = $request->experience;
$menu = $request->menu;
$price = $request->price;

// If experience present and menu,city null filter
if (isset($experience) && empty($menu) && empty($city) && empty($price)) {
  //echo "I am with experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->with('vendor')->get();
  }
}
// End, If experience present and menu,city null filter

// If menu present city,experience null filter
elseif (isset($menu) && empty($experience) && empty($city)) {
  //echo "I am with menu";
    $datas = $datas->where('menu_type','like','%'.$menu.'%')->with('vendor')->get();
}
// End, If menu present city,experience null filter

// If experience, menu present city null filter
elseif (isset($experience) && isset($menu) && empty($city) && empty($price)) {
  //echo "I am here with experience and menu";
  if ($experience == ">20") {
    $datas = $datas->where('menu_type','like','%'.$menu.'%')->where('feature_2','>',20);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('menu_type','like','%'.$menu.'%')->whereBetween('feature_2',[$explode[0],$explode[1]]);
  }
  $datas = $datas->with('vendor')->get();
}
//End, If experience, menu present city null filter



// If price present menu,experience null filter
elseif (isset($price) && empty($menu) && empty($experience) && empty($city)) {
  //echo "I am with price";
  $datas = $datas->where('low_price','>=',$price)->with('vendor')->get();
}
// End, If price present menu,experience null filter

// If price, menu present and experience null filter
elseif (isset($price) && isset($menu) && empty($experience) && empty($city)) {
  //echo "If price, menu present and experience,city null filter";

    $datas = $datas->where('low_price','>=',$price)->where('menu_type','like','%'.$menu.'%')->with('vendor')->get();


}
// End, If price, menu present and experience null filter

// If price, menu and experience present filter
elseif (isset($price) && isset($menu) && isset($experience) && empty($city)) {
  //echo "I am with price, menu and experience";
  if ($experience == ">20") {
    $datas = $datas->where('menu_type','like','%'.$menu.'%')->where('feature_2','>',20)->where('low_price','>=',$price);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('menu_type','like','%'.$menu.'%')->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price);
  }
  $datas = $datas->with('vendor')->get();
}
// If price, menu and experience present filter

// If price present and menu, experience null filter
elseif (isset($price) && empty($menu) && isset($experience)) {
  //echo "I am with price and experience";
  if ($experience == ">20") {
    $datas = $datas->where('feature_2','>',20)->where('low_price','>=',$price)->with('vendor')->get();
  }else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_2',[$explode[0],$explode[1]])->where('low_price','>=',$price)->with('vendor')->get();
  }
}

// If all empty
elseif (empty($price) && empty($menu) && empty($experience) && empty($city)) {
  $datas = $datas->with('vendor')->get()->all();
}
// End, If all empty

?>
