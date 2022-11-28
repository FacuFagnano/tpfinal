<?php

class adminModel {
    
    private $database;
    private $logger;

    public function __construct($database,$logger) {
        $this->database = $database;
        $this->logger = $logger;
    }

    public function getListAllSection(){

        $sql = "SELECT * from section s left join edition e on e.editionId = s.idEditionTable INNER join sectiontype st on s.idSectionTypeTable = st.idSectionType ;";

            
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

    public function getModifySection($id){
        $sql = "SELECT * FROM section WHERE sectionId = $id";
        return $this->database->query($sql);
    }

    public function updateSection($codigo,$id) {
        $sql1 = "UPDATE `user` SET `ROL` = $codigo WHERE ID = $id";
        $this->database->execute($sql1);
    }

    public function getListAllEdition(){

        $sql = "SELECT * from edition e left join daily d on d.dailyId = e.idDailyTable INNER JOIN dailytype dt on dt.typeId = d.dailyId";
    
            
        return $this->database->query($sql);
    
    }

    /*public function getListAllSection(){

        $sql = "SELECT d.dailyName as diario, ed.editionDescription as edicion, s.sectionDescription as seccion , a.articleTitle as articulo FROM articles a inner join section s on s.sectionId= a.idSectionTable
        inner join edition ed on ed.editionId = a.idEditionTable
        INNER JOIN daily d on d.dailyId = a.idDailyTable";
        $this->logger->info("$sql");
            
        return $this->database->query($sql);
    
    }*/
}