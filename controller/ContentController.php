<?php

class ContentController {
    private $contentModel;
    private $view;

    public function __construct($contentModel, $view) {
        $this->contentModel = $contentModel;
        $this->view = $view;
    }

    public function list() {
        #$data['logueado'] = $_SESSION["logueado"];
        $this->view->render('contentView.mustache'/*, $data*/);
    }
}