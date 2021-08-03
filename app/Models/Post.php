<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=['title','slug','description','image_path','user_id'];

    //creamos la autenticacion
    public function user(){
        //creo la relacion con usuarios
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        //asi decimos que el slug es lo mismo que title
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }
}
