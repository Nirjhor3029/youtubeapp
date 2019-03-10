$('#experience,#speciality,#city').select2();
$('#price').ionRangeSlider({
  type: "single",
  min: 50,
  max: 500,
  step: 50,
  grid: true,
  grid_snap: false,
  prefix:'&#x9f3; ',
  onFinish: function (data) {
    var city = $('#city').val();
    var experience = $('#experience').val();
    var speciality = $('#speciality').val();
    var price = $('#price').val();
    //var cat = catname;
    //console.log(price);
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '/vendors/'+catname,
      data: 'cat=' + cat + '&experience='+ experience + '&speciality=' + speciality + '&price=' + price,
      success:function(response){
        console.log(response);
        $(".productList").empty().html(response);
      }
    });
  },
});

$('#experience,#speciality,#city').change(function(){
  var experience = $('#experience').val();
  var city = $('#city').val();
  var speciality = $('#speciality').val();
  //var cat = '{{$catagorydata->name}}';
  var price = "";
  $.ajax({
    type: 'get',
    dataType: 'html',
    url: '/vendors/'+ catname,
    data: 'cat=' + cat + '&experience='+ experience + '&speciality=' + speciality + '&price=' + price,
    success:function(response){
      console.log(response);
      $(".productList").empty().html(response);
    }
  });
});
