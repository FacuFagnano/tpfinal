<?php
session_start();
include_once ("helpers/Redirect.php");
include_once('helpers/MySQlDatabase.php');
include_once('helpers/MustacheRenderer.php');
include_once('helpers/Logger.php');
include_once('helpers/Router.php');

include_once('model/ContentModel.php');
include_once('model/RegistryModel.php');
include_once("model/LoginModel.php");
include_once("model/ValidarModel.php"); // LR Validacion Usuarios

include_once('controller/RegistryController.php');
include_once('controller/ContentController.php');
include_once('controller/RevistaController.php');
include_once('controller/LoginController.php');
include_once('controller/ValidarController.php');// LR Validacion Usuarios

include_once ('dependencies/mustache/src/Mustache/Autoloader.php');

class Configuration {
    private $database;
    private $view;

    public function __construct() {
        $this->database = new MySQlDatabase();
        $this->view = new MustacheRenderer("view/", 'view/partial/');
    }

    public function getRegistryController() {
        return new RegistryController($this->getRegistryModel(), $this->view, new Logger());
    }

    public function getContentController() {
        return new ContentController($this->createContentModel(), $this->view);
    }

    public function getRevistaController() {
        return new RevistaController($this->view);
    }

    public function getLoginController(){
        return new LoginController($this->getLogInModel(),$this->view);
    }

    public function getValidarController(){
        return new ValidarController($this->getValidarModel(),$this->view,new Logger());
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
        return new LoginModel($this->database);
    }

    public function getRouter() {
        return new Router($this, "revista", "list");
    }

    private function getLogInModel() {
        return new LoginModel($this->database);
    }

    public function getValidarModel() {
        return new ValidarModel($this->database);
    }
}