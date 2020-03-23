<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 * @package App
 */
class Work extends Model
{
    public $timestamps = false;

    protected $with = ['image'];

    protected $fillable = ['name', 'preview', 'text', 'pos'];

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
        return $this->hasMany('App\WorkImage')->orderBy('pos');
    }
}
