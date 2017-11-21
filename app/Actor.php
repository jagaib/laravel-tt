<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actor extends Model
{
	// use SoftDeletes;

   protected $fillable = ['first_name', 'last_name', 'rating'];

	public function getNombreCompleto(){
		return $this->first_name . ' ' . $this->last_name;
	}

	public function movies() {
		return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id');
	}
}
