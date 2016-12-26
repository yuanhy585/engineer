@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <form class="form-inline" action="/material/data_import" method="post" role="form"
              enctype="multipart/form-data">

            {{csrf_field()}}
            <a class="btn btn-primary" onclick="document.getElementById('upfile').click()">
                {{trans('import.file_choosing')}}
            </a>

                <input type="text" id="fileURL" name="url" class="form-control"/>

                <input type="file" id="upfile" name="file" class="form-control"
                style="display: none;" onchange="document.getElementById('fileURL').value=this.value;"/>

                <button class="btn btn-primary">
                    {{trans('import.submit')}}
                </button>
        </form>
        {!! errors_for('file',$errors) !!}
    </div>
</div>

@stop