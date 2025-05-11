<?php

class BaseController {
    public function getRequestData() {
        // $data = array_merge($_GET, $_POST);
        $json = file_get_contents('php://input');

        $data = json_decode($json, true);
        return $data;
    }

    public function jsonResponse(array $data): void {
        header('Content-Type: application/json');
        echo json_encode($data);
        return;
    }
}