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
        $this->logger->info($data);
        $this->renderer->render('userListView.mustache', $data);
    }

  
    

}