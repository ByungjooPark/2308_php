@forelse ($errors->all() as $val)
<div id="errorMsg" class="form-text text-danger">{{$val}}</div>
@empty
@endforelse