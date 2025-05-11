<?php

class PlanModel extends BaseModel {
    public function getPlans()
    {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM planes";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $planes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $planes;
    }
}