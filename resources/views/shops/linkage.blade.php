
<select id="region_id" name="region" class="form-control">
    <option value="">请选择大区</option>
    @foreach($regions as $id => $name)
        <option value="{{$id}}">
            {{$name}}
        </option>
    @endforeach
</select>
<select id="province_id" name="province" class="form-control">
    <option value="">请选择省份</option>
    @foreach($provinces as $id => $name)
        <option @if($id == $province_id) selected @endif
                value="{{$id}}">
            {{$name}}
        </option>
    @endforeach
</select>
<select id="city_id" name="city" class="form-control">
    <option value="">请选择城市</option>
    @foreach($cities as $id => $name)
        <option @if($id == $city_id) selected @endif
                value="{{$id}}">
            {{$name}}
        </option>
    @endforeach
</select>