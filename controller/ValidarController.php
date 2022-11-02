<?php

class ValidarController
{
    private $ValidarModel;
    private $renderer;
    private $logger;

    public function __construct($ValidarModel, $view, $logger) {
        $this->ValidarModel = $ValidarModel; #* parametro
        $this->renderer = $view; #* parametro
        $this->logger = $logger; #* parametro
    }

    public function list() {
        $data['user'] = $this->ValidarModel->validateUser(); #* me guardo el usuario que esta logueado.
        $this->logger->info("Se valido usuario OKss"); #* imprimo que el usuario de valido correctamente.
        $this->renderer->render('tourView.mustache',$data); #* muestra en pantalla, por medio del view, la interfaz de tour.
    }

    function controlarSesion(){
        $mail  = $_POST['mail'] ?? ''; #* si recibe un dato por el metodo post, entonces lo toma. Sino es un string vacio.
        $pass = $_POST['pass'] ?? '';
        
        //CLAVE OK: rasmuslerdorf
        $userInPasswordTable = $this->ValidarModel->getUsuario($mail);#? verifica que el usuario este en la tabla password y devuelve todos los datos del mismo.
        var_dump($userInPasswordTable);
        $hola = json_encode($userInPasswordTable);
        $this->logger->info($hola);
        foreach ($userInPasswordTable as $buscarArray) { #? por que un foreach si es un solo resultado? Es por los datos de ese usuario encontrado?
            $data['prueba'] = $buscarArray["ID_PASS"];#? Le asigna en el session el id del usuario logueado.
            if (password_verify($pass, $buscarArray["PASS"])) {
                $this->logger->info("USUARIO LOGUEADO");
                $this->renderer->render('contentView.mustache',$data);
                //Redirect::doIt("/");
                #! redireccion con header.
            } else {
                $this->logger->info("USUARIO INTENTO LOGUEARSE");
                #! redireccion con header.
            }
        }
    }


}
