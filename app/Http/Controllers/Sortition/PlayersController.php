<?php

namespace App\Http\Controllers\Sortition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sortition\Games;
use App\Models\Sortition\Players;
use App\Models\Sortition\PlayersGame;

class PlayersController extends Controller
{

    public function newPlayers()
    {
        $players = Players::whereNull('deleted_at')->get();
        $routeDelete = route('delete');

        return view('sortition.form-players', ['players' => $players, 'table_delete' => 'Sortition\\\Players', 'routeDelete' => $routeDelete]);
    }

    public function sendPlayers(Request $request)
    {
        $names = $request->input('name');
        $niveis = $request->input('nivel');
        $ids = $request->input('id');
        $edit_names = $request->input('edit_name');
        $edit_niveis = $request->input('edit_nivel');

        PlayersGame::query()->delete();

        foreach ($ids as $i => $item) {
            $player = Players::find($item);
            $player->update([
                'name' => $edit_names[$i],
                'nivel' => $edit_niveis[$i],
                'goalkeeper' => $request->input("edit_goalkeeper_" . $item) ?? 0,
            ]);
        }

        foreach ($names as $i => $item) {
            if (($item && $niveis[$i]) != null)
                Players::create([
                    'name' => $item,
                    'nivel' => $niveis[$i],
                    'goalkeeper' => $request->input("goalkeeper_" . $i) ?? 0,
                ]);
        }

        return redirect()->route('game.new', ['id' => $request->id])
            ->with(['success' => "Jogadores adicionados com sucesso!"]);
    }
}
