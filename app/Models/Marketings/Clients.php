<?php

namespace App\Models\Marketings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{

    use HasFactory;
    protected $guarded = ['id'];

    public function project()
    {
        return $this->hasMany('App\Models\Projects\Projects');
    }
}
