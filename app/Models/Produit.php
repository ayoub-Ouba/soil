<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function commande() { 
        return $this->belongsTo(Commande::class); 
    }

    public function type_product() {
        return $this->belongsTo(Type_product::class, 'id_type', 'id');
    }

    public function design() {
        return $this->belongsTo(Design::class, 'id_design', 'id');
    }
        
}
