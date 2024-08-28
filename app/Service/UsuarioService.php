<?php

namespace App\Service;

use App\Models\usuario;

class usuarioService
{
    public function create(array $dados)
    {
        $user = usuario::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password' => $dados['password']
        ]);

        return $user;
    }

    public function update(array $dados){
        $usuario = usuario::find($dados['id']);

        if($usuario == null){
            return[
                'status' => false,
                'message' => 'usuario nao encontrado'
            ];
        }
        
    if(isset($dados['nome'])){
    $usuario->nome = $dados['nome'];
    }
    if(isset($dados['email'])){
        $usuario->email = $dados['email'];
    }
    if(isset($dados['password'])){
    $usuario->password = $dados ['password'];
    }

        $usuario->save();

        return[
        'status' => true,
        'message' =>'Atualizado com sucesso'
        
        ];

    }
    
    

    public function delete($id)
    {
        $usuario = usuario::find($id);
        if($usuario == null){
            return[
                'status' => false,
                'message' => 'usuario não encontrado'
            ];
        }

        $usuario->delete();

        return[
            'status' => false,
            'message' => 'usuario excluido com sucesso'
        ];
    }

    public function findById($id)
    {
        $usuario = usuario::find($id);
        if ($usuario == null) {
            return [
                'status' => false,
                'message' => 'usuario não encontrado'
            ];
        }
        return [
            'status' => true,
            'message' => 'Usuario encontrado',
            'data' => $usuario
        ];
    }

    public function getAll()
    {
        $usuarios = usuario::all();
        return [
            'status' => true,
            'message' => 'Pesquisa efetuada com sucesso',
            'data' => $usuarios
        ];
    }

    public function searchByName($nome)
    {
        $usuarios = usuario::where('nome', 'like', '%' . $nome . '%')->get();
        if ($usuarios->isEmpty()) {
            return [
                'satus' => false,
                'message' => 'sem Resultados'
            ];
        }

        return [
            'status' => true,
            'message' => 'Resultado Encontrados',
            'data' => $usuarios
        ];
    }

    public function searchByEmail($email)
    {
        $usuarios = usuario::where('email', 'like', '%' . $email . '%')->get();
        if ($usuarios->isEmpty()) {
            return [
                'status' => false,
                'message' => 'sem resultado'
            ];
        }
        return [
            'status' => true,
            'message' => 'Resultado Encontrados',
            'data' => $usuarios
        ];
    }

}
