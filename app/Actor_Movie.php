<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor_Movie extends Model
{
	protected $table = 'actor_movie';

	protected $fillable = ['actor_id', 'movie_id'];
}
