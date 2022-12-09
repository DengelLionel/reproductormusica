<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable=["artist_id","name","cover","created_at","update_at"];
    use HasFactory;
    
    public function Song(){
        return $this->belongsTo(Songs::class);
    }

    public function Artist(){
        return $this->hasMany(Artists::class);
    }
}
