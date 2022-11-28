<?php

class NoteSendToVerifyController {
    private $view;
    private $logger;

    public function __construct($view, $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(){
        $this->view->render('noteSendToVerifyView.mustache');
    }

}