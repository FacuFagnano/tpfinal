<?php

class NoteNotSendToVerifyController {
    private $view;
    private $logger;

    public function __construct($view, $logger)
    {
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(){
        $this->view->render('noteNotSendToVerifyView.mustache');
    }

}