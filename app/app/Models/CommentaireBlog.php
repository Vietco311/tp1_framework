<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentaireBlog extends Model
{
    use HasFactory;

    protected $table = 'commentaire_blog';
    protected $primaryKey = 'id_commentaire_blog';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'id_blog',
        'pseudo_commentaire_blog',
        'contenu_commentaire_blog',
        'date_commentaire_blog',
        'etat_commentaire_blog',
    ];

    protected $dates = [
        'date_commentaire_blog',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'id_blog', 'id_blog');
    }
}
