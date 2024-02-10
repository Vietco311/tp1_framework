<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaire';
    protected $primaryKey = 'id_commentaire';
    public $timestamps = false;

    protected $fillable = [
        'id_article',
        'pseudo_commentaire',
        'contenu_commentaire',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article', 'id_article');
    }
}
