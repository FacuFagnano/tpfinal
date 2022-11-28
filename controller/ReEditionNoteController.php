<?php

class ReEditionNoteController
{
    private $reEditionNoteModel;
    private $renderer;
    private $logger;
    private $view;
    private $latitude;
    private $longitude;

    public function __construct($reEditionNoteModel, $view, $logger) {
        $this->reEditionNoteModel = $reEditionNoteModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list() {


        $data['dailys'] = $this->reEditionNoteModel->getDailys();
        $data['sections'] = $this->reEditionNoteModel->getSections();
        $data['editions'] = $this->reEditionNoteModel->getEditions();
        if ($_SESSION["RoleType"][0]["ROL"] == 3) {
            $this->renderer->render('newNoteView.mustache', $data);
        }
        else {
            $this->renderer->render('errorAdminView.mustache');
        }

    }

    public function updateNote() {
        $idArticles = $_POST["idArticles"];
        $title = $_POST["title"];
        $image = $_FILES["image"];
        $note = $_POST["note"];
        $daily = $_POST["daily"];
        $section = $_POST["section"];
        $edition = $_POST["edition"];

        $imageName = str_replace(" ", "_", $title);
        $rutaArchivoTemporal = $_FILES["image"]["tmp_name"];
        $rutaArchivoFinal = "public/w3images/" . $imageName . "photo.jpeg";
        move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

        $this->logger->info("Ruta de archivo final: " . $rutaArchivoFinal);
        $this->logger->info("el id del articulo es: " . $idArticles);
        $data['user'] = $this->reEditionNoteModel->getUser();
        $user = $this->reEditionNoteModel->getUser();
        $this->longitude = $user[0]["LONGITUDE"];
        $this->latitude = $user[0]["LATITUDE"];

        $sendCorrect = $this->reEditionNoteModel->sendNoteToVerify($title, $rutaArchivoFinal, $note, $this->longitude, $this->latitude, $daily, $section, $edition, $idArticles);
        if($sendCorrect)
        {
            $this->renderer->render("noteSendToVerifyView.mustache");
            $this->logger->info('La nota se envío correctamente.');
        }
        else{
            $this->renderer->render("noteNotSendToVerifyView.mustache");
            $this->logger->info("hiciste cualquiera");
        }

    }

    public function reEditionNoteById(){
        $idArticles = $_POST["idArticles"];
        $data['dailys'] = $this->reEditionNoteModel->getDailys();
        $data['sections'] = $this->reEditionNoteModel->getSections();
        $data['editions'] = $this->reEditionNoteModel->getEditions();
        $data["article"] = $this->reEditionNoteModel->finalArticle($idArticles);
        $this->renderer->render('reEditionNoteView.mustache',$data);

    }

}