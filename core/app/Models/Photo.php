<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
   	use SoftDeletes;

    protected $guarded =['id'];

   	public function photoFiles()
   	{
   		return $this->hasMany(PhotoFile::class, 'photo_id', 'id');
   	}

   	public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function contentType()
    {
    	return $this->belongsTo(ContentType::class, 'content_type_id', 'id');
    }

    public function age()
    {
      return $this->belongsTo(Age::class, 'age_id', 'id');
    }
}
