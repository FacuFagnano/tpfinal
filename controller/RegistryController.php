<?php
#* --------------------------------------------------- ↓↓ CONTROLADOR DEL REGISTRO DE USUARIOS ↓↓ ---------------------------------------------------
class RegistryController
{
    private $registryModel;
    private $renderer;
    private $logger;
    private $mail;

    public function __construct($mail,$registryModel, $view, $logger){
        $this->registryModel = $registryModel;
        $this->renderer = $view;
        $this->mail = $mail;
        $this->logger = $logger;
    }

    public function list(){
        $this->renderer->render('registryView.mustache');
    }

    public function procesarAlta(){
        #! ------------------------------------------ VARIABLES --------------------------------------------
        $name = $_POST['name'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $password = password_hash($_POST["password"] ?? '', PASSWORD_DEFAULT);
        $email = $_POST['email'] ?? '';
        $latitude = $_POST['latitude'] ?? '';
        $longitude = $_POST['longitude'] ?? '';
        $hash_validate = md5(time());
        $this->mail->enviarMail($email, $name, $hash_validate);
        #! ------------------------------------------ REGISTRO LOGIC ---------------------------------------

        $correctAlta = $this->registryModel->alta($name, $lastname, $password, $email,$longitude, $latitude,$hash_validate);
        if ($correctAlta){
            $this->renderer->render('validateUserView.mustache');
        }else{
            Redirect::doIt("/registry");
        }
    }
}

