
<?php

class verifyNotesController
{
    private $verifyNotesModel;
    private $view;
    private $logger;

    public function __construct($verifyNotesModel, $view,$logger) {
        $this->verifyNotesModel = $verifyNotesModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list() {

        $data['notes'] = $this->verifyNotesModel->getNotesToVerify();
        $this->logger->info("este es data el notes " . json_encode($data['notes']));
        $_SESSION["RoleType"]= $this->loginModel->getRol($_SESSION["logueado"]);
        $ID_ROL= $_SESSION["RoleType"][0]["ROL"];
        $this->logger->info("Mostramos ROL: " . $ID_ROL);
        if($_SESSION["RoleType"][0]["ROL"] == 1 || $_SESSION["RoleType"][0]["ROL"] == 2 ){
                    $data["report"] = $this->reportModel->getCountUser();
                    $this->view->render('verifyNotesView.mustache', $data);
                }
            else{
                $this->view->render('errorAdminView.mustache');
            }
    }



}