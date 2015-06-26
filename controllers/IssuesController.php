<?php

class IssuesController extends BaseController {
    public function onInit() {
        $this->title = 'Issues';
        $this->issuesModel = new IssueModel();
    }

    public function index() {
        $this->issues = $this->issuesModel->getAllIssues();
    }

    public function create() {
    }

    public function details() {
        $this->issue = $this->issuesModel->getIssueById($this->params[0]);
    }
}