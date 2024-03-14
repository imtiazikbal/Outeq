<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
}
