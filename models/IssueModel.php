<?php

class IssueModel extends BaseModel {

    public function getAllIssues() {
        $statement = self::$db->query("SELECT * FROM issues");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getIssueById($id) {
        $issueStatement = self::$db->prepare("SELECT * FROM Issues WHERE Id = ?");
        $issueStatement->bind_param("i", $id);
        $issueStatement->execute();

        return $issueStatement->get_result()->fetch_assoc();
    }

    public function getIssueComments($id) {
        $commentStatement = self::$db->prepare("SELECT * FROM Comments WHERE issue_id = ?");
        $commentStatement->bind_param("i", $id);
        $commentStatement->execute();

        return $commentStatement->get_result()->fetch_all();
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

    public function editIssue($title, $description, $state, $id) {
        $statement = self::$db->prepare("UPDATE Issues SET title = ?, description = ?, state = ? WHERE id = ?");
        $statement->bind_param("sssi", $title, $description, $state, $id);
        $statement->execute();

        if($statement) {
            return true;
        }

        return false;
    }

    public function createComment($comment, $id, $authorName) {
        $statement = self::$db->prepare("INSERT INTO Comments (content, issue_id, author) VALUES (?, ?, ?)");
        $statement->bind_param("sis", $comment, $id, $authorName);
        $statement->execute();

        if($statement) {
            return true;
        }

        return false;
    }
}