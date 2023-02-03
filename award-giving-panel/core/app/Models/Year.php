<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
   	use SoftDeletes;

    protected $guarded =['id'];

    public function getNumberSubmissionAttribute()
    {
    	return Application::whereYear('created_at', $this->name)->count() ;
    }
}
