<?php

class IssueModel extends BaseModel {

    public function getAll() {
        $statement = self::$db->query("SELECT * FROM issues");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }
}