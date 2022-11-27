<?php
#* --------------------------------------------------- ↓↓ CONTROLADOR DEL LOGIN DE USUARIOS ↓↓ ---------------------------------------------------
class LoginController
{

    private $loginModel;
    private $renderer;
    private $logger;

    public function __construct($loginModel, $view, $logger)
    {
        
        $this->loginModel = $loginModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list(){
        $this->renderer->render('loginView.mustache');
    }

    public function userlogin(){
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $userInPasswordTable = $this->loginModel->getUsers($email);
        $ID_USER= $userInPasswordTable[0]["ID_PASS"];

        
       
        if ($userInPasswordTable == []) {
            Redirect::doIt("/login"); #! ESTO ES VIEW?
        } else {
            if($this->loginModel->passwordValidation($userInPasswordTable, $password)){
                $_SESSION["logueado"]=$ID_USER;
                $this->logger->info("Mostramos usuario: " . $_SESSION["logueado"]);
                $_SESSION["RoleType"]= $this->loginModel->getRol($_SESSION["logueado"]);
                $ID_ROL= $_SESSION["RoleType"][0]["ROL"];
                $this->logger->info("Mostramos ROL: " . $ID_ROL);
                switch($ID_ROL){
                    case 1:
                        $this->logger->info("CASO 1");
                        Redirect::doIt("/admin");
                        break;
                    case 2:
                        $this->logger->info("CASO 2");
                        Redirect::doIt("/daily");
                    break;
                    case 3:
                        $this->logger->info("CASO 3");
                    break;
                    case 4:
                        $this->logger->info("CASO 3");    
                    break;
                }
            }else {
                Redirect::doIt("/login");
            }
        }
    }

  public function cerrarSesion()
    {   
        if(isset($_SESSION['logueado'])){
            
            session_unset();
            session_destroy();
            $this->logger->info("USUARIO CIERRA SESION");
            Redirect::doIt("/login");

            
        }else{
            Redirect::doIt("/login");
            
        }
    }
}