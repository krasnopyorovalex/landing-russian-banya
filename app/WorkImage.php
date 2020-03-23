<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkImage extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['work_id', 'name', 'alt', 'title', 'pos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function work()
    {
        return $this->belongsTo('App\Work');
    }

    /**
     * @return string
     */
    public function getThumb(): string
    {
        return asset('storage/work/' . $this->work_id . '/' . $this->basename . '_thumb.' . $this->ext);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return asset('storage/work/' . $this->work_id . '/' . $this->basename . '.' . $this->ext);
    }
}
