<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    public $timestamps = false;
 protected $fillable = [
        'id',
        'name',
        'image',
        'price',
        'size',
        'description',
       'collection_id',
       'category_id',    
    ];

    //A sticker belongs to a collection
    public function collection(){
        return $this->belongsTo(Collection::class);
      }
    //A sticker belongs to a category
    public function category(){
        return $this->belongsTo(Category::class);

    }
   
  
}
