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
include_once("model/SuscripcionModel.php");
include_once("model/DeportesModel.php");
include_once("model/EconomiaModel.php");
include_once("model/TecnologiaModel.php");
include_once("model/adminModel.php");
include_once("model/UserListModel.php");
include_once("model/NewNoteModel.php");
include_once("model/DailyModel.php");
include_once("model/EdicionModel.php");


include_once('controller/RegistryController.php');
include_once('controller/ContentController.php');
include_once('controller/RevistaController.php');
include_once('controller/LoginController.php');
include_once('controller/ValidarController.php');// LR Validacion Usuarios
include_once("controller/SuscripcionController.php");
include_once("controller/DeportesController.php");
include_once("controller/EconomiaController.php");
include_once("controller/TecnologiaController.php");
include_once("controller/adminController.php");
include_once("controller/UserListController.php");
include_once("controller/NewNoteController.php");
include_once("controller/DailyController.php");
include_once("controller/EdicionController.php");

include_once ('dependencies/mustache/src/Mustache/Autoloader.php');

class Configuration {
    private $database;
    private $view;
    private $logger;

    public function __construct() {
        $this->database = new MySQlDatabase();
        $this->view = new MustacheRenderer("view/", 'view/partial/');
        $this->logger = new Logger();
    }

    public function getRegistryController() {
        return new RegistryController($this->getMailController(),$this->getRegistryModel(), $this->view, $this->logger);
    }

    public function getContentController() {
        return new ContentController($this->createContentModel(), $this->view);
    }

    public function getRevistaController() {
        return new RevistaController($this->view);
    }

    public function getLoginController(){
        return new LoginController($this->getLogInModel(),$this->view,$this->logger);
    }

    public function getValidarController(){
        return new ValidarController($this->getValidarModel(),$this->view,$this->logger);
    }

    public function getSuscripcionController(){
        return new SuscripcionController($this->getSuscripcionModel(),$this->view,$this->logger);
    }
    public function getDeportesController(){
        return new DeportesController($this->getDeportesModel(),$this->view,$this->logger);
    }
    public function getEconomiaController(){
        return new EconomiaController($this->getEconomiaModel(),$this->view,$this->logger);
    }
    public function getTecnologiaController(){
        return new TecnologiaController($this->getTecnologiaModel(),$this->view,$this->logger);
    }
    public function getAdminController(){
        return new AdminController($this->getAdminModel(),$this->view,$this->logger);
    }
    public function getUserListController(){
        return new UserListController($this->getUserListModel(),$this->view,$this->logger);
    }
    public function getNewNoteController(){
        return new NewNoteController($this->getNewNoteModel(),$this->view,$this->logger);
    }

    public function getdailyController(){
        return new DailyController($this->getDailyModel(),$this->view,$this->logger);
    }
    public function getEdicionController(){
        return new EdicionController($this->getEdicionmodel(),$this->view,$this->logger);
    }
    private function getMailController()
    {
        require_once("controller/MailController.php");
        require_once("helpers/PHPMailer.php");
        require_once("helpers/Exception.php");
        require_once("helpers/SMTP.php");

        return new MailController();
    }

    private function getEdicionModel(): EdicionModel {
        return new EdicionModel($this->database);
    }

    private function getDailyModel(): DailyModel {
        return new DailyModel($this->database,$this->logger);
    }

    private function getUserListModel(): UserListModel {
        return new UserListModel($this->database,$this->logger);
    }
    private function getAdminModel(): AdminModel {
        return new AdminModel($this->database);
    }

    private function getTecnologiaModel(): TecnologiaModel {
        return new TecnologiaModel($this->database);
    }

    private function getEconomiaModel(): EconomiaModel {
        return new EconomiaModel($this->database);
    }

    private function getDeportesModel(): DeportesModel {
        return new DeportesModel($this->database);
    }

    private function getSuscripcionModel(): SuscripcionModel {
        return new SuscripcionModel($this->database,$this->logger);
    }

    private function createValidarModel(): ValidarModel {
        return new ValidarModel($this->database,$this->logger);
    }

    private function createContentModel(): ContentModel {
        return new ContentModel($this->database);
    }

    private function getRegistryModel(): RegistryModel {
        return new RegistryModel($this->database, $this->logger);
    }

    private function createLoginModel(): LoginModel {
        return new LoginModel($this->database,$this->logger);
    }

    public function getRouter($defaultController, $defaultMethod) {
        
        return new Router($this, $defaultController, $defaultMethod);
    }


    private function getLogInModel() {
        return new LoginModel($this->database, $this->logger);
    }

    public function getValidarModel() {
        return new ValidarModel($this->database, $this->logger);
    }

    public function getNewNoteModel() {
        return new NewNoteModel($this->database, $this->logger);
    }
}