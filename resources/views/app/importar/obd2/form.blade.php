<div class="card mt-3">
	<div class="card-body">
		<div class="row">
			


			<div class="col-md-9">				
				


				{!! Form::open(['url' => 'foo/bar']) !!}

   {{ Form::label('Ruta del archivo CSV a importar ') }}

  <br> 
   {{Form::file('image')}}


<br><br>


{{Form::submit('Importar',['class' => 'btn-primary'])}}


{!! Form::close() !!}



			</div>

</div>
				</div>
			</div>