<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table='brands';
    protected $fillable =[
        'trans_lang','trans_of','name','image','slug','active','created_at','updated_at',
    ];

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function brands(){

        return    $this->hasMany(self::class,'trans_of');

    }
}
