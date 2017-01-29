var CSRF_TOKEN = $('meta[name="_token"]').attr('content');

// linkage for shops.create/index/myShop & orderCheck.index &
//          sale.create/edit view
$("#province_id").change(function(){
    var province_id = $('#province_id').val();
    // $.ajaxSetup({
    //     headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}
    // });
    $.ajax({
        type:'POST',
        url:'/ajax/province_city',
        data:{
            _token: CSRF_TOKEN,
            province_id:province_id
        },
        dataType:'json',
        success:function(data){
            var strCity = '';
            $.each(data,function(i){
                strCity += '<option value="';
                strCity += data[i].id;
                strCity += '">';
                strCity += data[i].name;
                strCity += '</option>';
            });
            $('#city_id').html('');
            $('#city_id').append(strCity);
        },
        error:function(xhr, type){
            alert('错误！')
        }
    });
});

// linage for type and name in materialAdd&materialEdit view
$("#type").change(function(){
    var type = $('#type').val();
    $.ajax({
        type:'POST',
        url:'/ajax/type_name',
        data:{
            _token:CSRF_TOKEN,
            type:type
        },
        dataType:'json',
        success:function(data){
            var strName = '';
            $.each(data, function(i){
                strName += '<option value="';
                strName += data[i].id;
                strName += '">';
                strName += data[i].name;
                strName += '</option>';
            });
            $('#name').html('');
            $('#name').append(strName);
        },
        error:function(xhr,type){
            alert('错误！');
        }
    });
});
















