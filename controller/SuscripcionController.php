<?php

class SuscripcionController {
    private $suscripcionModel;
    private $view;

    public function __construct($suscripcionModel, $view) {
        $this->suscripcionModel = $suscripcionModel;
        $this->view = $view;
    }

    public function list() {
        $data['suscripcion'] = $this->suscripcionModel->getSuscripcion();
        $this->view->render('suscripcionView.mustache', $data);
    }

    public function listarSuscripcion(){
        $data['suscripcion'] = $this->suscripcionModel->getSuscripcion();     
    }
    public function desuscribirse()
    {
      $valor = $_GET["2"];
      $this->suscripcionModel->borrar($valor);
      Redirect::doIt("/content");
    }
}