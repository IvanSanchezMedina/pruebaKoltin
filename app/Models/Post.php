<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','id_creator'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_creator', 'id');
    }
}
