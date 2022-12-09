<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist_song extends Model
{
    public $timestamps=false;
    protected $fillable=["playlist_id","song_id"];
    use HasFactory;
    public function Playlist(){
        return $this->hasMany(Playlists::class);
    }
    public function Song(){
        return $this->hasMany(Songs::class);
    }
}
