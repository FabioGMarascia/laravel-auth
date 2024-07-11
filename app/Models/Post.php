<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "project_title",
        "description",
        "collaborators",
        "framework",
        "thumb",
        "start_project",
        "end_project",
        "created_at",
        "updated_at",
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
