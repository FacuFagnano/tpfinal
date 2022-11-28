<?php
class EdicionController
{

    private $edicionModel;
    private $view;
    private $logger;

    public function __construct($edicionModel, $view, $logger)
    {
        
        $this->edicionModel = $edicionModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(){
        $data['editionsItem'] = $this->edicionModel->getDailySession();
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('edicionView.mustache',$data);
       
    }

    public function getEditionsById(){
        $idDaily = $_POST["dailyIdTable"];
        $data['editions'] = $this->edicionModel->getEdition($idDaily);
        $this->logger->info("Las ediciones de este diario son: " . json_encode($data));
        $this->view->render('edicionView.mustache',$data);
        $this->logger->info("el dailyIdTable es: " . $idDaily);

    }
    
    public function seccion(){
        $data['editionsItem'] = $this->edicionModel->getDailySession();
        $this->logger->info("Estoy en section de EditionController");
        $this->view->render('sectionView.mustache',$data);
    }

    public function notas(){
        $data['editionsNotas'] = $this->edicionModel->getNotasSession();
        $this->view->render('notasEdicionView.mustache',$data);
    }
}