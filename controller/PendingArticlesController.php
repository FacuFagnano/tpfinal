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

    public function donwloadArticle(){
        
        $id = $_GET["id"];
        if(!empty($_SESSION["logueado"])){
        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetY(30);
        $datos= $this->pendingArticleModel->getPendingArticlesById($id);
        foreach ($datos as $datosReserva){

            $pdf->Image($datosReserva["articleImage"],55,15,80);
            $pdf->Ln(45);
            $pdf->Cell(1);
        
        }
        $pdf->SetFont('Arial', '', 20);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetX(150);
        $pdf->SetX(150);
        $pdf->SetFont('Arial', '', 20);
        $pdf->SetX(10);
        $datos= $this->pendingArticleModel->getPendingArticlesById($id);
        foreach ($datos as $datosReserva){
            $pdf->Ln(40);
            $pdf->Cell(0,6,$datosReserva["articleTitle"]);
            //$pdf->Cell(50, 10, $datosReserva["articleTitle"], 0, 0, 'L');
            $pdf->Ln(20);
            $pdf->Cell(1);
        }
        $datos= $this->pendingArticleModel->getPendingArticlesById($id);
        foreach ($datos as $datosReserva){
            $pdf->Cell(1);
            $pdf->SetFont('Helvetica','',12);           
            $pdf->MultiCell(140, 6, $datosReserva["articleContent"]);
        }


              
        $pdf->Output("Articulo.pdf", 'I');  
    }
}
}