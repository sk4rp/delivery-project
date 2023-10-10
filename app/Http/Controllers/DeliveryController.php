<?php

namespace App\Http\Controllers;

use App\Classes\DeliveryCalculator;
use App\Http\Requests\CalculateFastDeliveryRequest;
use App\Http\Requests\CalculateSlowDeliveryRequest;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    private $calculator;

    public function __construct(DeliveryCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function calculateFastDelivery(CalculateFastDeliveryRequest $request)
    {
        $data = $request->validated();
        $result = $this->calculator->calculateFastDelivery($data['weight']);

        $this->storeDeliveryRecord('fast', $data, $result);

        return response()->json($result);
    }

    public function calculateSlowDelivery(CalculateSlowDeliveryRequest $request)
    {
        $data = $request->validated();
        $result = $this->calculator->calculateSlowDelivery($data['weight']);

        $this->storeDeliveryRecord('slow', $data, $result);

        return response()->json($result);
    }

    private function storeDeliveryRecord($type, $data, $result)
    {
        $recordData = [
            'type' => $type,
            'sourceKladr' => $data['sourceKladr'] ?? null,
            'targetKladr' => $data['targetKladr'] ?? null,
            'weight' => $data['weight'] ?? null,
            'price' => $result['price'] ?? null,
            'period' => $result['period'] ?? null,
            'coefficient' => $result['coefficient'] ?? null,
            'delivery_date' => $result['date'] ?? null,
            'error' => $result['error'] ?? null,
        ];
        Delivery::create(array_filter($recordData, fn($value) => $value !== null));
    }
}
