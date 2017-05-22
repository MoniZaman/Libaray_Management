<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    protected $table='bookissue';

     public function bookissuelist()
    {
        return $this->hasMany('App\BookIssueList');
    }
}
