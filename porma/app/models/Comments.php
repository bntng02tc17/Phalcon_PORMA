<?php

use Phalcon\Mvc\Model;


class Comments extends Model
{
    public $id;
    public $userid;
    public $postid;
    public $komentar;
    public $created_at;

    public function initialize()
    {
        $this->belongsTo(
            'postid',
            'Posts',
            'id'
        );
        $this->belongsTo(
            'userid',
            'Users',
            'id'
        );
     }

}