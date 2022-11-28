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

    public function controlManagement()
    {
        $this->view->render('controlManagementView.mustache');
    }

    public function ManagementSection()
    {
        $data['sectionAll'] = $this->adminModel->getListAllSection();
        $this->logger->info("Estos son los articulos pendientes: " . json_encode($data['sectionAll']));
        $this->view->render('controlManagementSectionView.mustache',$data);
    }

    public function ManagementEdition()
    {
        $data['editionAll'] = $this->adminModel->getListAllEdition();
        //$this->logger->info("Estos son los articulos pendientes: " . json_encode($data['sectionAll']));
        $this->view->render('controlManagementEditionView.mustache',$data);
    }
    
    public function deleteSection()
    {
        $id = $_GET["sectionId"];
        $this->adminModel->deleteSectionById($id);

        $this->view->render('controlValidateAdmin.mustache');

    }
    public function deleteEdition()
    {
        $id = $_GET["editionId"];
        $this->adminModel->deleteEditionById($id);

        $this->view->render('controlValidateAdmin.mustache');

    }
    public function modifySection()
    {
        $user = $_GET["sectionId"];
        $data["sectionModify"] = $this->adminModel->getModifySection($user);
        $this->view->render('controlModifySectionView.mustache', $data);

    }

    public function updateDataSection()
    {
        
        $codigo = $_POST["codigo"];
        $id = $_POST["userId"];
      
        $this->adminModel->updateRole($codigo,$id);

    }

    

}