<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Board AS BoardModel;

class Board extends Controller
{

    /**
     * Gets boards list
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBoardList(){
        $boards = BoardModel::with('task')->get();
        return json_encode( array( 'boards' => $boards ) );
    }


}
