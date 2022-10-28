<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    
    protected $table = 'kategoris';
    protected $fillable = ['name','user_id'];
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
