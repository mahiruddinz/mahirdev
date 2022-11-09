<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function project() {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Projects\Projects','project_id','id');
    }
}
