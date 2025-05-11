<?php

class QuoteController extends BaseController {
    public function index()
    {
        echo "API WS";
    }

    public function cotizar()
    {
        try {

            $quoteModel = new QuoteModel();
            $requestData = $this->getRequestData();

            $response = $quoteModel->cotizar($requestData);

            $this->jsonResponse($response);

        } catch (Throwable $e) {
            // echo $e->getMessage();
            $response = [
                'error' => 'Error al procesar la solicitud',
                'message' => $e->getMessage()
            ];
            $this->jsonResponse($response);
        }
    }
}