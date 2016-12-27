@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <form class="form-inline" action="/status/data_import" method="post"
                enctype="multipart/form-data" role="form">

            @include('import.import')

        </form>

        {!! errors_for('file',$errors) !!}

    </div>
</div>
@stop