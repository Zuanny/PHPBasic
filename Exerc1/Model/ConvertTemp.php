<?php
namespace Model;

class ConvertTemp
{
    public function __construct(String $ToType, Float $Value)
    {
        $this->setParams($ToType, $Value);
    }

    public String $ToType;
    public Float $Fahrenheit;
    public Float $Celsius;
    private function setParams(String $ToType, Float $Value){
        $this->ToType = $ToType;
        switch ($ToType){
            case 'Fahrenheit':
                $this->Celsius = $Value;
                break;
            case 'Celsius' :
                $this->Fahrenheit = $Value;
                break;
        }
        $this->Convert($ToType);

    }

    private function Convert (String $ToType){
        switch ($ToType){
            case 'Fahrenheit':
                $this->Fahrenheit = ($this->Celsius * 1.8 + 32);
                break;
            case 'Celsius' :
                $this->Celsius = ($this->Fahrenheit - 32) * (5 / 9);
                break;
        }
    }
    public function response(){
        $Response = $this->ToType == 'Fahrenheit' ? $this->Fahrenheit : $this->Celsius;
        return [$this->ToType, $Response];
    }
    public function toObject(){
        return $this;
    }

}
