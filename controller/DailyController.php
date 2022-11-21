<?php
class DailyController {
    private $dailyModel;
    private $view;
    private $logger;

    public function __construct($dailyModel, $view, $logger){
        $this->dailyModel = $dailyModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list(){
        $data['dailys'] = $this->DailyModel->getDaily();
        $this->logger->info("Estos son los diarios: " . json_encode($data['diarios']));
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('dailyView.mustache', $data);
    }
}
