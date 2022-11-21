<?php

class SectionController
{
    private $sectionModel;
    private $view;
    private $logger;

    public function __construct($sectionModel, $view, $logger){
        $this->sectionModel = $sectionModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(){
        $data['sections'] = $this->sectionModel->getSection();
        $data['logueado'] = $_SESSION["logueado"];
        $this->logger->info("Estas son las secciones: " . json_encode($data['sections']));
        $this->view->render('edicionView.mustache', $data);
    }

    public function itemSeleccionado(){
        $this->view->render('contentView.mustache');
    }
}