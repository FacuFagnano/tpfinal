<?php
require('./public/library/fpdf185/fpdf.php');
use Dompdf\Dompdf;
use Dompdf\Options;

class PendingArticlesController{
    private $pendingArticleModel;
    private $renderer;
    private $logger;

    public function __construct($pendingArticleModel, $view, $logger) {
        $this->pendingArticleModel = $pendingArticleModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list() {
        if(!empty($_SESSION["logueado"])){
        $this->renderer->render('listPendingArticlesView.mustache');
        }
    }

    public function listarPublicaciones(){
        $data['publicaciones'] = $this->pendingArticleModel->getContent();
        $this->renderer->list("listPendingArticlesView.mustache");
    }

    public function listPendingArticles(){
        $data['pendingArticles'] = $this->pendingArticleModel->getPendingArticles();
        $this->logger->info("Estos son los articulos pendientes: " . $data['pendingArticles']);
        $this->renderer->list("listPendingArticlesView.mustache");
    }


}