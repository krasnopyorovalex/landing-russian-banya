<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TextBlock
 *
 * @property int $id
 * @property string $sys_name
 * @property string $name
 * @property string $text
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextBlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextBlock whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextBlock whereSysName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TextBlock whereText($value)
 * @mixin \Eloquent
 */
class TextBlock extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];
}
