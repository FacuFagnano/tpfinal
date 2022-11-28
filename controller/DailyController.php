<?php
class DailyController {
    private $dailyModel;
    private $view;
    private $logger;

    public function __construct($dailyModel, $view, $logger){
        $this->dailyModel = $dailyModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    
    public function list(){
        $data['dailys'] = $this->dailyModel->getDailyNotLogin();
        if(!empty($_SESSION["logueado"])){
            $data['subscription'] = $this->dailyModel->getSubscription();
        }
        $data['logueado'] = !empty($_SESSION["logueado"]);
        $this->view->render('homeView.mustache', $data);
    }



    public function listarDiarios(){
        $data['dailys'] = $this->dailyModel->getDaily();    
    }
}
