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
        //$data['dailys'] = $this->dailyModel->getDaily();
        $data['dailys'] = $this->dailyModel->getDailyNotLogin();
        $this->logger->info('Este es el data del controller, en la key Daily '. json_encode($data['dailys']));
        $data['logueado'] = !empty($_SESSION["logueado"]);
        $this->view->render('homeView.mustache', $data);
    }


    public function listarDiarios(){
        $data['dailys'] = $this->dailyModel->getDaily();    
    }
}
