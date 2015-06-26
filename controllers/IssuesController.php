<?php

class IssuesController extends BaseController {
    public function onInit() {
        $this->title = 'Issues';
        $this->issuesModel = new IssueModel();
    }

    public function index() {
        $this->issues = $this->issuesModel->getAll();
    }

    public function create() {
    }
}