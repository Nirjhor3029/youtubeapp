$('#area,#capacity,#city').select2();
$('#price').ionRangeSlider({
  type: "single",
  min: 0,
  max: 1000000,
  step: 10000,
  grid: true,
  grid_snap: false,
  prefix:'&#x9f3; ',
  onFinish: function (data) {
      var city = $('#city').val();
      var area = $('#area').val();
      var capacity = $('#capacity').val();
      var price = $('#price').val();
      //var cat = catname;
        //console.log(price);
        $.ajax({
          type: 'get',
          dataType: 'html',
          url: '/vendors/'+catname,
          data: 'cat=' + cat + '&area='+ area + '&capacity=' + capacity + '&price=' + price,
          success:function(response){
            console.log(response);
            $(".productList").empty().html(response);
          }
        });
},
});

$('#area,#capacity,#city').change(function(){
  var area = $('#area').val();
  var city = $('#city').val();
  var capacity = $('#capacity').val();
  //var cat = '{{$catagorydata->name}}';
  var price = 0;
  $.ajax({
    type: 'get',
    dataType: 'html',
    url: '/vendors/'+ catname,
    data: 'cat=' + cat + '&area='+ area + '&capacity=' + capacity + '&price=' + price,
    success:function(response){
      console.log(response);
      $(".productList").empty().html(response);
    }
  });
});
