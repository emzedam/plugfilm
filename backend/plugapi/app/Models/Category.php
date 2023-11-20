<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['subcategories'];

    protected $fillable = [
        'name'
    ];

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class , 'category_id' , 'id');
    }


    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }
}
