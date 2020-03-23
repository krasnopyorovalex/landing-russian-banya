<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App
 */
class Service extends Model
{
    public $timestamps = false;

    protected $with = ['image'];

    protected $fillable = ['name','preview', 'text', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\ServiceImage')->orderBy('pos');
    }
}
