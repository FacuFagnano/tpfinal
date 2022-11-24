<?php
class DailyController {
    private $dailyModel;
    private $view;
    private $logger;

    public function __construct($dailyModel, $view, $logger)
    {
        
        $this->dailyModel = $dailyModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    
    public function list(){
        //$data['dailys'] = $this->dailyModel->getDaily();
        $data['dailys'] = $this->dailyModel->getDailyHome();
       
        $data['logueado'] = !empty($_SESSION["logueado"]);
        $this->view->render('dailyView.mustache', $data);
    }


    public function listarDiarios(){
        $data['dailys'] = $this->dailyModel->getDaily();    
    }
}
