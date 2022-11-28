<?php

class NewNoteController
{
    private $newNoteModel;
    private $renderer;
    private $logger;

    public function __construct($newNoteModel, $view, $logger) {
        $this->newNoteModel = $newNoteModel;
        $this->renderer = $view;
        $this->logger = $logger;
    }

    public function list() {


        $data['dailys'] = $this->newNoteModel->getDailys();
        $this->logger->info("este es data de dailys  " . json_encode($data['dailys']));
        $this->logger->info("este es la longitud:  " . $this->longitude . ", esta es la latitud: " . $this->latitude);
        $data['sections'] = $this->newNoteModel->getSections();
        $this->logger->info("este es data de sections " . json_encode($data['sections']));
        $data['editions'] = $this->newNoteModel->getEditions();
        $this->logger->info("este es data de editions " . json_encode($data['editions']));
        if ($_SESSION["RoleType"][0]["ROL"] == 3) {
            $this->renderer->render('newNoteView.mustache', $data);
        }
        else {
            $this->renderer->render('errorAdminView.mustache');
        }

    }

    public function sendNote() {
        $title = $_POST["title"];
        $image = $_FILES["image"];
        $note = $_POST["note"];
        $section = $_POST["section"];

        $rutaArchivoTemporal = $_FILES["image"]["tmp_name"];
        $rutaArchivoFinal = "public/w3images/" . $title . "photo.jpeg";
        move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

        $sendCorrect = $this->newNoteModel->sendNoteToVerify($title, $rutaArchivoFinal, $note, $section);
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


}