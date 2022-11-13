<?php
include_once ("helpers/Redirect.php");
include_once('helpers/MySQlDatabase.php');
include_once('helpers/MustacheRenderer.php');
include_once('helpers/Logger.php');
include_once('helpers/Router.php');

include_once('model/ContentModel.php');
include_once('model/RegistryModel.php');
include_once("model/LoginModel.php");
include_once("model/ValidarModel.php"); // LR Validacion Usuarios
include_once("model/suscripcionModel.php");


include_once('controller/RegistryController.php');
include_once('controller/ContentController.php');
include_once('controller/RevistaController.php');
include_once('controller/LoginController.php');
include_once('controller/ValidarController.php');// LR Validacion Usuarios
include_once("controller/suscripcionController.php");

include_once ('dependencies/mustache/src/Mustache/Autoloader.php');

class Configuration {
    private $database;
    private $view;

    public function __construct() {
        $this->database = new MySQlDatabase();
        $this->view = new MustacheRenderer("view/", 'view/partial/');
    }

    public function getRegistryController() {
        return new RegistryController($this->getMailController(),$this->getRegistryModel(), $this->view, new Logger());
    }

    public function getContentController() {
        return new ContentController($this->createContentModel(), $this->view);
    }

    public function getRevistaController() {
        return new RevistaController($this->view);
    }

    public function getLoginController(){
        return new LoginController($this->getLogInModel(),$this->view,new Logger());
    }

    public function getValidarController(){
        return new ValidarController($this->getValidarModel(),$this->view,new Logger());
    }

    public function getSuscripcionController(){
        return new SuscripcionController($this->getSuscripcionModel(),$this->view);
    }
    private function getMailController()
    {
        require_once("controller/MailController.php");
        require_once("helpers/PHPMailer.php");
        require_once("helpers/Exception.php");
        require_once("helpers/SMTP.php");

        return new MailController();
    }

    private function getSuscripcionModel(): SuscripcionModel {
        return new SuscripcionModel($this->database);
    }

    private function createValidarModel(): ValidarModel {
        return new ValidarModel($this->database);
    }

    private function createContentModel(): ContentModel {
        return new ContentModel($this->database);
    }

    private function getRegistryModel(): RegistryModel {
        return new RegistryModel($this->database, new Logger());
    }

    private function createLoginModel(): LoginModel {
        return new LoginModel($this->database,new Logger());
    }

    public function getRouter($defaultController, $defaultMethod) {
        
        return new Router($this, $defaultController, $defaultMethod);
    }


    private function getLogInModel() {
        return new LoginModel($this->database, new Logger());
    }

    public function getValidarModel() {
        return new ValidarModel($this->database);
    }
}