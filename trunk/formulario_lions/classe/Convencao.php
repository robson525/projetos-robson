<?php

class Convencao {
   
    private $id;
    private $titulo;
    private $aberta;
    
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAberta() {
        return $this->aberta;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAberta($aberta) {
        $this->aberta = $aberta;
    }

    public static function getAbertas(){
        $sql = "SELECT * FROM __convencao WHERE aberta = '1'";
        $query = mysql_query($sql);
        $array = array();
        while ($result = mysql_fetch_object($query)){
            $array[] = self::load($result);
        }
        return $array;
    }
    
    private function load($convencao_){
        $convencao = new Convencao();
        $convencao->setId($convencao_->id);
        $convencao->setTitulo($convencao_->titulo);
        $convencao->setAberta($convencao_->aberta);
        return $convencao;
    }
    
}


?>
