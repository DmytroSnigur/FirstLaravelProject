<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaravelProject\PriceDeliveryProduct;

class TestController extends Controller {
    public function index() {
        $bike = new PriceDeliveryProduct;
        $sledge = new PriceDeliveryProduct;
        $barbell = new PriceDeliveryProduct;
        var_dump ("Price: " . $bike->setWeight(12)->setLength(90)->setWidth(30)->setHeight(70)->setSellerPrice(1000)->calculatePrice() . ", Method: " . $bike->getFinalPriceType());
        var_dump ("Price: " . $sledge->setWeight(4)->setLength(15)->setWidth(25)->setHeight(14)->setSellerPrice(1200)->calculatePrice() . ", Method: " . $sledge->getFinalPriceType());
        var_dump ("Price: " . $barbell->setWeight(25)->setLength(20)->setWidth(7)->setHeight(6)->calculatePrice() . ", Method: " . $barbell->getFinalPriceType());
        die();
    }
}
