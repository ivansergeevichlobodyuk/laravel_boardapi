<?php
namespace App\Http\Controllers\Schemas;
/**
 * Copyright 2015 info@neomerx.com (www.neomerx.com)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
use \Neomerx\JsonApi\Schema\SchemaProvider;
/**
 * @package Neomerx\Samples\JsonApi
 */
class BoardSchema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'boards';

    /**
     * @param object $board
     * @return mixed
     */
    public function getId($board)
    {
        /** @var Author $author */
        return $board->id;
    }

    /**
     * @param object $author
     * @return array
     */
    public function getAttributes($board)
    {
       //echo "BOARD <pre>"; print_r($board->task); die;

        /** @var Author $author */
        return [
            'name' => $board->name,
            'count' => $board->count
        ];
    }

    /**
     * @param object $board
     * @param bool $isPrimary
     * @param array $includeRelationships
     * @return array
     */
    public function getRelationships($board, $isPrimary, array $includeRelationships )
    {
        return [
            'tasks' => [
                self::DATA => $board->task,
                self::SHOW_SELF => true
            ],
        ];
    }

}