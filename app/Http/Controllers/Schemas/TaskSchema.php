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
class TaskSchema extends SchemaProvider
{

    /**
     * @var string
     */
   protected $resourceType = 'tasks';

    /**
     * @param object $task
     * @return mixed
     */
    public function getId($task)
    {
        /** @var Author $author */
        return $task->id;
    }

    /**
     * Gets attributes
     *
     * @param object $task
     * @return array
     */
    public function getAttributes($task)
    {

        /** @var Author $author */
        return [
            'task-name' => $task->task_name,
            'task-title' => $task->task_title,
            'intro-text' => $task->task_intro
        ];
    }

}