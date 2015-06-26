<?php

class IssueModel extends BaseModel {

    public function getAllIssues() {
        $statement = self::$db->query("SELECT * FROM issues");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getIssueById($id) {
        $statement = self::$db->prepare("SELECT * FROM Issues WHERE Id = ?");
        $statement->bind_param("s", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
}