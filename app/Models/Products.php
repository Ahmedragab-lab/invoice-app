<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'Product_name',
    //     'description',
    //     'section_id',
    //     'Created_by',
    // ];
    protected $guarded = [];
    public function section()
   {
//    return $this->belongsTo('App\Models\sections');
      return $this->belongsTo(Sections::class);
   }
}
