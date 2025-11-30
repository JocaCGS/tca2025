<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Image extends Model
{
    use HasFactory;
    use SoftDeletes;        

    protected $fillable = [
        'title',
        'tag',
        'image',   // path or URL
        'user_id'  // optional: who uploaded the image
    ];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
