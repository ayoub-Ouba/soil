<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function produits() { 
        return $this->HasMany(Produit::class, 'id_commande','id'); 
    }
    public function user() { 
        return $this->belongsTo(User::class, 'id_user','id'); 
    }
    
}
