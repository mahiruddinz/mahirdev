<?php

namespace App\Models\FrontPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = ['id'];
    

    public function user()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\User','author_id','id');
    }
    public function categories()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\FrontPage\Categories','category_id','id');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function articleTags()
    {
        return $this->hasMany('App\Models\FrontPage\ArticleTags');
    }
}
