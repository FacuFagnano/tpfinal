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

        $data['user'] = $this->ValidarModel->validateUser();
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
            $_SESSION['logueado'] = $buscarArray["ID_PASS"];

            
            if (password_verify($pass, $buscarArray["PASS"])) {
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
