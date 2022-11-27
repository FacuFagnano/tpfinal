<?php

class ReportController {
    private $reportModel;
    private $view;
    private $logger;

    public function __construct($reportModel, $view, $logger) {
        $this->reportModel = $reportModel;
        $this->view = $view;
        $this->logger = $view;
    }

    public function list() {
        
        if($_SESSION["RoleType"][0]["ROL"] == 1){
        $data["countUser"] = $this->reportModel->getCountUser();        
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
             $this->view->render('reportUser.mustache',$data);
        }

        else{

             $this->view->render('errorAdminView.mustache');
        }
    }


}