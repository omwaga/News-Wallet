<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $guarded = [
	];
	
    public function Categories()
    {
    	return $this->belongsTo(Categories::class);
    }
}
