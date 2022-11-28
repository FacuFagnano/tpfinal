<?php
require('./public/library/fpdf185/fpdf.php');
require('./public/library/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class PendingArticlesController{
    private $articleModel;
    private $renderer;
    private $logger;

    public function __construct($articleModel, $view, $logger) {
        $this->articleModel = $articleModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list() {
        $this->renderer->render('listPendingArticlesView.mustache');
    }

    public function listarPublicaciones(){
        $data['publicaciones'] = $this->articleModel->getContent();
        $this->renderer->list("listPendingArticlesView.mustache");
    }

    public function listPendingArticles(){
        $data['pendingArticles'] = $this->articleModel->getPendingArticles();
        $this->logger->info("Estos son los articulos pendientes: " . $data['pendingArticles']);
        $this->renderer->list("listPendingArticlesView.mustache");
    }

}