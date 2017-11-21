<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
	use SoftDeletes;

   protected $fillable = ['title', 'rating', 'awards', 'release_date', 'length', 'genre_id'];

   public function genre() {
		return $this->belongsTo(Genre::class, 'genre_id');
	}

   public function actors() {
		return $this->belongsToMany(Actor::class, 'actor_movie', 'movie_id', 'actor_id');
	}

}
