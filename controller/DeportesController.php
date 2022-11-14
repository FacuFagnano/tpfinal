<?php

class DeportesController {
    private $deporteModel;
    private $renderer;
    private $logger;

    public function __construct($deporteModel, $view, $logger)
    {
        
        $this->deporteModel = $deporteModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list()
    {
        $this->renderer->render('deportesView.mustache');
    }

}