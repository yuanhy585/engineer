@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <form class="form-inline" action="/province/data_import" method="post" role="form"
              enctype="multipart/form-data">

            {{ csrf_field() }}
            <div style="float: left;">
                <a class="btn btn-primary" onclick="document.getElementById('upfile').click();">
                    选择文件
                </a>
            </div>&nbsp;&nbsp;
            <div style="display: inline-block;">
                <input type="text" class="form-control" name="url" id="fileURL" />
            </div>&nbsp;
                <input class="form-control" type="file" name="file" id="upfile"
                       onchange="document.getElementById('fileURL').value=this.value;"
                style="display: none;">
                <button class="btn btn-primary">
                    确认
                </button>
        </form>
        {!! errors_for('file',$errors) !!}
    </div>
</div>
@stop
