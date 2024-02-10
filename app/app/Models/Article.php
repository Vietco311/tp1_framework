<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';
    protected $primaryKey = 'id_article';
    public $timestamps = false;

    protected $fillable = [
        'id_blog',
        'nom_article',
        'auteur_article',
        'contenu_article',
        'image_article',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog', 'id_blog');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_article', 'id_article');
    }
}
