<?php

use Phalcon\Mvc\Model;

class Book_author extends Model
{
    public $id;
    public $name;

    public function initialize()
    {
        $this->hasMany(
            'id',
            'Books',
            'author_id'
        );
    }
}