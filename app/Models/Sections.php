<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_name',
        'description',
        'Created_by',
    ];
    public function invoice()
    {
    return $this->hasMany('App\Models\Invoices');
    }
    public function product()
    {
    return $this->hasMany('App\Models\Products');
    }
}
