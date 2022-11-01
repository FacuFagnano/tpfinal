<?php

class RevistaController {

    private $view;

    public function __construct($view, $logger) {
        $this->view = $view;
    }

    public function list() {
        $this->view->render('revistaView.mustache');
    }
}