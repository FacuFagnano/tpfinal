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
        $this->renderer->render('newNoteView.mustache');
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