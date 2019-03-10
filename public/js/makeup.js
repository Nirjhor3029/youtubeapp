$('#experience,#home_service,#city').select2();
$('#price').ionRangeSlider({
  type: "single",
  min: 2000,
  max: 30000,
  step: 1000,
  grid: true,
  grid_snap: false,
  prefix:'&#x9f3; ',
  onFinish: function (data) {
    var city = $('#city').val();
    var experience = $('#experience').val();
    var home_service = $('#home_service').val();
    var price = $('#price').val();
    //var cat = catname;
    //console.log(price);
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '/vendors/'+catname,
      data: 'cat=' + cat + '&experience='+ experience + '&home_service=' + home_service + '&price=' + price,
      success:function(response){
        console.log(response);
        $(".productList").empty().html(response);
      }
    });
  },
});

$('#experience,#home_service,#city').change(function(){
  var experience = $('#experience').val();
  var city = $('#city').val();
  var home_service = $('#home_service').val();
  //var cat = '{{$catagorydata->name}}';
  var price = "";
  $.ajax({
    type: 'get',
    dataType: 'html',
    url: '/vendors/'+ catname,
    data: 'cat=' + cat + '&experience='+ experience + '&home_service=' + home_service + '&price=' + price,
    success:function(response){
      console.log(response);
      $(".productList").empty().html(response);
    }
  });
});
