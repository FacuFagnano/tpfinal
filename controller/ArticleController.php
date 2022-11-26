<?php
require('./public/library/fpdf185/fpdf.php');
require('./public/library/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
//require('/public/phpqrcode/qrlib.php');
class ArticleController{
    private $articleModel;
    private $view;
    private $logger;

    public function __construct($articleModel, $view, $logger) {
        $this->articleModel = $articleModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list() {
        
        $this->view->render('revistaView.mustache');
    }

    public function listarPublicaciones(){
        $data['publicaciones'] = $this->articleModel->getContent();
    }

    public function donwloadArticle(){

        $id = $_GET["id"];
        $this->logger->info("dentro de donwload articulo " . $id);
        $ArticuloSeleccionado="";
        $datos = $this->articleModel->getArticleById($id);
        
        foreach ($datos as $buscarArray) {
            $ArticuloSeleccionado = $buscarArray["articleImage"];
        }
    
        $dompdf = new Dompdf();
        ob_start();
        include "./public/revistaView.mustache";
        $html = ob_get_clean();
        $dompdf->loadHtml($html);
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        echo $dompdf->output();
                
            }


        
    
}