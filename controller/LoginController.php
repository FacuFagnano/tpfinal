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

        #? verifica que el usuario este en la tabla password y devuelve todos los datos del mismo.
        $userInPasswordTable = $this->loginModel->getUsers($email);
        if ($userInPasswordTable == []) {
            Redirect::doIt("/login"); #! ESTO ES VIEW?
        } else {
            #? guardamos los datos del usuario para obtener el numero de sesion.
            if($this->loginModel->passwordValidation($userInPasswordTable, $password)){
                $_SESSION["logueado"]=1;
                Redirect::doIt("/content");
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