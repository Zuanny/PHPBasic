<?php

require_once './../Model/IMC.php';
require_once './../Model/ConvertTemp.php';
header('Content-Type: application/json');

use Model\ConvertTemp;
use Model\IMC;

if(!isset($_POST['Action']))
    return 'ERROR';

(new Controller)->init($_POST['Action']);

class Controller {
    public function init()
    {
        switch ($_POST['Action']) {
            case 'CalculateIMC':
            $this->CalculateIMC($_POST);
                break;

            case 'ConvertTemp':
                $this->ConvertTemp($_POST);
                break;
            default:
                throw new Error("not find");
                break;

        }
    }

    private function CalculateIMC($Params){

        if (!isset($Params['Height']) || !isset($Params['Weight']))
            throw new Error("Teste");

        $NewIMC = new IMC($Params['Height'], $Params['Weight']);


        $json = json_encode($NewIMC->toObject());
        $JsonPath = 'data.json';

        if (!empty($json))
            file_put_contents($JsonPath, $json);

        echo $NewIMC->IMC;
    }

    private function ConvertTemp($Params){

        if (!isset($Params['Fahrenheit']) || !isset($Params['Celsius']))
            throw new Error("Erorr");

        $ToType = $Params['Fahrenheit'] == '' ? 'Fahrenheit' : 'Celsius';
        $Value = $Params['Fahrenheit'] !== '' ? $Params['Fahrenheit'] : $Params['Celsius'];

        $NewConvertTemp = new ConvertTemp($ToType, (float)$Value);


        $json = json_encode($NewConvertTemp->toObject());
        $JsonPath = 'data.json';

        if (!empty($json))
            file_put_contents($JsonPath, $json);

        echo json_encode($NewConvertTemp->response());
    }
}

