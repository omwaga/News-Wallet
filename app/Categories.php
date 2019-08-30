<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [
    ];

    public function news(){
    	return $this->hasMany(News::class);
    }

    public function addNews($news)
    {
    	$this->news()->create($news);
    }
}
