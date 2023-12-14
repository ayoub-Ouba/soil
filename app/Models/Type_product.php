<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_product extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function stokage() {
        return $this->hasMany(Stokage::class);
        }
}
