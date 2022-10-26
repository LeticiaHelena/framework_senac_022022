<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;


class InsertDataController extends AbstractControllers{

    private $params;
    private $attrName;

    public function exec(){
        try{
            $response = ['success' => true];

            $this->params = $this->processServerElements->getInputJSONData();

            $this->verificantionInputVar();

            $query = "INSERT INTO user (name,last_name,age) VALUES (:name,:last_name,:age)";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':name' => $this->params["name"],
                ':last_name' => $this->params["last_name"],
                ':age' => $this->params["age"]
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
        if(!$this->params['name']){
            $this->attrName = 'name';
            throw new \Exception('the name is send in request');
        }

        if(!$this->params['last_name']){
            $this->attrName = 'last_name';
            throw new \Exception('the last_name is send in request');
        }

        if(!$this->params['age']){
            $this->attrName = 'age';
            throw new \Exception('the age is send in request');
        }

        if($this->params['age'] < 0){
            $this->attrName = 'age';
            throw new \Exception('the age has to be more than zero');
        }

        if($this->params['age'] > 150){
            $this->attrName = 'age';
            throw new \Exception('the age has to be less than one hundred and fifth');
        }
    }
}