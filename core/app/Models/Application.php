<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $guarded =['id'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function contentType()
    {
    	return $this->belongsTo(ContentType::class, 'content_type_id', 'id');
    }

    public function relatedMedia()
    {
    	return $this->hasMany(ApplicationRelatedMedia::class, 'application_id', 'id');
    }
}
