<?php

namespace RioLibrary;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 
        'author',
        'genre',
        'library_section',        
        'user_id',
        'borrowed',
        'last_user',
        'borrowed_count'
    ];

    public function user(){
        return $this->belongsTo('RioLibrary\User');
    }

    public function isborrowed(){
        $total = $this->borrowed;
        return $total;
    }
}
