<?php
class EdicionController
{

    private $edicionModel;
    private $renderer;
    private $logger;

    public function __construct($edicionModel, $view, $logger)
    {
        
        $this->edicionModel = $edicionModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list(){
        $this->renderer->render('edicionView.mustache');
    }
    
    public function seccion(){
        $this->renderer->render('itemEdicionView.mustache');
    }

    public function notas(){
        $this->renderer->render('notasEdicionView.mustache');
    }
}