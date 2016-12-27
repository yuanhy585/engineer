@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <form class="form-inline" action="/province/data_import" method="post" role="form"
              enctype="multipart/form-data">

            @include('import.import')

        </form>
        {!! errors_for('file',$errors) !!}
    </div>
</div>
@stop
