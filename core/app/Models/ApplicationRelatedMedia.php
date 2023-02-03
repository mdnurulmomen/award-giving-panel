<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationRelatedMedia extends Model
{
    use SoftDeletes;
    
    protected $guarded =['id'];

    public function application()
    {
    	return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function mediaType()
    {
        return $this->belongsTo(MediaType::class, 'media_type_id', 'id');
    }

    public function mediaFiles()
    {
        return $this->hasMany(MediaFile::class, 'application_related_media_id', 'id');
    }

    public function mediaLinks()
    {
        return $this->hasOne(MediaLink::class, 'application_related_media_id', 'id');
    }

    public function publisher()
    {
        return $this->hasOne(Publisher::class, 'application_related_media_id', 'id');
    }
}
