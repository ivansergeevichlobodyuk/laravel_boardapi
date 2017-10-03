<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Board AS BoardModel;
use App\Task;
use App\Http\Controllers\Schemas\BoardSchema;
use App\Http\Controllers\Schemas\TaskSchema;

use Illuminate\Http\Response;
use Neomerx\JsonApi\Encoder\EncoderOptions;
use Neomerx\JsonApi\Encoder\Encoder;
use Neomerx\JsonApi\Encoder\Parameters\EncodingParameters;

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
            ], new EncoderOptions()
        );
        $params = new EncodingParameters(
            ['tasks']
        );
        return $encode->encodeData($boards,$params);
    }

    /**
     * Save boards item
     *
     */
    public function addBoardItem(Request $request){
        $data = $request->all( );
        $board = new BoardModel( );
        foreach ( $data['data']['attributes'] AS $column => $value ){
            $column = str_replace('-','_',$column);
            $board->$column = $value;
        }
        $board->save();
        $encode = Encoder::instance([BoardModel::class => BoardSchema::class]);
        return $encode->encodeData($board);
    }

    /**
     * Gets board item
     *
     * @param Request $request
     * @param $board
     * @return string
     */
    public function getBoardItem( Request $request, $board ){
        $data = new BoardModel( );
        $item = $data->find( $board );
        $encode = Encoder::instance([BoardModel::class      => BoardSchema::class,
            Task::class           => TaskSchema::class]);
        $params = new EncodingParameters(
            ['tasks']
        );
        return $encode->encodeData($item, $params);
    }

}
