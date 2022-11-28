<?php
class ArticleController
{

    private $articleModel;
    private $view;
    private $logger;

    public function __construct($articleModel, $view, $logger)
    {
        $this->articleModel = $articleModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list(){
        $data['article'] = $this->articleModel->getArticles();
        $data['articleItem'] = $this->articleModel->getDailySession();
        $data['logueado'] = $_SESSION["logueado"];
        $this->view->render('listArticleView.mustache',$data);
       
    }
    
    public function section(){
        $data['editionsItem'] = $this->articleModel->getDailySession();
        $this->logger->info("Estoy en section de EditionController");
        $this->view->render('sectionView.mustache',$data);
    }

    public function getArticleById(){
        $sectionId = $_POST["sectionId"];
        $data['article'] = $this->articleModel->getArticles($sectionId);
        $data['logueado'] = $_SESSION["logueado"];
        $this->logger->info("el idArticles es: " . $sectionId);
        $this->view->render('listArticleView.mustache',$data);
    }

    public function showArticle() {
        $idArticles = $_POST["idArticles"];
        $data["article"] = $this->articleModel->finalArticle($idArticles);
        $this->view->render('articleView.mustache',$data);
    }

    public function downloadArticle(){
        
        $id = $_GET["id"];
        if(!empty($_SESSION["logueado"])){
        
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetY(30);
        $datos= $this->articleModel->downloadArticlesById($id);
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
        $datos= $this->articleModel->downloadArticlesById($id);
        foreach ($datos as $datosReserva){
            $pdf->Ln(40);
            $pdf->Cell(0,6,$datosReserva["articleTitle"]);
            //$pdf->Cell(50, 10, $datosReserva["articleTitle"], 0, 0, 'L');
            $pdf->Ln(20);
            $pdf->Cell(1);
        }
        $datos= $this->articleModel->downloadArticlesById($id);
        foreach ($datos as $datosReserva){
            $pdf->Cell(1);
            $pdf->SetFont('Helvetica','',12);           
            $pdf->MultiCell(140, 6, $datosReserva["articleContent"]);
        }
              
        $pdf->Output("Articulo.pdf", 'I');  
        }
    }
}