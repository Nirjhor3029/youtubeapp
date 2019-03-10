<?php
$area = $request->area;
$experience = $request->experience;
$city = "";
$timing = $request->timing;

// If area present and experience,city,timing null filter
if (isset($area) && empty($experience) && empty($city)) {
  //echo "I am with area";
  $datas = $datas->where('area','like','%'.$area.'%')->with('vendor')->get();
}
// End, If area present and experience,city,timing null filter

// If experience present city,area,timing null filter
elseif (isset($experience) && empty($area) && empty($city)) {
  //echo "I am with experience";
  if ($experience == '>20') {
    $datas = $datas->where('feature_1','>',20)->with('vendor')->get();
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->whereBetween('feature_1',[$explode[0],$explode[1]])->with('vendor')->get();
  }
}
// End, If experience present city,area,timing null filter


// If area, experience present city, timing null filter
elseif (isset($area) && isset($experience) && empty($city)) {
  //echo "I am here with area and experience";
  if ($experience == '>20') {
    $datas = $datas->where('area','like','%'.$area.'%')->where('feature_1','>',20);
  }
  else{
    $explode = explode('-',$experience);
    $datas = $datas->where('area','like','%'.$area.'%')->whereBetween('feature_1',[$explode[0],$explode[1]]);
  }
  $datas = $datas->with('vendor')->get();
}
//End, If area, experience present city null filter

// If all empty
elseif(empty($experience) && empty($area) && empty($city)){
  $datas = $datas->with('vendor')->get()->all();
}
//End, if all empty

?>
