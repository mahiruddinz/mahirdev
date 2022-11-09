<?php

namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\User','leader_id','id');
    }

    public function client()
    {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->belongsTo('App\Models\Marketings\Clients','client_id','id');
    }

    public function task_project() {
        // return $this->belongsTo('Model', 'foreign_key', 'owner_key'); 
        return $this->hasMany('App\Models\Projects\TaskProject');
    }
}
