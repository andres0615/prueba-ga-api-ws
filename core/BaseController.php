<?php

class BaseController {
    public function getRequestData() {
        $data = array_merge($_GET, $_POST);
        return $data;
    }

    public function jsonResponse(array $data): void {
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }
}