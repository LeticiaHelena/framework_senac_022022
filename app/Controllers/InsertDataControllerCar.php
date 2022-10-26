<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class InsertDataControllerCar extends AbstractControllers{

    private $params;
    private $attrName;

    public function insereCarro(){
        try{
            $response = ['success' => true];

            $this->params = $this->processServerElements->getInputJSONData();

            $this->verificantionInputVar();

            $query = "INSERT INTO car (carName,model) VALUES (:carName,:model)";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':carName' => $this->params["carName"],
                ':model' => $this->params["model"]
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
        if(!$this->params['carName']){
            $this->attrName = 'carName';
            throw new \Exception('the carName is send in request');
        }

        if(!$this->params['model']){
            $this->attrName = 'model';
            throw new \Exception('the model is send in request');
        }
    }
}