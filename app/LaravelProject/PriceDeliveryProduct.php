<?php
declare(strict_types=1);

namespace App\LaravelProject;
class PriceDeliveryProduct {
    private float $weight;
    private float $length;
    private float $width;
    private float $height;
    private ?float $sellerPrice = null;
    private string $finalPriceType;
    public function setWeight(float $weight) :self {
        $this->weight = $weight;
        return $this; // повернемо посилання на себе
    }
    public function getWeight() :float{
        return $this->weight;
    }
    public function setLength(float $length) :self {
        $this->length = $length;
        return $this; // повернемо посилання на себе
    }
    public function getLength() :float {
        return $this->length;
    }
    public function setWidth(float $width) :self {
        $this->width = $width;
        return $this; // повернемо посилання на себе
    }
    public function getWidth() :float {
        return $this->width;
    }
    public function setHeight(float $height) :self {
        $this->height = $height;
        return $this; // повернемо посилання на себе
    }
    public function getHeight() :float {
        return $this->height;
    }
    public function setSellerPrice(?float $sellerPrice) :self {
        $this->sellerPrice = $sellerPrice;
        return $this; // повернемо посилання на себе
    }
    public function getSellerPrice() :?float {
        return $this->sellerPrice;
    }
    public function getFinalPriceType(): string {
        return $this->finalPriceType;
    }

    public function calculatePrice(): float {
        $byWeight = ($this->getWeight() * 50);
        $byVolume = ($this->getLength() * $this->getWidth() * $this->getHeight()) / 1000 * 50;

        if ($this->getSellerPrice() !== null) {
            $finalPrice = max($byWeight, $byVolume, $this->getSellerPrice());

            if ($finalPrice === $byWeight) {
                $this->finalPriceType = 'WEIGHT';
            } else if ($finalPrice === $byVolume) {
                $this->finalPriceType = 'VOLUME';
            } else {
                $this->finalPriceType = 'PRICE INDICATED BY SELLER';
            }
        } else {
            $finalPrice = max($byWeight, $byVolume);

            if ($finalPrice === $byWeight) {
                $this->finalPriceType = 'WEIGHT';
            } else {
                $this->finalPriceType = 'VOLUME';
            }
        }
        return $finalPrice;
    }
}

