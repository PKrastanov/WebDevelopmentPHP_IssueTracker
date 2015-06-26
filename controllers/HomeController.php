<?php

class HomeController extends BaseController {

    public function onInit() {
        $this->title = 'Home';
        $this->issuesModel = new IssueModel();
    }

    public function index() {
        $this->issues = $this->issuesModel->getAllIssues();
    }
}