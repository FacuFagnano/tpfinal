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
        $data['listEdition'] = $this->adminModel->getListEdition();
        //$this->logger->info("Estos son los articulos pendientes: " . json_encode($data['sectionAll']));
        $this->view->render('controlManagementSectionView.mustache',$data);
    }

    public function ManagementEdition()
    {
        $data['editionAll'] = $this->adminModel->getListAllEdition();
        $data['dailyEdition'] = $this->adminModel->getListDaily();
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

    public function updateDataSection()
    {
        
        $codigo = $_POST["codigo"];
        $id = $_POST["userId"];
      
        $this->adminModel->updateRole($codigo,$id);

    }

    public function newEdition(){

        $title = "nuevaIMAGEN";
        $image = $_FILES["image"];
        $precio = $_POST["precio"];
        $daily = $_POST["dailyId"];
        $descripcion = $_POST["descripcion"];

        $this->logger->info(" Recibo diario = " . $daily . " Descripcion : " . $descripcion . " Precio = " . $precio );

        $imageName = str_replace(" ", "_", $title);
        $rutaArchivoTemporal = $_FILES["image"]["tmp_name"];
        $rutaArchivoFinal = "public/w3images/" . $imageName . "photo.jpg";
        move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

       $this->logger->info("Ruta de archivo final: " . $rutaArchivoFinal);

        
        $this->adminModel->sendEditionNew($precio,$descripcion, $rutaArchivoFinal, $daily);
        Redirect::doIt("/admin/ManagementEdition");

    }

    public function newSection(){

        $title = "nuevaIMAGEN";
        $image = $_FILES["image"];
       
        $editionId = $_POST["editionID"];
        $descripcion = $_POST["descripcion"];

        $this->logger->info(" Recibo diario = " . $editionId . " Descripcion : " . $descripcion  );

        $imageName = str_replace(" ", "_", $title);
        $rutaArchivoTemporal = $_FILES["image"]["tmp_name"];
        $rutaArchivoFinal = "public/w3images/" . $imageName . "photo.jpeg";
        move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

        $this->logger->info("Ruta de archivo final: " . $rutaArchivoFinal);


        
        $this->adminModel->sendSectionNew($descripcion, $rutaArchivoFinal, $editionId);
        Redirect::doIt("/admin/ManagementSection");

    }

    

}