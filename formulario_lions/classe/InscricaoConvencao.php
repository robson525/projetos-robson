<?php

class InscricaoConvencao {
    
    private $id;
    private $usuario_id;
    private $convencao_id;
    private $pago;
    
    public function getId() {
        return $this->id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function getConvencao_id() {
        return $this->convencao_id;
    }

    public function getPago() {
        return $this->pago;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setConvencao_id($convencao_id) {
        $this->convencao_id = $convencao_id;
    }

    public function setPago($pago) {
        $this->pago = $pago;
    }

    public function save(){
        if(!$this->getId()){
            if(!$this->verificaCadastro()){
                 return $this->insert();
            }else{
                return false;
            }
        } 
    }
    
    private function insert(){
        $sql  = "INSERT INTO __inscricao_convencao (usuario_id, convencao_id) VALUES ( ";
        $sql .= Persistencia::prepare($this->getUsuario_id(), Persistencia::FK) . ", ";
        $sql .= Persistencia::prepare($this->getConvencao_id(), Persistencia::FK) . "); ";
        mysql_query($sql);
        if(!mysql_error()){
           $this->id = mysql_insert_id();
           return true;
        }else{
            return false;
        }
    }
    
    public static function getByUsuario($usuario_id = 0){
        if(!$usuario_id){
            $usuario_id = '0';
        }
        $sql = "SELECT * FROM __inscricao_convencao WHERE usuario_id = " . $usuario_id;
        $query = mysql_query($sql);
        $array = array();
        while ($result = mysql_fetch_object($query)){
            $array[] = self::load($result);
        }
        return $array;
    }
    
    private function verificaCadastro(){
        $sql = "SELECT * FROM __inscricao_convencao WHERE usuario_id = " . $this->getUsuario_id() . " AND convencao_id = " . $this->getConvencao_id() . ";";
        $query = mysql_query($sql);
        if(mysql_num_rows($query)){
            return true;
        }else{
            return false;
        }
    }
    
    private function load($inscricao_){
        $inscricao = new InscricaoConvencao();
        $inscricao->setId($inscricao_->id);
        $inscricao->setUsuario_id($inscricao_->usuario_id);
        $inscricao->setConvencao_id($inscricao_->convencao_id);
        $inscricao->setPago($inscricao_->pago);
        return $inscricao;
    }
    
}
