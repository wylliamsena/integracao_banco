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

    public function store(Request $request){
        
    $user = $this->usuariosService->create($request->all());

    return $user;
    }
}
