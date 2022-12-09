<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlists extends Model
{
    protected $fillable=["user_id","name","rules","created_at","update_at"];
    use HasFactory;
    public function User(){
        return $this->hasMany(User::class);
    }
    public function PlaylistSong(){
        return $this->belongsTo(Playlist_song::class);
    }
   
}
