<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChildCategory extends Model
{
    use HasFactory;
    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }
    protected $guarded = [];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
