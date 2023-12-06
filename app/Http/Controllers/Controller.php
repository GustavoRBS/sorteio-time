<?php

namespace App\Http\Controllers;

use App\Models\Sortition\PlayersGame;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function delete(Request $request)
    {
        $model_class = 'App\\Models\\' . ucfirst($request->model);
        $delete = $model_class::find($request->delete_id);

        if ($delete) {
            PlayersGame::where('player_id', $request->delete_id)->delete();
            $delete->delete();

            return response()->json(['success' => "O item foi excluido com sucesso!", 'status' => 200]);
        }
        return response()->json(['status' => 500, 'error' => 'Erro ao excluir!'], 500);
    }
}
