
{{csrf_field()}}

<a class="btn btn-primary" onclick="document.getElementById('upFile').click()">
    {{trans('import.file_choosing')}}
</a>
<input id="upFile" type="file" name="file" class="form-control"
       style="display:none;"
       onchange="document.getElementById('fileURL').value=this.value;"/>

<input id="fileURL" type="text" name="url" class="form-control"/>

<button class="btn btn-primary">
    {{trans('import.submit')}}
</button>