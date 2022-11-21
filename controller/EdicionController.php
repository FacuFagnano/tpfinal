<?php
class EdicionController
{

    private $edicionModel;
    private $view;
    private $logger;

    public function __construct($edicionModel, $view, $logger){
        $this->edicionModel = $edicionModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(){
        $data['editions'] = $this->edicionModel->getEdition();
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('edicionView.mustache', $data);
    }
    
    public function itemSeleccionado(){
        $this->view->render('contentView.mustache');
    }
}