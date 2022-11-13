<?php

class SuscripcionController {
    private $subcripcionModel;
    private $view;

    public function __construct($suscripcionModel, $view) {
        $this->suscripcionModel = $suscripcionModel;
        $this->view = $view;
    }

    public function list() {
        #$data['logueado'] = $_SESSION["logueado"];
        $this->view->render('suscripcionView.mustache'/*, $data*/);
    }
}