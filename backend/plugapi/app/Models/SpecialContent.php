<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpecialMediaDetail;

class SpecialContent extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function media(){
        return $this->hasMany(SpecialMediaDetail::class, 'fkContentId' , 'id');
    }
}
