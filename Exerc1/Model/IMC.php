<?php
namespace Model;
class IMC
{
    public function __construct(Float $Height, Float $Weight)
    {
        $this->Weight = $Weight;
        $this->Height = $Height / 100;
        $this->Calculate();
    }

    public Float $Height;
    public Float $Weight;
    public Float $IMC;
    public function Calculate(){
        $this->IMC = ($this->Weight /( $this->Height * $this->Height));
    }

    public function toObject(){
        return $this;
    }
}
