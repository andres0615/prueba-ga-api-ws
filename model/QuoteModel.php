<?php

class QuoteModel extends BaseModel {
    public function cotizar($requestData)
    {
        $planModel = new PlanModel();
        $planes = $planModel->getPlans();

        $placa = $requestData['placa'];
        // $placa = 'ABC1234'; // Simulación de placa

        $cotizaciones = [];

        foreach ($planes as $plan) {
            $cotizacion = [];

            $cotizacion['no_cotizacion'] = $this->getQuoteNumber();
            $cotizacion['nombre_producto'] = $plan['nombre'];
            $cotizacion['valor'] = $this->formatearValor($plan['valor']);
            $cotizacion['placa'] = $placa;

            $cotizaciones[] = $cotizacion;
        }

        $response = [
            'cotizaciones' => $cotizaciones,
        ];

        return $response;
    }

    public function getQuoteNumber()
    {
        $quoteNumber = rand(100000, 999999);
        return $quoteNumber; // Simulación de número de cotización
    }

    public function formatearValor($valor)
    {
        $valor = number_format($valor, 0, ',', '.');
        $valor = '$ ' . $valor;
        return $valor;
    }
}