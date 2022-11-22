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
        $data['suscripcion'] = $this->suscripcionModel->getSuscripcion();
        $this->view->render('suscripcionActivaView.mustache', $data);
    }

    public function listarSuscripcion(){
        $data['suscripcion'] = $this->suscripcionModel->getSuscripcion();     
    }
    public function baja()
    {
      $valor = $_POST["codigo"];
      $this->suscripcionModel->borrar($valor);
      Redirect::doIt("/content");
    }
    public function altaSuscripcion(){
        $this->logger->info("entre altaSuscripcion");
        $user = $_POST["userId"];
        $daily = $_POST["dailyId"];
        $this->logger->info( $user . " " . $daily);
        $this->suscripcionModel->insertarSuscripcion($user,$daily);
        Redirect::doIt("/suscripcion");
    }
    public function verListaDeSuscripciones() {
        $data['suscripcion'] = $this->suscripcionModel->getSuscripcionNuevas();
        $this->view->render('suscripcionNuevaView.mustache', $data);
    }

    public function bajaDesuscripcion(){
        $this->logger->info("entre bajaDesuscripcion");
        $user = $_POST["userId"];
        $daily = $_POST["dailyId"];

        $this->logger->info($user . $daily);
        $data['suscripcion'] = $this->suscripcionModel->bajaSuscripcion($user,$daily);
        Redirect::doIt("/suscripcion");    
    }


}