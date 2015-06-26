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
            $title = $_POST['title'];
            $description = $_POST['description'];
            $authorName = $_SESSION['username'];
            $created = $this->issuesModel->createIssue($title, $description, $authorName);

            if ($created) {
                $this->redirectToUrl('/');
            }
            else {
                die ("Can not create issue!");
            }
        }
    }

    public function edit() {
        if ($this->isPost()) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $state = $_POST['state'];
            $id = $_POST['id'];
            $created = $this->issuesModel->editIssue($title, $description, $state, $id);

            if ($created) {
                $this->redirectToUrl('/issues/details/' . $id);
            }
            else {
                die ("Can not edit issue!");
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
            $comment = $_POST['comment'];
            $id = $_POST['id'];
            $authorName = $_SESSION['username'];
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