<?php

class ValidarController
{
    private $ValidarModel;
    private $renderer;
    private $logger;

    public function __construct($ValidarModel, $view, $logger) {
        $this->ValidarModel = $ValidarModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list() {

        $data['user'] = $this->ValidarModel->getLogin1();
        $this->logger->info("Se valido usuario OKss");
        $this->renderer->render('tourView.mustache',$data);
    }

    
function controlarSesion()
    {
        $mail  = $_POST['mail'] ?? '';
        $pass = $_POST['pass'] ?? '';

        echo $mail;
        echo '<br>';
        echo $pass;
        
        //CLAVE OK: rasmuslerdorf
        $validacion = $this->ValidarModel->getUsuario($mail);
        foreach ($validacion as $buscarArray) {
            $_SESSION['usuario_id'] = $buscarArray["ID"];
            $_SESSION['tipoUsuario'] = $buscarArray["ROL"];
            
            if (password_verify($_POST["pass"], $buscarArray["PASSWORD"])) {
                echo '<br>';
                echo $this->logger->info("USUARIO LOGUEADO");
                echo 'Contraseña Valida';
                
            } else {
                echo '<br>';
                echo $this->logger->info("USUARIO INTENTO LOGUEARSE");
                echo 'contraseña Erronea';
            }
        }
        

       
        
    }


}
