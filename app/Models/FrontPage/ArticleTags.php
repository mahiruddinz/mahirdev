<?php

namespace App\Models\FrontPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTags extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function article()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\FrontPage\Blog','blog_id','id');
    }
}
