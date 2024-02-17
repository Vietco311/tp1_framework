<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageParam extends Model
{
    use HasFactory;

    protected $table = 'param_image_blog';
    protected $primaryKey = 'param_image_blog_id';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'param_image_blog_url',
        'param_image_blog_x',
        'param_image_blog_y',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'param_image_blog_id', 'param_image_blog_id');
    }

   
}
