<?php

use Phalcon\Mvc\Model;

class Books extends Model
{
    public $id;
    public $author_id;
    public $title;
    public $summary;
    public $release_date;

    public function initialize()
    {
        $this->belongsTo(
            'author_id',
            'Book_author',
            'id'
        );
    }
}