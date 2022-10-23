<?php

class ContentController {
    private $contentModel;
    private $view;

    public function __construct($contentModel, $view) {
        $this->contentModel = $contentModel;
        $this->view = $view;
    }

    public function list() {
       // $data['content'] = $this->contentModel->getContent();
        $this->view->render('contentView.mustache'/*, $data*/);
    }
}