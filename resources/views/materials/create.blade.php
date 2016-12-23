@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="page-title" style="font-size: 30px;">
            {{trans('material.material_create')}}
        </div>
        <br/><hr/>
        <form role="form" action="/materials" method="post">

            {{csrf_field()}}
            <div class="col-md-6">
                {{trans('material.special')}}:
                <select name="special" class="form-control">
                    @foreach($specials as $special)
                        <option>{{$special}}</option>
                    @endforeach
                </select>
                <br/>

                {{trans('material.category')}}:
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                        <option>{{$category}}</option>
                    @endforeach
                </select>
                <br/>

                {{trans('material.type')}}:
                <select name="type" class="form-control">
                    @foreach($types as $type)
                        <option>{{$type}}</option>
                    @endforeach
                </select>
                <br/>

                {{trans('material.name')}}:
                <input type="text" name="name" class="form-control"/>
                <br/>

                {{trans('material.price')}}:
                <input type="text" name="price" class="form-control"/>
                <br/>

                {{--<div class="form-inline">--}}
                    {{--{{trans('material.visible')}}:&nbsp;&nbsp;--}}
                    {{--<input type="radio" name="radio" id="radio1"/>{{trans('material.yes')}}--}}
                    {{--&nbsp;&nbsp;&nbsp;--}}
                    {{--<input type="radio" name="radio" id="radio2"/>{{trans('material.no')}}--}}
                {{--</div>--}}
                {{--<br/>--}}

                <div class="row">
                    <div class="col-md-8">
                        <div class="col-md-2 col-md-offset-5" style="float:left;">
                            <button type="submit" class="btn btn-primary">
                                {{trans('material.add_material')}}
                            </button>
                        </div>
                        <div class="col-md-2 col-md-offset-3" style="float:right;">
                            <a class="btn btn-warning" href="/materials">
                                {{trans('material.return')}}
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@stop