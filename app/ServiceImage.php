<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['service_id', 'name', 'alt', 'title', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return asset('storage/service/' . $this->service_id . '/' . $this->basename . '_thumb.' . $this->ext);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return asset('storage/service/' . $this->service_id . '/' . $this->basename . '.' . $this->ext);
    }
}
