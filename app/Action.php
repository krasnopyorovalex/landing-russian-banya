<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Action
 * @package App
 */
class Action extends Model
{
    public $timestamps = false;

    protected $with = ['image'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @var array
     */
    protected $fillable = ['name', 'text', 'preview', 'published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
