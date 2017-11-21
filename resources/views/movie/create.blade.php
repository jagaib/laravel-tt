@extends('base')

@section('title', 'Crear una película')

@section('otherCSS')
	<link rel="stylesheet" href="/css/formulario.css">
@endsection

@section('content')
	<h2>Crear película</h2>
	<form method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-xs-6">
				<label>Título</label>
				@if ($errors->has('title'))
					<span class="text-danger"> / {{ $errors->first('title') }}</span>
				@endif
				<input class="form-control" type="text" name="title" value="{{ old('title') }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Rating</label>
				@if ($errors->has('rating'))
					<span class="text-danger"> / {{ $errors->first('rating') }}</span>
				@endif
				<input class="form-control" type="text" name="rating" value="{{ old('rating') }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Premios</label>
				@if ($errors->has('awards'))
					<span class="text-danger"> / {{ $errors->first('awards') }}</span>
				@endif
				<input class="form-control" type="text" name="awards" value="{{ old('awards') }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Fecha lanzamiento</label>
				@if ($errors->has('release_date'))
					<span class="text-danger"> / {{ $errors->first('release_date') }}</span>
				@endif
				<input class="form-control" type="date" name="release_date" value="{{ old('release_date') }}">
				<br>
			</div>
			<div class="col-xs-6">
				<label>Duración</label>
				@if ($errors->has('length'))
					<span class="text-danger"> / {{ $errors->first('length') }}</span>
				@endif
				<input class="form-control" type="text" name="length" value="{{ old('length') }}">
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
						@if ($genre->id == old('genre_id'))
							<option selected value="{{ $genre->id }}">{{ $genre->name }}</option>
						@else
							<option value="{{ $genre->id }}">{{ $genre->name }}</option>
						@endif
					@endforeach
				</select>
				<br>
			</div>
			<div class="col-xs-6">
				<label>Elegí los actores de la película</label>
				<small>(seleccioná varios pulsando <i>shift</i>)</small>
				<br>
				<select name="actor_id[]" class="form-control" multiple>
					@foreach ($actors as $actor)
						<option value="{{$actor->id}}">{{ $actor->getNombreCompleto() }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-xs-12">
				<br>
				<button type="submit" class="btn btn-success">Guardar</button>
			</div>
		</div>
	</form>
@endsection
