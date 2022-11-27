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
        $data["report"] = $this->reportModel->getCountUser();        
        $this->view->render('reportView.mustache',$data);
        }
        else{
            $this->view->render('errorAdminView.mustache');
        }
    }

    public function reportUser(){
        $this->view->render('reportUser.mustache');
    }


}