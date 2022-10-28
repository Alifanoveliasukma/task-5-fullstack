<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable =['title','content','image', 'user_id', 'kategori_id'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function kategori()
    {
    return $this->belongsTo(Kategori::class);
    }
}
