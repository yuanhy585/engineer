var CSRF_TOKEN = $('meta[name="_token"]').attr('content');

// linkage for shops.create view
$("#province_id").change(function(){
    var province_id = $('#province_id').val();
    // $.ajaxSetup({
    //     headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}
    // });
    $.ajax({
        type:'POST',
        url:'/ajax/province',
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

// linkage for shops.index view
$("#province_id").change(function(){
    var province_id = $("#province_id").val();
    $.ajax({
        type:'POST',
        url:'/ajax/province_city_correlation',
        data:
        {
            _token:CSRF_TOKEN,
            province_id:province_id
        },
        dataType:'json',
        success:function (data) {
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
        error:function (xhr, type) {
            alert('错误!');
        }
    });
});

// linkage for shops.myShop view
$("#province_id").change(function(){
    var province_id = $('#province_id').val();
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

//linkage for pro-city relation in orderCheck index view
$("#province_id").change(function(){
    var province_id = $('#province_id').value();
    $.ajax({
        type:'POST',
        url:'/ajax/province_city_correspondence',
        data:{
            _token:CSRF_TOKEN,
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
        error:function(xhr,type){
            alert("错误!");
        }
    });
});