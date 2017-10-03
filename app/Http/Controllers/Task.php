<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task AS TaskModel;
use App\Board AS BoardModel;

use App\Http\Controllers\Schemas\BoardSchema;
use App\Http\Controllers\Schemas\TaskSchema;
use Illuminate\Http\Response;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\Parameters\EncodingParameters;

class Task extends Controller
{
    /**
     * udates board item
     *
     * @param Request $request
     * @param $task
     * @return string
     */
    public function updateBoardItem(Request $request, $task){
        $data = $request->all( );
        $encode = Encoder::instance([
            TaskModel::class           => TaskSchema::class,
        ], new EncoderOptions()
        );
//        $params = new EncodingParameters(
//            ['tasks']
//        );

        $taskItem = TaskModel::find($task);
        foreach ( $data['data']['attributes'] as $column => $value ){
            if ( $value != null ){
              $column = str_replace("-","_",$column);
              $taskItem->$column = $value;
            }
        }
        $taskItem->board = $data['data']['relationships']['board']['data']['id'];
        $taskItem->save();
        return Response::create($encode->encodeData($taskItem)) ;
    }
}
