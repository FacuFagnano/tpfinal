<?php

class LoginController {

    private $loginModel;
    private $renderer;

    public function __construct($loginModel,$view) {
        $this->loginModel = $loginModel;
        $this->renderer = $view;
        
    }

    public function list() {
        
        $this->renderer->render('loginView.mustache');


    }

    public function activarLogin(){

        echo "Usuario Activado";
        echo "<br>";
        echo "PRESIONAR VOLER";//Redirect::doIt("/");
    }
	/*
    public function procesarlogin()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $this->registryModel->login($email,$password);

        Redirect::doIt("login");
    }
    private $renderer;
    private $model;

    public function __construct($render, $model) {
        $this->renderer = $render;
        $this->model = $model;
    }

    public function list() {
        $this->renderer->render();
    }

    public function alta(){
        $this->renderer->render("loginView.mustache");
    }

    public function procesarAlta(){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $geoposition = $_POST["geoposition"];


        $this->model->alta($nombre,$apellido, $geoposition);

        Redirect::doIt('/');
    }
*/
}