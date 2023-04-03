<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['ISBN','title','category_id','author','description','price','year'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
