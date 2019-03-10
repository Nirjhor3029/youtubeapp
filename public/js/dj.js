$('#experience,#light,#city').select2();
$('#price').ionRangeSlider({
  type: "single",
  min: 5000,
  max: 200000,
  step: 5000,
  grid: true,
  grid_snap: false,
  prefix:'&#x9f3; ',
  onFinish: function (data) {
    var city = $('#city').val();
    var experience = $('#experience').val();
    var light = $('#light').val();
    var price = $('#price').val();
    //var cat = catname;
    //console.log(price);
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '/vendors/'+catname,
      data: 'cat=' + cat + '&experience='+ experience + '&light=' + light + '&price=' + price,
      success:function(response){
        console.log(response);
        $(".productList").empty().html(response);
      }
    });
  },
});

$('#experience,#light,#city').change(function(){
  var experience = $('#experience').val();
  var city = $('#city').val();
  var light = $('#light').val();
  //var cat = '{{$catagorydata->name}}';
  var price = "";
  $.ajax({
    type: 'get',
    dataType: 'html',
    url: '/vendors/'+ catname,
    data: 'cat=' + cat + '&experience='+ experience + '&light=' + light + '&price=' + price,
    success:function(response){
      console.log(response);
      $(".productList").empty().html(response);
    }
  });
});
