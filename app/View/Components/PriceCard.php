<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PriceCard extends Component
{
    public $monthText;
    public $price;
    public $green;
    public $green2;
    public $green3;
    public $green4;

    // The constructor can be simplified by removing dependency injection
    public function __construct($monthText = '1 Month', $price = '0', $green=null, $green2=null, $green3=null, $green4=null )  // Default value for monthText if not passed
    {
        $this->monthText = $monthText;

        $this->price = $price;

        $this->green = $green;

        $this->green2 = $green2;

        $this->green3 = $green3;

        $this->green4 = $green4;


    }

    public function render()
    {
        return view('components.price-card');
    }
}
