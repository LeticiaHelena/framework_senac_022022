<?php

namespace App\Controllers;

use  App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class UpdateDataController extends AbstractControllers{
    public function exec(){
        $missingAttribute;
        $userId = null;
        $response = ['success' => true];

        try{
            $requestVariables = $this->processServerElements->getVariables();

            if((!$requestVariables) || sizeof($requestVariables) === 0){
                $missingAttribute = 'variableIsEmpty';
                throw new \Exception("You need to insert variables in the url");
            }

            foreach($requestVariables as $requestVariable){
                if($requestVariable['name'] === 'userId'){
                    $userId = $requestVariable['value'];
                }
            }

            if(!$userId){
                $missingAttribute = 'userIdNull';
                throw new \Exception("You need to inform userID variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")
                ->fetchAll();

            if(sizeof($users) === 0){
                $missingAttribute = 'thisUserDoesNotExist';
                throw new \Exception("There is no record of this user in db");
            }

            $params = $this->processServerElements->getInputJSONData();

            if((!$params) || sizeof($params) === 0){
                $missingAttribute = 'paramsNotExist';
                throw new /Exception("You have to inform the params attr to update");
            }

            $updateStrutureQuery = '';

            foreach($params as $key => $value){

                if(!in_array($key, ['name', 'last_name', 'age'])){
                    $missingAttribute = "keyNotAcceptable";
                    throw new /Exception($key);
                }

                if($key === 'name'){

                    $updateStrutureQuery .= "name = :name,";
                }

                if($key === 'last_name'){

                    $updateStrutureQuery .= "last_name = :last_name,";
                }
                
                if($key === 'age'){

                    $updateStrutureQuery .= "age = :age,";
                }
 
            }

            $updateStringInArray = str_split($updateStrutureQuery);

            array_pop($updateStringInArray);

            $newStringElementsSQL = implode($updateStringInArray);

            $sql = "UPDATE
                        user
                    SET
                        {$newStringElementsSQL}
                    WHERE
                        id_user = :id
                    ";

                    
            dd($sql);
            $statement = $this->pdo->prepare($sql);

            $statement->execute([
                ':name' => $params["name"],
                ':last_name' => $params["last_name"],
                ':age' => $params["age"],
                '>id_user' => $userId
            ]);

        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }
        view($response);
    }
}