<?php

namespace App\Http\Controllers\Sortition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sortition\PlayersGame;
use App\Models\Sortition\Games;
use App\Models\Sortition\Players;

class GameController extends Controller
{

    public function newGame()
    {
        $players = Players::all();

        return view('sortition.form-game', ['players' => $players]);
    }

    public function sendGame(Request $request)
    {
        $ids = $request->input('id');

        if($ids == null)
        return redirect()->back()->with(['error' => __("Adicione os jogadores antes!")]);

        $game = Games::create([]);

        foreach ($ids as $i => $item) {
            PlayersGame::create([
                'game_id' => $game->id,
                'player_id' => $item,
                'confirmed' => $request->input("goalkeeper_" . $item)
            ]);
        }

        $teams = $this->drawTeams($request->input('number'), $game->id);

        if ($teams instanceof \Illuminate\Http\RedirectResponse) {
            return $teams;
        }   

        return view('sortition.result', ['times' => $teams])
            ->with(['success' => "Jogadores adicionados com sucesso!"]);
    }

    public function drawTeams($numPlayersPerTeam, $game_id)
    {
        $confirmedPlayers = PlayersGame::leftJoin('players', 'players_game.player_id', '=', 'players.id')->where('confirmed', true)->where('game_id', $game_id)->get()->toArray();

        if (count($confirmedPlayers) < $numPlayersPerTeam * 2) {
            return redirect()->back()->with(['error' => __("Jogadores confirmados insuficientes!")]);
        }

        $goalkeepers = array();
        $noGoalkeepers = array();

        foreach ($confirmedPlayers as $player) {
            if ($player['goalkeeper'] == 1) {
                $goalkeepers[] = $player;
            } else {
                $noGoalkeepers[] = $player;
            }
        }

        $numPlayersPerTeamSemG = $numPlayersPerTeam - 1;

        usort($noGoalkeepers, function ($a, $b) {
            return $a['nivel'] - $b['nivel'];
        });

        $teams = array();

        $numTimes = ceil(count($noGoalkeepers) / $numPlayersPerTeamSemG);

        for ($i = 1; $i <= $numTimes; $i++) {
            $teams["Time $i"] = array();
        }

        $currentIndex = 1;

        foreach ($noGoalkeepers as $index => $player) {
            $teams["Time $currentIndex"][] = $player;
            $currentIndex = ($currentIndex % $numTimes) + 1;
        }

        foreach ($goalkeepers as $index => $goleiro) {

            if (count($teams["Time $currentIndex"]) >= $numPlayersPerTeam) {
                $teams["Time $i"] = array();
                $currentIndex = $i;
            }
            $teams["Time $currentIndex"][] = $goleiro;
            $currentIndex = ($currentIndex % $numTimes) + 1;
        }

        foreach ($teams as $team) {
            if (count($team) > $numPlayersPerTeam) {
                return redirect()->back()->with(['error' => __("A equipe tem mais jogadores do que o permitido.")]);
            }
        }

        return $teams;
    }
}
