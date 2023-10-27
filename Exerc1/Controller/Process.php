<?php

require_once './../Model/IMC.php';
require_once './../Model/ConvertTemp.php';
require_once './../Model/Product.php';
require_once './../Model/CompoundInterest.php';
header('Content-Type: application/json');

use Model\CompoundInterest;
use Model\ConvertTemp;
use Model\IMC;
use Model\Product;

if(!isset($_POST['Action']))
    return 'ERROR';

(new Controller)->init($_POST['Action']);

class Controller {
    public function init()
    {
        switch ($_POST['Action']) {

            case 'CalculateIMC':
                return $this->CalculateIMC($_POST);

            case 'ConvertTemp':
                return $this->ConvertTemp($_POST);

            case 'calculateDiscount':
                return $this->calculateDiscount($_POST);

            case 'calculateCompoundInterest' :
                return $this->calculateCompoundInterest($_POST);

            default:
                throw new Error("not found");
        }
    }

    private function CalculateIMC($Params){

        if (!isset($Params['Height']) || !isset($Params['Weight']))
            throw new Error("Error");

        $NewIMC = new IMC($Params['Height'], $Params['Weight']);


        $json = json_encode($NewIMC->toObject());
        $JsonPath = 'data.json';

        if (!empty($json))
            file_put_contents($JsonPath, $json);

        echo $NewIMC->IMC;
    }

    private function ConvertTemp($Params){

        if (!isset($Params['Fahrenheit']) || !isset($Params['Celsius']))
            throw new Error("Error");

        $ToType = $Params['Fahrenheit'] == '' ? 'Fahrenheit' : 'Celsius';
        $Value = $Params['Fahrenheit'] !== '' ? $Params['Fahrenheit'] : $Params['Celsius'];

        $NewConvertTemp = new ConvertTemp($ToType, (float)$Value);


        $json = json_encode($NewConvertTemp->toObject());
        $JsonPath = 'data.json';

        if (!empty($json))
            file_put_contents($JsonPath, $json);

        echo json_encode($NewConvertTemp->response());
    }

    private function calculateDiscount($Params){
        if (!isset($Params['DesireValue']) || !isset($Params['ProductValue']))
            throw new Error("Error");

        $Product = new Product($Params['ProductValue']);
        $Product->setDiscountNecessary($Params['DesireValue']);
        echo $Product->DiscountToPercentage();
    }

    private function calculateCompoundInterest($Params){
        if (!isset($Params['Capital']) || !isset($Params['Meses']) || !isset($Params['Juros'])){
            echo ("Error");
            return;
        }
        $CompoundInterest = new CompoundInterest($Params['Capital'], $Params['Meses'], $Params['Juros']);
        echo $CompoundInterest->calculateFinalAmount();
    }
}

