<?php

class QuoteController extends BaseController {
    public function index()
    {
        echo "API WS";
    }

    public function cotizar()
    {
        $quoteModel = new QuoteModel();
        $requestData = $this->getRequestData();

        $response = $quoteModel->cotizar($requestData);

        $this->jsonResponse($response);
    }
}