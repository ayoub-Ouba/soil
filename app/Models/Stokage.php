<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokage extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function types_products() {
        return $this->belongsTo(Type_product::class,"id_type_produit" , "id");
    }
        
}
