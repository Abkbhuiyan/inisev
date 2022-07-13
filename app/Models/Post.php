<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table='posts';
    protected $fillable = ['website_id','post_title','author','description'];
    public function website(){
        return $this->belongsTo(Website::class, 'website_id');
    }
}
