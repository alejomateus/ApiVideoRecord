<?php

namespace App\Models;

use App\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;

class VisitVideoUser extends Model
{
    protected $table = 'visits_videos_users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user','id_video'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function video()
    {
        return $this->belongsTo(Video::class, 'id_video', 'id');
    }
}
