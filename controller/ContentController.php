<?php

class ContentController {
    private $contentModel;
    private $view;

    public function __construct($contentModel, $view) {
        $this->contentModel = $contentModel;
        $this->view = $view;
    }

    public function list() {
        $data['publicaciones'] = $this->contentModel->getContent();
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('contentView.mustache', $data);
    }

    public function listarPublicaciones(){
        $data['publicaciones'] = $this->contentModel->getContent();     
    }
}