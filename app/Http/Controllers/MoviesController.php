<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Actor_Movie;

class MoviesController extends Controller
{

	public function allMovies(){
		$movies = Movie::all();
		return view('movie.list', compact('movies'));
	}

	public function showMovies($id){
		$movie = Movie::find($id);
		return view('movie.detail', compact('movie'));
	}

	public function showOneMovie($name){
		$finalName = '%' . $name . '%';
		$movies = Movie::where('title', 'like', $finalName)->get();
		return view('movie.list', compact('movies'));
	}

	public function findMovieForm(){
		return view('movie.find');
	}

	public function findMovieResult(Request $request){
		$this->validate(
			$request,
			[
				'title' => 'required'
			],
			[
				'title.required' => 'El campo título es necesario che!'
			]
		);
		$name = $request->only('title');
		return redirect(route('una_peli', [$name['title']]));
	}

	public function createMovieForm(){
		$genres = Genre::all();
		$actors = \App\Actor::all();

		return view('movie.create', compact('genres', 'actors'));
	}

	public function createMovie(Request $request){
		// dd($request->all());
		$this->validate(
			$request,
			[
				'title' => 'required | unique:movies',
				'rating' => 'required | numeric | between:1,10',
				'awards' => 'required | numeric',
				'release_date' => 'required',
				'length' => 'required | numeric',
				'genre_id' => 'required | numeric',
			],
			[
				'title.required' => 'El título es necesario',
				'title.unique' => 'Ya existe una película con ese nombre',
				'required' => 'Este campo es obligatorio',
				'numeric' => 'Ingresá solo números'
			]
		);

		// $movie = new Movie($request->all());
		$movie = new Movie($request->except('actor_id'));
      $movie->save();

		foreach ($request->input('actor_id') as $actor) {
			$actor_movie = new Actor_Movie();
			$actor_movie->actor_id = $actor;
			$actor_movie->movie_id = $movie->id;
			$actor_movie->save();
		}

      return redirect(route('movies_list'));
	}

	public function editMovieForm($id){
		$movie = Movie::findOrFail($id);
		$genres = Genre::all();

		// Si queremos mandar la fecha guardada en DB, tenemos que generarla así
		$movie->release_date = date('Y-m-d', strtotime($movie->release_date));

		return view('movie.edit', compact('movie', 'genres'));
	}

	public function editMovie(Request $request, $id){
		$this->validate(
			$request,
			[
				'title' => 'required',
				'rating' => 'required | numeric | between:1,10',
				'awards' => 'required | numeric',
				'release_date' => 'required',
				'length' => 'required | numeric',
				'genre_id' => 'required | numeric',
			],
			[
				'title.required' => 'El título es necesario',
				'rating.between' => 'Ingresá un número entre 1 y 10',
				'required' => 'Este campo es obligatorio',
				'numeric' => 'Ingresá solo números'
			]
		);

		$movie = Movie::findOrFail($id);

		$movie->fill($request->all());

		$movie->save();

		return redirect(route('movies_list'));
	}

	public function delete($id){
      $movie = Movie::findOrFail($id);
      $movie->delete();
      return redirect(route('movies_list'));
    }
}
