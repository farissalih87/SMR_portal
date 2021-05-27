<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable =[
        'trans_lang','trans_lang','trans_of','name','image','slug','active','created_at','updated_at',
    ];

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function categories(){

    return    $this->hasMany(self::class,'trans_of');

    }
}
