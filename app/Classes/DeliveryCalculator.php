<?php

namespace App\Classes;


class DeliveryCalculator
{
    // Константы для быстрой доставки
    const FAST_DELIVERY_PRICE_UNDER_1KG = 100;
    const FAST_DELIVERY_PRICE_UNDER_5KG = 200;
    const FAST_DELIVERY_PRICE_ABOVE_5KG = 300;

    // Константы для медленной доставки
    const SLOW_DELIVERY_COEFFICIENT_UNDER_1KG = 1.2;
    const SLOW_DELIVERY_COEFFICIENT_UNDER_5KG = 1.5;
    const SLOW_DELIVERY_COEFFICIENT_ABOVE_5KG = 1.8;

    public function calculateFastDelivery($weight)
    {
        $price = $this->calculateFastDeliveryPrice($weight);
        $period = $this->calculateFastDeliveryPeriod($weight);

        return [
            'price' => $price,
            'period' => $period,
            'error' => null,
        ];
    }

    public function calculateSlowDelivery($weight)
    {
        $coefficient = $this->calculateSlowDeliveryCoefficient($weight);
        $date = $this->calculateSlowDeliveryDate($weight);

        return [
            'coefficient' => $coefficient,
            'date' => $date,
            'error' => null,
        ];
    }

    private function calculateFastDeliveryPrice($weight)
    {
        if ($weight <= 1) {
            return self::FAST_DELIVERY_PRICE_UNDER_1KG;
        } elseif ($weight <= 5) {
            return self::FAST_DELIVERY_PRICE_UNDER_5KG;
        } else {
            return self::FAST_DELIVERY_PRICE_ABOVE_5KG;
        }
    }

    private function calculateFastDeliveryPeriod($weight)
    {
        if ($weight <= 1) {
            return 1;
        } elseif ($weight <= 5) {
            return 2;
        } else {
            return 3;
        }
    }

    private function calculateSlowDeliveryCoefficient($weight)
    {
        if ($weight <= 1) {
            return self::SLOW_DELIVERY_COEFFICIENT_UNDER_1KG;
        } elseif ($weight <= 5) {
            return self::SLOW_DELIVERY_COEFFICIENT_UNDER_5KG;
        } else {
            return self::SLOW_DELIVERY_COEFFICIENT_ABOVE_5KG;
        }
    }

    private function calculateSlowDeliveryDate($weight)
    {

        if ($weight <= 1) {
            $deliveryDays = 5;
        } elseif ($weight <= 5) {
            $deliveryDays = 7;
        } else {
            $deliveryDays = 10;
        }

        return date('Y-m-d', strtotime("+$deliveryDays days"));
    }
}
