<?php

class SuscripcionController {
    private $suscripcionModel;
    private $view;
    private $logger;

    public function __construct($suscripcionModel, $view,$logger) {
        $this->suscripcionModel = $suscripcionModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list() {
        $data['subscription'] = $this->suscripcionModel->getSubscription();
        $this->view->render('suscripcionActivaView.mustache', $data);
    }

    public function listarSuscripcion(){
        $data['subscription'] = $this->suscripcionModel->getSubscription();
    }


    public function registerSubscription(){
        $this->logger->info("entre altaSuscripcion");
        $user = $_SESSION["logueado"];
        $daily = $_POST["dailyId"];
        $this->logger->info(" Este es el usuario". $user . " Este es diario:" . $daily);
        $this->suscripcionModel->insertNewSubscription($user,$daily);
        Redirect::doIt("/suscripcion");
    }

    public function showSuscriptionList() {
        $data['noneSubscription'] = $this->suscripcionModel->getNotSubscription();
        $this->logger->info("Este es el showSuscription DATA: " . json_encode($data['noneSubscription']));
        $this->view->render('suscripcionNuevaView.mustache', $data);
    }

    public function unregister(){
        $this->logger->info("entre bajaDesuscripcion");
        $user = $_SESSION["logueado"];
        $daily = $_POST["dailyId"];

        $data['subscription'] = $this->suscripcionModel->unsubscribe($user,$daily);
        Redirect::doIt("/suscripcion");    
    }


}