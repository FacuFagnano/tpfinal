<?php

class ReportController {
    private $reportModel;
    private $view;
    private $logger;

    public function __construct($reportModel, $view, $logger) {
        $this->reportModel = $reportModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list() {
        
        if($_SESSION["RoleType"][0]["ROL"] == 1){
        $data["report"] = $this->reportModel->getCountUser();        
        $this->view->render('reportView.mustache',$data);
        }
        else{
            $this->view->render('errorAdminView.mustache');
        }
    }

    public function reportUser(){
        if($_SESSION["RoleType"][0]["ROL"] == 1){
             $data["countUser"] = $this->reportModel->getCountUser();
             $data["countDailys"] = $this->reportModel->getCountdailys();
             $data["countSalesDailys"] = $this->reportModel->getCountSalesDailys();
             $data["dailysName"] = $this->reportModel->getDailysNames();
             $this->view->render('reportUserView.mustache',$data);
        }
        else{
             $this->view->render('errorAdminView.mustache');
        }
    }


}

//[diario1,diario2,diario3]
//[{"dailyName":"Ambito"},{"dailyName":"Pronto"},{"dailyName":"Infobae"},{"dailyName":"Clarin"},{"dailyName":"La Nacion"}]
