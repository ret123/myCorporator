<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable =['name'];


    public function wards() {
      return $this->belongsToMany(Ward::class);
    }

    public function corporator() {
      return $this->hasOne(Corporator::class);
    }
}
