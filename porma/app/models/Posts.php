<?php

use Phalcon\Mvc\Model;


class Posts extends Model
{
    public $id;
    public $userid;
    public $judul;
    public $deskripsi;
    public $created_at;
    public $status;
    public $namaGambar;

    public function initialize()
    {
        $this->hasMany(
            'id',
            'Comments',
            'postid'
        );
        $this->belongsTo(
            'userid',
            'Users',
            'id'
        );
    }

}