<?php

class adminModel {
    
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getListAllSection(){

        $sql = "SELECT * from section s left join edition e on e.editionId = s.idEditionTable;";

            
        return $this->database->query($sql);
    
    }

    public function getListDaily(){
        $sql = "SELECT * from daily";

            
        return $this->database->query($sql);

    }

    public function getListEdition(){
        $sql = "SELECT * from edition";

            
        return $this->database->query($sql);

    }

    public function deleteSectionById($id) {
        
        $sql = "DELETE FROM section WHERE sectionId = $id";
        $this->database->execute($sql);

    }

    
    public function deleteEditionById($id) {
        
        $sql = "DELETE FROM edition WHERE editionId = $id";
        $this->database->execute($sql);

    }

    public function updateSection($codigo,$id) {
        $sql1 = "UPDATE `user` SET `ROL` = $codigo WHERE ID = $id";
        $this->database->execute($sql1);
    }

    public function getListAllEdition(){

        $sql = "SELECT * from edition e left join daily d on d.dailyId = e.idDailyTable INNER JOIN dailytype dt on dt.typeId = d.dailyId";
    
            
        return $this->database->query($sql);
    
    }

    public function sendEditionNew($precio, $descripcion, $imagen, $daily){

        $this->logger->info(" MODEL VERIFY -  Precio= " . $precio . "Descripcion = " . $descripcion . "imagen =  " . $imagen . " Diario = " . $daily );
        $sql = "INSERT INTO `edition` (`editionPrice`, `editionDescription`, `editionImageUrl`, `idDailyTable`) VALUES ('$precio','$descripcion','$imagen','$daily')";

        $this->database->execute($sql);
         
    }

    public function sendSectionNew($descripcion, $imagen, $idEdition){
        $sql = "INSERT INTO `section` (`sectionDescription`, `sectionImageUrl`, `idEditionTable`) VALUES ('$descripcion','$imagen','$idEdition')";
        $this->database->execute($sql);
         
    }
    
}