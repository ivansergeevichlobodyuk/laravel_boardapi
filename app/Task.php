<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Board $board
 * @property int $id
 * @property int $board_id
 * @property string $task_name
 * @property string $task_title
 * @property string $task_intro
 * @property string $task_full_text
 * @property int $task_type
 */
class Task extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['board_id', 'task_name', 'task_title', 'task_intro', 'task_full_text', 'task_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function board()
    {
        return $this->belongsTo('App\Board');
    }
}
