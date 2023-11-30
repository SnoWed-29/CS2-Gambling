<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{

    protected $fillable = ['name', 'weapon', 'rarity', 'collection', 'image', 'quality' ];
    use HasFactory;

    public function boxes()
    {
        return $this->belongsToMany(Box::class, 'box_skin_relations');
    }
    public function result(){
        return $this->belongsToMany(BoxResult::class);
    }
}
