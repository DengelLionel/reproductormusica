<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    protected $fillable=["name","image","created_at","updated_at"];
    use HasFactory;

    public function Song(){
        return $this->belongsTo(Songs::class);
    }

    public function Album(){
        return $this->belongsTo(Albums::class);
    }
    
}
