<?php

class VerifyNotesController
{
    private $verifyNotesModel;
    private $view;
    private $logger;

    public function __construct($verifyNotesModel, $view,$logger) {
        $this->verifyNotesModel = $verifyNotesModel;
        $this->view = $view;
        $this->logger = $logger;
    }

    public function list() {
        $data['notes'] = $this->verifyNotesModel->getNotesToVerify();
        $this->logger->info($_SESSION["RoleType"][0]["ROL"]);
        if ($_SESSION["RoleType"][0]["ROL"] == 1 || $_SESSION["RoleType"][0]["ROL"] == 2)
        {
            $this->view->render('verifyNotesView.mustache', $data);
        } else
        {
            $this->view->render('errorAdminView.mustache');
        }
    }

    public function getArticleById() {
        $idArticles = $_POST["idArticles"];
        $button = $_POST["button"];
        $this->logger->info($button);
        switch ($button) {
            case "readNote":
                $data["article"] = $this->verifyNotesModel->finalArticle($idArticles);
                $this->view->render('articleView.mustache',$data);
                break;
            case "backToWriter":
                $this->logger->info($idArticles);
                $this->verifyNotesModel->noteBackToWriter($idArticles);
                Redirect::doIt("/verifyNotes");
                break;
            case "sendToPost":
                $this->verifyNotesModel->noteSendToPost($idArticles);
                Redirect::doIt("/verifyNotes");
                break;
        }


    }
}