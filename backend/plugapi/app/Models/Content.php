<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MediaDetail;

class Content extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'categories' => 'array'
    ];


    public function media(){
        return $this->hasMany(MediaDetail::class, 'fkContentId' , 'id');
    }
}
