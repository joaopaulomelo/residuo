<?php

namespace App\Http\Controllers;

use App\Imports\ResiduosImport;
use App\Models\Residuo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ResiduosController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $residuo = Residuo::find($id)->first();

            return response()->json($residuo);
        }

        $residuos = Residuo::all();

        return response()->json($residuos);
    }

    public function cadastrar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'excel' => 'required|mimes:xlsx'
        ]);

        if ($validator->fails()) {
            return response()->json(['messages' => 'Ocorreu um erro ao cadastrar resíduo, contate o administrador.']);
        }

        Excel::import(new ResiduosImport, $request->file('excel'));

        return response()->json(['message' => 'Resíduo cadastrado com sucesso']);
    }

    public function editar(Request $request, $id)
    {
        try {
            $residuo = Residuo::findOrFail($id);

            $residuo->fill($request->all());
            $residuo->save();

            return response()->json(['message' => 'Resíduo atualizado com sucesso']);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            response()->json($e);
        }
    }

    public function deletar($id)
    {
        $residuo = Residuo::find($id);

        if (!$residuo) {
            return response()->json([
                'message'   => 'Resíduo não encontrado',
            ], 404);
        }

        $residuo->delete();
        return response()->json(['message' => 'Resíduo deletado com sucesso']);
    }
}
