<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interactions extends Model
{
    protected $fillable=["user_id","song_id","liked","play_count","created_at","updated_at"];
    use HasFactory;

    public function User(){
        return $this->hasMany(User::class);
    }
    
    public function Song(){
        return $this->hasMany(Songs::class);
    }
}
