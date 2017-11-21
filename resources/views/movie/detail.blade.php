@extends('base')

@section('title', 'Detalle de película')

@section('content')
	<h2>Detalle de: {{ $movie->title }}</h2>
	<ul>
		<li>Rating: {{ $movie->rating }}</li>
		<li>Premios: {{ $movie->awards }}</li>
		<li>Duracion: {{ $movie->length }} minutos</li>
		<li>Fecha de lanzamiento: {{ date('Y-m-d', strtotime($movie->release_date)) }}</li>
		<li>Genero: {{ $movie->genre->name }}</li>
		<li>
			Actores:
			@if (count($movie->actors) > 0)
				<ul>
					@foreach ($movie->actors as $actor)
						<li>{{ $actor->getNombreCompleto() }}</li>
					@endforeach
				</ul>
			@else
				<b>Sin actores asociados</b>
			@endif
		</li>
	</ul>
	<a href="{{ route('movies_list') }}" class="btn btn-default">volver al listado</a>
@endsection
