<?php

class IssuesController extends BaseController {
    public function onInit() {
        $this->title = 'Issues';
        $this->issuesModel = new IssueModel();
    }

    public function index() {
    }

    public function create() {
        if ($this->isPost()) {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $authorName = htmlspecialchars($_SESSION['username']);
            $created = $this->issuesModel->createIssue($title, $description, $authorName);

            if ($created) {
                $this->addInfoNotification($authorName. ' created a issue about "' . $title . '""');
                $this->redirectToUrl('/');
            }
            else {
                $this->addInfoNotification($authorName. ' can not create issue about "' . $title . '""');
            }
        }
    }

    public function edit() {
        if ($this->isPost()) {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $state = htmlspecialchars($_POST['state']);
            $id = htmlspecialchars($_POST['id']);
            $created = $this->issuesModel->editIssue($title, $description, $state, $id);

            if ($created) {
                $this->addInfoNotification('You successfully edit issue "' . $title . '""');
                $this->redirectToUrl('/issues/details/' . $id);
            }
            else {
                $this->addInfoNotification('You can\'t edit issue "' . $title . '""');
            }
        }
        else {
            $this->issue = $this->issuesModel->getIssueById($this->params[0]);
        }
    }

    public function details() {
        $this->issue = $this->issuesModel->getIssueById($this->params[0]);
        $this->comments = $this->issuesModel->getIssueComments($this->params[0]);
    }

    public function comment() {
        if ($this->isPost()) {
            $comment = htmlspecialchars($_POST['comment']);
            $id = $_POST['id'];
            $authorName = htmlspecialchars($_SESSION['username']);
            $created = $this->issuesModel->createComment($comment, $id, $authorName);

            if ($created) {
                $this->redirectToUrl('/issues/details/' . $id);
            }
            else {
                die ("Can not create issue!");
            }
        }
    }
}