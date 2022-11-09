<?php

class ValidarController
{
    private $ValidarModel;
    private $renderer;
    private $logger;

    public function __construct($ValidarModel, $view, $logger) {
        $this->ValidarModel = $ValidarModel; #* parametro
        $this->renderer = $view; #* parametro
        $this->logger = $logger; #* parametro
    }

    public function list() {
        $data['user'] = $this->ValidarModel->validateUser(); #* me guardo el usuario que esta logueado.
        $this->logger->info("Se valido usuario OKss"); #* imprimo que el usuario se valido correctamente.
        $this->renderer->render('tourView.mustache',$data); #* muestra en pantalla, por medio del view, la interfaz de tour.
    }


    #! --------------------------- LOGIN DEL USUARIO ---------------------------


}
