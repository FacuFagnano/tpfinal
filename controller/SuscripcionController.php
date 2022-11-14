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
    public function baja()
    {
      $valor = $_POST["codigo"];
      $this->suscripcionModel->borrar($valor);
      Redirect::doIt("/content");
    }
    public function altaSuscripcion(){
        $data['suscripcion'] = $this->suscripcionModel->insertarSuscripcion();     
    }
    public function verListaDeSuscripciones() {
        $data['suscripcion'] = $this->suscripcionModel->getSuscripcion();
        $this->view->render('altaSuscripcionView.mustache', $data);
    }
}