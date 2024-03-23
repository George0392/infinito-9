


{{ Form::open(['class'=>'form-inline','route' => ['roles.index'],'method'=>'GET','autocomplete'=>'off', 'role'=>'search']) }}
  <div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control " name="searchtext" placeholder="Buscar rol">
		<span class="input-group-btn ">
			<button type="submit" class="btn  btn-primary" > <i class="fa fa-search"></i></button>
		</span>
	</div>
</div>
{{ Form::close() }}
