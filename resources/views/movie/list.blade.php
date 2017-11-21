@extends('base')

@section('title', 'Listado de películas')

@section('content')
	<br>
	<div class="row">
		<div class="col-xs-2">
			<h3 style="margin: 0;">Buscador</h3>
		</div>
		<div class="col-xs-10">
			<form method="post" action="/find-movie">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-xs-10">
						<input type="text" name="title" class="form-control">
					</div>
					<div class="col-xs-2">
						<button type="submit" class="btn btn-success">Search</button>
					</div>
				</div>
			</form>
			@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
					<span class="text-danger"> {{ $error }} </span> <br>
				@endforeach
			@endif
		</div>
	</div>

	<div class="row" style="padding-top: 15px; padding-bottom: 15px;">
		<div class="col-xs-10">
			<h2 style="margin: 0;">Listado de películas</h2>
		</div>
		<div class="col-xs-2">
			<a href="/create-movie" class="btn btn-warning">CREAR PELICULA</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<table class="table table-hover">
				@if (count($movies) > 0)
					@foreach ($movies as $movie)
						<tr>
							<td width="53%">{{ $movie->title }}</td>
							<td width="33%">
								@if ($movie->genre)
									{{ $movie->genre->name }}
								@else
									Sin genero asociado
								@endif
							</td>
							<td width="10%"><a class="btn btn-info" href="/movies/{{ $movie->id }}">ver detalle</a></td>
							<td width="5%"><a class="btn btn-primary" href="/edit-movie/{{ $movie->id }}">editar</a></td>
							<td width="2%">
								<form action="{{ route('delete_movie', $movie) }}" method="post" onsubmit="return confirm('¿Seguro querés eliminar esta película?')">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn btn-danger">X</button>
								</form>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td>No hay películas para mostrar</td>
						<td><a href="/movies" class="btn btn-info">Volver al listado completo</a></td>
					</tr>
				@endif
			</table>
		</div>
	</div>
@endsection
