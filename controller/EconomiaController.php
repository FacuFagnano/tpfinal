<?php

class EconomiaController {
    private $economiaModel;
    private $renderer;
    private $logger;

    public function __construct($economiaModel, $view, $logger)
    {
        
        $this->economiaModel = $economiaModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list()
    {
        $this->renderer->render('economiaView.mustache');
    }

}