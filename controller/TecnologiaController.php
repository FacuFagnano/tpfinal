<?php

class tecnologiaController {
    private $tecnologiaModel;
    private $renderer;
    private $logger;

    public function __construct($tecnologiaModel, $view, $logger)
    {
        
        $this->tecnologiaModel = $tecnologiaModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list()
    {
        $this->renderer->render('tecnologiaView.mustache');
    }

}