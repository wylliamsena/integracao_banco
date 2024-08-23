<?php

namespace App\Service;

use App\Models\usuario;

class usuarioService
{
public function create(array $dados){
$user = usuario::create([
    'nome' => $dados['nome'],
    'email' => $dados['email'],
    'password' => $dados['password']
]);

return $user;

}

public function update(){

}  

public function delete(){
    
}  

public function findById(){
    
}  

public function gateAll(){
    
}  

public function searchByName(){
    
}  



}
