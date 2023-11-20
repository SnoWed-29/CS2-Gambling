<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function skins()
    {
        return $this->belongsToMany(Skin::class, 'box_skin_relations');
    }
}
