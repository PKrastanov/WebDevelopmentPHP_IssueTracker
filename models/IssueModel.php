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

    public function createIssue($title, $description, $author) {
        $statement = self::$db->prepare("INSERT INTO Issues (title, description, author) VALUES (?, ?, ?)");
        $statement->bind_param("sss", $title, $description, $author);
        $statement->execute();

        if($statement) {
            return true;
        }

        return false;
    }

    public function editIssue($title, $description, $state) {
        $statement = self::$db->prepare("UPDATE Issues SET title = ?, description = ?, state = ?");
        $statement->bind_param("sss", $title, $description, $state);
        $statement->execute();

        if($statement) {
            return true;
        }

        return false;
    }
}