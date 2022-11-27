<?php
class DailyController {
    private $dailyModel;
    private $view;
    private $logger;

    public function __construct($dailyModel, $view, $logger){
        $this->dailyModel = $dailyModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    
    public function list(){
        $data['dailys'] = $this->dailyModel->getDailyNotLogin();
        if(!empty($_SESSION["logueado"])){
            $data['subscription'] = $this->dailyModel->getSubscription();
            $user_role= $_SESSION["RoleType"][0]["ROL"];
            switch ($user_role){
                case 1:
                    $this->logger->info("Entre en el caso 1: ");
                    $data["role1"] = 1;
                    break;
                case 2:
                    $this->logger->info("Entre en el caso 2: ");
                    $data["role2"] = 2;
                    break;
                case 3:
                    $this->logger->info("Entre en el caso 3: ");
                    $data["role3"] = 3;
                    break;
                default:
                    $this->logger->info("Entre en el caso 4: ");
                    $data["role4"] = 4;
                    break;
            }

        }
        $data['logueado'] = !empty($_SESSION["logueado"]);
        $this->view->render('homeView.mustache', $data);
    }


    public function listarDiarios(){
        $data['dailys'] = $this->dailyModel->getDaily();    
    }
}
