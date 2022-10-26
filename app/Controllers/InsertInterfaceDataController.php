<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class InsertInterfaceDataController extends AbstractControllers{

    private $params;
    private $attrName;

    public function insertDados(){
        try{
            $response = ['success' => true];

            $this->params = $this->processServerElements->getInputJSONData();

            $this->verificantionInputVar();

            $query = "INSERT INTO usuario (nomeUsuario,sobrenomeUsuario,idade,email,telefone) VALUES (:nomeUsuario,:sobrenomeUsuario,:idade,:email,:telefone)";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':nomeUsuario' => $this->params["nomeUsuario"],
                ':sobrenomeUsuario' => $this->params["sobrenomeUsuario"],
                ':idade' => $this->params["idade"],
                ':email' => $this->params["email"],
                ':telefone' => $this->params["telefone"]
            ]);

        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $this->attrName
            ];
        }

        view($response);
    }

    private function verificantionInputVar(){
        if(!$this->params['nomeUsuario']){
            $this->attrName = 'nomeUsuario';
            throw new \Exception('the Nome is send in request');
        }

        if(!$this->params['sobrenomeUsuario']){
            $this->attrName = 'sobrenomeUsuario';
            throw new \Exception('the sobrenome is send in request');
        }

        if(!$this->params['idade']){
            $this->attrName = 'idade';
            throw new \Exception('the idade is send in request');
        }

        if(!$this->params['email']){
            $this->attrName = 'email';
            throw new \Exception('the E-mail is send in request');
        }
    }
}