<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'mail_compte',
        'nom_blog',
        'url_blog',
        'couleur_blog',
        'couleur_separation_blog',
        'taille_separation_blog',
        'template_blog',
        'image_blog',
        'sujet_blog',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'mail_compte', 'mail_compte');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_blog', 'id_blog');
    }

    public function comms()
    {
        return $this->hasMany(CommentaireBlog::class, 'id_blog');
    }
}
