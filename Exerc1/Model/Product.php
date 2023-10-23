<?php

namespace Model;

class Product
{
    public float $Value;

    public float $Discount;
    public function __construct(float $Value)
    {
        $this->Value = $Value;
    }
    public function setDiscountNecessary(float $DisposableValue): void{
        $this->Discount = $this->Value - $DisposableValue;
    }

    public function DiscountToPercentage(): string{
        $Percentage = $this->Discount / $this->Value * 100;
        return $Percentage;
    }
}