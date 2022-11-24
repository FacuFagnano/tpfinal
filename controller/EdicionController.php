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
        $data['editions'] = $this->edicionModel->getEdition();
        $data['editionsItem'] = $this->edicionModel->getDailySession();
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('edicionView.mustache',$data);
       
    }
    
    
    public function seccion(){
        $data['editionsItem'] = $this->edicionModel->getDailySession();
        $this->view->render('seccionView.mustache',$data);
    }

    public function notas(){
        $data['editionsNotas'] = $this->edicionModel->getNotasSession();
        $this->view->render('notasEdicionView.mustache',$data);
    }
}