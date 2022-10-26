<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;

class TestQuestionsController extends AbstractControllers{

    public function getCar() {

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM car;")
                ->fetchAll();

        view($users);
    }
    
    public function getCar_Id() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM car WHERE id_car = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }
    
    public function getCarName() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM car WHERE name_car = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }

    public function getSeller() {

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM seller;")
                ->fetchAll();

        view($users);
    }
    
    public function getSeller_Id() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM seller WHERE id_seller = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }
    
    public function getSellerName() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM seller WHERE name_seller = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }
    
    public function getSellsFromSeller() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM car WHERE car.id_car IN (SELECT sells.id_car FROM sells WHERE sells.id_seller = (SELECT seller.id_seller FROM seller WHERE seller.id_seller = '{$valueOfVariable}'));")
                ->fetchAll();

        view($users);
    }

    public function getBuyer() {

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM buyer;")
                ->fetchAll();

        view($users);
    }
    
    public function getBuyer_Id() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM buyer WHERE id_buyer = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }
    
    public function getBuyerName() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM buyer WHERE name_buyer = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }
    
    public function getBuyerCars() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM car WHERE car.id_car IN ( SELECT sells.id_car FROM sells WHERE sells.id_buyer = (SELECT buyer.id_buyer FROM buyer WHERE buyer.id_buyer = '{$valueOfVariable}'));")
                ->fetchAll();

        view($users);
    }
}