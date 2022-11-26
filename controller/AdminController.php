<?php

class adminController {
    private $adminModel;
    private $view;
    private $logger;

    public function __construct($adminModel, $view, $logger)
    {
        
        $this->adminModel = $adminModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list()
    {
        
        if($_SESSION["RoleType"][0]["ROL"] == 1){
                
        $this->view->render('adminView.mustache');
        }
        else{
            $this->view->render('errorAdminView.mustache');
        }
    }

    public function listadoDeArticulos()
    {
        $this->view->render('listPendingArticlesView.mustache');
    }
    public function nuevoDocumento()
    {
        $this->view->render('NewNoteView.mustache');
    }

}