<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $table='websites';
    protected $fillable=['website_title','website_url','description'];

    public function subscribers(){
        return $this->hasMany(Subscriber::class,'website_id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'website_id');
    }
}
