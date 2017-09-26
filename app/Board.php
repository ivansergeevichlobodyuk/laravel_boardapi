<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Task[] $tasks
 * @property int $id
 * @property string $name
 */
class Board extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'board';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task()
    {
        return $this->hasMany('App\Task');
    }

}
