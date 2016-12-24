var CSRF_TOKEN = $('meta[name="_token"]').attr('content');

$("#province_id").change(function(){
    var province_id = $('#province_id').val();
    // $.ajaxSetup({
    //     headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}
    // });
    $.ajax({
        type:'POST',
        url:'/ajax/province',
        data:{_token: CSRF_TOKEN,province_id:province_id},
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
