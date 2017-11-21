@extends('base')

@section('title', 'Editar película')

@section('content')
	<h2>Editando: {{ $movie->title }}</h2>
	<form method="post">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="row">
			<div class="col-xs-6">
				<label>Título</label>
				@if ($errors->has('title'))
					<span class="text-danger"> / {{ $errors->first('title') }}</span>
				@endif
				<input class="form-control" type="text" name="title" value="{{ old('title', $movie->title) }}">	
				<br>
			</div>
			<div class="col-xs-6">
				<label>Rating</label>
				@if ($errors->has('rating'))
					<span class="text-danger"> / {{ $errors->first('rating') }}</span>
				@endif
				<input class="form-control" type="text" name="rating" value="{{ old('rating', $movie->rating) }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Premios</label>
				@if ($errors->has('awards'))
					<span class="text-danger"> / {{ $errors->first('awards') }}</span>
				@endif
				<input class="form-control" type="text" name="awards" value="{{ old('awards', $movie->awards) }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Fecha lanzamiento</label>
				@if ($errors->has('release_date'))
					<span class="text-danger"> / {{ $errors->first('release_date') }}</span>
				@endif
				<input class="form-control" type="date" name="release_date" value="{{ old('release_date', $movie->release_date) }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Duración</label>
				@if ($errors->has('length'))
					<span class="text-danger"> / {{ $errors->first('length') }}</span>
				@endif
				<input class="form-control" type="text" name="length" value="{{ old('length', $movie->length) }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Género</label>
				@if ($errors->has('genre_id'))
					<span class="text-danger"> / {{ $errors->first('genre_id') }}</span>
				@endif
				<select class="form-control" name="genre_id">
					<option value=" ">Elegí un genero</option>
					@foreach ($genres as $genre)
						@if ($genre->id == $movie->genre_id)
							<option selected value="{{ $genre->id }}">{{ $genre->name }}</option>
						@else								
							<option value="{{ $genre->id }}">{{ $genre->name }}</option>
						@endif
					@endforeach
				</select>
				<br>
			</div>
			<div class="col-xs-6">
				<button type="submit" class="btn btn-success">Editar</button>
			</div>
		</div>
	</form>
@endsection
