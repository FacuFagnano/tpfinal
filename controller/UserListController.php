<?php

class UserListController {
    private $userListModel;
    private $renderer;
    private $logger;

    public function __construct($userListModel, $view, $logger)
    {
        
        $this->userListModel = $userListModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list()
    {
        $this->logger->info('ESTOY EN LIST');
        $data["user"] = $this->userListModel->getUsersList();
        $this->logger->info("esto es thisListconttroler" . json_encode($data["user"]));
        $this->renderer->render('userListView.mustache', $data);
    }
    public function updateDataUser()
    {
        $this->logger->info('ESTOY EN updateDataUser');
        $codigo = $_POST["codigo"];
        $id = $_POST["userId"];

        $this->logger->info($codigo);
        $this->logger->info($codigo);
       
        $this->userListModel->updateRole($codigo,$id);
       // $this->logger->info("esto es thisListconttroler" . json_encode($data["user"]));
        //$this->renderer->render('userListView.mustache', $data);
    }
    public function deleteDataUser()
    {
        $user = $_GET["userId"];
        $this->userListModel->deleteUsers($user);

    }
    public function modifyDataUser()
    {
        $user = $_GET["userId"];
        $data["userModify"] = $this->userListModel->getModifyUsers($user);
        $this->renderer->render('modifyUserView.mustache', $data);

    }

    

  
    

}