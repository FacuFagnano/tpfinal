<?php

class adminController {
    private $adminModel;
    private $renderer;
    private $logger;

    public function __construct($adminModel, $view, $logger)
    {
        
        $this->adminModel = $adminModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list()
    {
        $this->renderer->render('adminView.mustache');
    }

    public function listadoDeArticulos()
    {
        $this->renderer->render('listadoDeArticulosView.mustache');
    }
    public function nuevoDocumento()
    {
        $this->renderer->render('NewNoteView.mustache');
    }

}