<?php

namespace App\Models\FrontPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory; 
    protected $guarded = ['id'];
    public function blog()
    {
        return $this->hasMany('App\Models\FrontPage\Blog');
    }
}
