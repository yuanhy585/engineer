@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="page-title" style="font-size: 30px;">
                {{trans('material.material_edit')}}
            </div>
            <br/><hr/>
            <form role="form" action="/materials/{{$material->id}}/update" method="post">

                {{csrf_field()}}
                <div class="col-md-6">
                    {{trans('material.special')}}:
                    <select name="special" class="form-control">
                        @foreach($specials as $special)
                            <option @if($material->special == $special) selected @endif
                            value="{{$material->special}}">
                                {{$special}}
                            </option>
                        @endforeach
                    </select>
                    <br/>

                    {{trans('material.category')}}:
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option @if($material->category == $category) selected @endif
                            value="{{$material->category}}">
                                {{$category}}
                            </option>
                        @endforeach
                    </select>
                    <br/>

                    {{trans('material.type')}}:
                    <select name="type" class="form-control">
                        @foreach($types as $type)
                            <option @if($material->type == $type) selected @endif
                            value="{{$material->type}}">
                                {{$type}}
                            </option>
                        @endforeach
                    </select>
                    <br/>

                    {{trans('material.name')}}:
                    <input type="text" name="name" class="form-control"
                           value="{{$material->name}}"/>
                    <br/>

                    {{trans('material.price')}}:
                    <input type="text" name="price" class="form-control"
                           value="{{$material->price}}"/>
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
                                    {{trans('material.submit')}}
                                </button>
                            </div>
                            <div class="col-md-2 col-md-offset-3" style="float:right;">
                                <a class="btn btn-warning" href="/materials">
                                    {{trans('material.cancel')}}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@stop