<?php
$area = $request->area;
$capacity = $request->capacity;
$city = "";
$price = $request->price;

// If area present and capacity,city null filter
if (isset($area) && empty($capacity) && empty($price)) {
  //echo "I am with area";
  $datas = $datas->where('area','like','%'.$area.'%')->with('vendor')->get();
}
// End, If area present and capacity,city null filter

// If area, capacity present city null filter
elseif (isset($area) && isset($capacity) && empty($price)) {
  //echo "I am here with area and city";

  if ($capacity == '<100') {
    $datas = $datas->where('area','like','%'.$area.'%')->whereBetween('feature_3',[0,100]);
  }
  elseif ($capacity == '>1000') {
    $datas = $datas->where('area','like','%'.$area.'%')->where('feature_3','>',1000);
  }
  else{
    $explode = explode('-',$capacity);
    $datas = $datas->where('area','like','%'.$area.'%')->whereBetween('feature_3',[$explode[0],$explode[1]]);
  }

  $datas = $datas->with('vendor')->get();
}
//End, If area, capacity present city null filter

// If capacity present city,area null filter
elseif (isset($capacity) && empty($area) && empty($price)) {
  //echo "I am with capacity";
  if ($capacity == '<100') {
    $datas = $datas->whereBetween('feature_3',[0,100]);
  }
  elseif ($capacity == '>1000') {
    $datas = $datas->where('feature_3','>',1000);
  }
  else{
    $explode = explode('-',$capacity);
    $datas = $datas->whereBetween('feature_3',[$explode[0],$explode[1]]);
  }

  $datas = $datas->with('vendor')->get();
}
// End, If capacity present city,area null filter

// If price present capacity,area null filter
elseif (isset($price) && empty($capacity) && empty($area)) {
  $datas = $datas->where('low_price','>=',$price)->with('vendor')->get();
}
// End, If price present capacity,area null filter

// If price, capacity present and area null filter
elseif (isset($price) && isset($capacity) && empty($area)) {
  if ($capacity == '<100') {
    $datas = $datas->where('low_price','>=',$price)->whereBetween('feature_3',[0,100]);
  }
  elseif ($capacity == '>1000') {
    $datas = $datas->where('low_price','>=',$price)->where('feature_3','>',1000);
  }
  else{
    $explode = explode('-',$capacity);
    $datas = $datas->where('low_price','>=',$price)->whereBetween('feature_3',[$explode[0],$explode[1]]);
  }
    $datas = $datas->with('vendor')->get();
}
// End, If price, capacity present and area null filter

// If price present and capacity, area null filter
elseif (isset($price) && empty($capacity) && isset($area)) {
  $datas = $datas->where('area','=',$area)->where('low_price','>=',$price)->with('vendor')->get();
}

// If price, capacity and area present filter
elseif (isset($price) && isset($capacity) && isset($area)) {
  if ($capacity == '<100') {
    $datas = $datas->where('area','like','%'.$area.'%')->where('low_price','>=',$price)->whereBetween('feature_3',[0,100]);
  }
  elseif ($capacity == '>1000') {
    $datas = $datas->where('area','like','%'.$area.'%')->where('low_price','>=',$price)->where('feature_3','>',1000);
  }
  else{
    $explode = explode('-',$capacity);
    $datas = $datas->where('area','like','%'.$area.'%')->where('low_price','>=',$price)->whereBetween('feature_3',[$explode[0],$explode[1]]);
  }

  $datas = $datas->with('vendor')->get();
}
// If price, capacity and area present filter


elseif(empty($area) && empty($capacity) && empty($price)){
  $datas = $datas->with('vendor')->get()->all();
}
?>
