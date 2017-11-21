@extends('base')

@section('title', 'Crear una película')

@section('content')
		<h2>Actores y sus películas</h2>
		<ul>
			@foreach ($actors as $actor)
				<li>
					<h4>{{ $actor->getNombreCompleto() }}</h4>
					<ul>
						@forelse ($actor->movies as $movies)
							<li>{{ $movies->title }}</li>
						@empty
							<li>No tiene películas asociadas</li>
						@endforelse
					</ul>
				</li>
			@endforeach
		</ul>
@endsection
