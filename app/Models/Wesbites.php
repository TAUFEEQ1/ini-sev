<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wesbites extends Model
{
    use HasFactory;
    protected $table="websites";
    public function subscribers(){
        return $this->hasManyThrough("SubscriberWebsites","Subscriber");
    }
}
