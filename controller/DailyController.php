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
        
        $data['dailys'] = $this->dailyModel->getDaily();
        $this->logger->info("Estos son los diarios: " . json_encode($data['diarios']));
        $data['logueado'] = !empty($_SESSION["logueado"]);
        $this->view->render('dailyView.mustache', $data);
    }


    public function listarDiarios(){
        $data['dailys'] = $this->dailyModel->getDaily();    
    }
}
