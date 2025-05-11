<?php

class QuoteModel extends BaseModel {
    public function cotizar($requestData)
    {
        $planes = $this->getPlans();

        // $placa = $requestData['placa'];
        $placa = 'ABC1234'; // Simulación de placa

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

    public function getPlans()
    {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM planes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $planes = [
        //     [
        //         'nombre' => 'Plan Basico',
        //         'valor' => 1000000
        //     ],
        //     [
        //         'nombre' => 'Plan Platino',
        //         'valor' => 2000000
        //     ],
        //     [
        //         'nombre' => 'Plan Premium',
        //         'valor' => 3000000
        //     ]
        // ];

        return $planes;
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