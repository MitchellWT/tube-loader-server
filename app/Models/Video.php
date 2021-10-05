<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'downloaded',
        'queued',
        'video_id',
        'title',
        'thumbnail',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'downloaded_at' => 'datetime',
    ];
}
