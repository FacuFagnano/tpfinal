<?php

class NewNoteController
{
    private $newNoteModel;
    private $renderer;
    private $logger;
    private $latitude;
    private $longitude;

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
        $daily = $_POST["daily"];
        $section = $_POST["section"];
        $edition = $_POST["edition"];

        $imageName = str_replace(" ", "_", $title);
        $rutaArchivoTemporal = $_FILES["image"]["tmp_name"];
        $rutaArchivoFinal = "public/w3images/" . $imageName . "photo.jpeg";
        move_uploaded_file($rutaArchivoTemporal, $rutaArchivoFinal);

        $this->logger->info("Ruta de archivo final: " . $rutaArchivoFinal);

        $data['user'] = $this->newNoteModel->getUser();
        $user = $this->newNoteModel->getUser();
        $this->longitude = $user[0]["LONGITUDE"];
        $this->latitude = $user[0]["LATITUDE"];

        $this->logger->info("Latitud: " . $this->latitude . ", longitud: " . $this->longitude . ", title: ". $title . ", image: " . $rutaArchivoFinal . ", note: ". $note . ", daily: " . $daily . ", section: " . $section . ", edition: " . $edition . "");

        $sendCorrect = $this->newNoteModel->sendNoteToVerify($title, $rutaArchivoFinal, $note, $this->longitude, $this->latitude, $daily, $section, $edition);
        if($sendCorrect)
        {

            $this->logger->info('La nota se envío correctamente.');
        }
        else{
            //Redirect::doIt("/");
            $this->logger->info("hiciste cualquiera");
        }

    }


}
/*
 * Crear una tabla de noteStatus
ID Description
1	To Verify / Para verificar
2	Back to writer / Devuelta al escritor
3	Post / Posteada
4	Deleted / Eliminada

La tabla "publications" tiene que tener una columna más con llave foranea a ID_noteStatus

Estos roles sirven para los distintos perfiles.
El editor sólo va a ver las notas "to verify".
El escritor puede observar que notas tiene que corregir viendo las notas "back to writer".
Los usuarios registrados sólo podrán ver las notas "post".
El Admin es el único que puede eliminar una nota (este estado es discutible, pero sirve para que el escritor vea porque su nota no está publicada).

Creo que habría que replantear la tabla content, porque no permite que en la tabla publications el ID sea autoincrement.


 */