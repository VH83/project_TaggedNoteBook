<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'description',
        'coverPhoto',
        'tag_id'
    ];
    
    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    use HasFactory;
}
