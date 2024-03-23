<div class="row d-flex">
	@if(count($errors)>0)
	@foreach($errors->all() as $error)
<button type="button" class="btn btn-danger">

  {{ $error }} <span class="badge badge-light"></span>

  @endforeach
  @endif
</button>
</div>