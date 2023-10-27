<?php

namespace Model;

class CompoundInterest
{
    public float $Capital;
    public float $Month;
    public float $Compound;
    public function __construct(float $Capital, float $Month, float $Compound)
    {
        $this->Compound = $Compound / 100;
        $this->Month = $Month;
        $this->Capital = $Capital;
    }
    public function calculateFinalAmount(): float {
        $MultiplyToAmount = ($this->Compound + 1) ** $this->Month;
        return $this->Capital * $MultiplyToAmount;
    }


}