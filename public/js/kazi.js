$('#area,#timing,#city,#experience').select2();

$('#area,#city,#experience').change(function(){
  var city = $('#city').val();
  var area = $('#area').val();
  var experience = $('#experience').val();
  var timing = $('#timing').val();
  $.ajax({
    type: 'get',
    dataType: 'html',
    url: '/vendors/'+ catname,
    data: 'cat=' + cat + '&experience='+ experience + '&area=' + area,
    success:function(response){
      console.log(response);
      $(".productList").empty().html(response);
    }
  });
});
