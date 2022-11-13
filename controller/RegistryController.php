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
        $password = password_hash($_POST["password"] ?? '', PASSWORD_DEFAULT); //? Hash Password. Convierte la password en un hash para que no sea hackeada.
        $email = $_POST['email'] ?? '';
        $geoposition = $_POST['geoposition'] ?? '';
        $hash_validate = 100;
        $this->mail->enviarMail($email, $name, $hash_validate);
        #! ------------------------------------------ REGISTRO LOGIC ---------------------------------------

        $correctAlta = $this->registryModel->alta($name, $lastname, $password, $email, $geoposition);
        if ($correctAlta){
            Redirect::doIt("/validateUser");
            //echo $this->renderer->render('validateUserView.mustache');
        }
        Redirect::doIt("/registry");

        //
    }
}

/*
class RegistryController {
    private $registryModel;
    private $renderer;
    private $logger;

    public function __construct($presentacionesModel, $view, $logger) {
        $this->registryModel = $presentacionesModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list() {
        $data['presentaciones'] = $this->registryModel->getPresentaciones();

        $this->logger->info("RegistryController: listaron las presentaciones");

        $this->renderer->render('tourView.mustache', $data);
    }

    public function alta() {
        $this->renderer->render('tourAltaForm.mustache');
    }

    public function procesarAlta() {
        $fecha  = $_POST['fecha'] ?? '';
        $precio = $_POST['precio'] ?? '';
        $nombre = $_POST['nombre'] ?? '';

        $this->registryModel->alta($nombre,$precio,$fecha);

        Redirect::doIt("presentaciones");
    }
} */

