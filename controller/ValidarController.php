<?php

class ValidarController
{
    private $validarModel;
    private $renderer;
    private $logger;

    public function __construct($validarModel, $view, $logger) {
        $this->validarModel = $validarModel; #* parametro
        $this->renderer = $view; #* parametro
        $this->logger = $logger; #* parametro
    }

    public function list() {
        $data['user'] = $this->validarModel->validateUser(); #* me guardo el usuario que esta logueado.
        $this->renderer->render('tourView.mustache',$data); #* muestra en pantalla, por medio del view, la interfaz de tour.
    }


    #! --------------------------- CONFIRMACION DE CUENTA DEL USUARIO ---------------------------

    public function confirmAccount(){
        $code = $_GET["code"];
        $email = $_GET["email"];
        if($this->validarModel->activateAccount($code,$email)){
            $this->renderer->render('validateUserView.mustache');
        }else{
            $this->renderer->render('userNotValidate.mustache');
        }
    }
}
