<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxResult extends Model
{
    use HasFactory;
    protected $table= 'boxresults';
    protected $fillable = ['skin_id', 'user_id'];

    public function skins(){
        return $this->hasMany(Skin::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
