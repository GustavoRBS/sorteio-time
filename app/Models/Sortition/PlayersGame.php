<?php

namespace App\Models\Sortition;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayersGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'game_id',
        'player_id',
        'confirmed',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $table = 'players_game';
}
