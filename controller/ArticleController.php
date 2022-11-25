<?php

class ArticleController{
    private $contentModel;
    private $view;
    private $logger;

    public function __construct($articleModel, $view, $logger) {
        $this->articleModel = $articleModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list() {
        $data['articles'] = $this->articleModel->getArticle();
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('contentView.mustache', $data);
    }

    public function listarPublicaciones(){
        $data['publicaciones'] = $this->contentModel->getContent();
    }

}