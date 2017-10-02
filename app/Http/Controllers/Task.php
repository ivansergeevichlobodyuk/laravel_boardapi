<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task AS TaskModel;

class Task extends Controller
{

    /**
     * Update board item
     *
     * @param Request $request
     * @param $task
     */
    public function updateBoardItem(Request $request, $task){
        $data = $request->all( );
        $taskItem = TaskModel::find($task);
        foreach ( $data['data']['attributes'] as $column => $value ){
            $column = str_replace("-","_",$column);
            $taskItem->$column = $value;
        }
        $taskItem->save();
        dd($taskItem);
        die;

    }
}
