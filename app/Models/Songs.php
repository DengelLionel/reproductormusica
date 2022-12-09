<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    protected $fillable=["album_id","artist_id","title","length","track","disc","lyrics","path","mtime","created_at","updated_at"];
    use HasFactory;

    public function PlaylistSong(){
        return $this->belongsTo(Playlist_song::class);
    }

    public function Interaction(){
        return $this->belongsTo(Interactions::class);
    }

    public function Album(){
        return $this->hasMany(Albums::class);
    }

    public function Artist(){
        return $this->hasMany(Artists::class);
    }
}
