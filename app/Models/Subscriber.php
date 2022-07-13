<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $table='subscribers';
    protected $fillable=['subscriber_name','email','address','website_id'];

    public function website(){
        return $this->belongsTo(Website::class, 'website_id');
    }
}
