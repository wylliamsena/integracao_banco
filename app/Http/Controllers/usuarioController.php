<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Service\usuarioService;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    protected $usuariosService;
    //aqui ele constroi para poder executar\
    public function __construct(usuarioService $novousuarioService)
    {
        $this->usuariosService = $novousuarioService;
    }

    public function store(Request $request)
    {

        $user = $this->usuariosService->create($request->all());

        return $user;
    }

    public function findById($id)
    {
        $result = $this->usuariosService->findById($id);

        return response()->json($result);
    }

    public function index()
    {
        $result = $this->usuariosService->getAll();

        return response()->json($result);
    }

    public function searchByName(Request $request)
    {
        $result = $this->usuariosService->searchByName($request->nome);
        return response()->json($result);
    }

    public function searchByEmail(Request $request)
    {
        $result = $this->usuariosService->searchByEmail($request->email);
        return response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->usuariosService->delete($id);
        return response()->json($result);
    }

    public function update(Request $request)
    {
        $result = $this->usuariosService->update($request->all());
        return response()->json($result);
    }
}
