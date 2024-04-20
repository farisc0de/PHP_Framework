<?php

namespace App\Services;

use Framework\Model;

class Settings extends Model
{
    protected $table = "settings";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {

            $this->addError("name", "Name is required");
        }
    }

    public function set($name, $value)
    {
        $this->update($name, ["value" => $value]);
    }

    public function get($name)
    {
        $sql = "SELECT value
                FROM {$this->table}
                WHERE name = ?";

        $conn = $this->database->getConnection();

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $name, \PDO::PARAM_STR);

        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row["value"];
    }
}
