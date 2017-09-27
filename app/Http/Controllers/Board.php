<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Board AS BoardModel;
use App\Task;
use App\Http\Controllers\Schemas\BoardSchema;
use App\Http\Controllers\Schemas\TaskSchema;

use Neomerx\JsonApi\Encoder\EncoderOptions;
use Neomerx\JsonApi\Encoder\Encoder;

class Board extends Controller
{

    /**
     * Gets boards list
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBoardList(){
        $boards = BoardModel::with('task')->get();

        $encode = Encoder::instance([
                BoardModel::class      => BoardSchema::class,
                Task::class           => TaskSchema::class,
            ], new EncoderOptions(JSON_PRETTY_PRINT)
        );
//
        $data = $encode->encodeData($boards);

        echo "<br /> boards <pre>"; print_r($data); die;

        return json_encode( array( 'boards' => $boards ) );
    }



}
