<?php

class InscricaoConvencao {
    
    private $id;
    private $usuario_id;
    private $convencao_id;
    private $pago;
    private $comprovante;
    
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
    
    public function getComprovante() {
        return $this->comprovante;
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

    public function setComprovante($comprovante) {
        $this->comprovante = $comprovante;
    }

    public function save(){
        if(!$this->getId()){
            if(!$this->verificaCadastro()){
                 return $this->insert();
            }else{
                return false;
            }
        }else{
            return $this->update();
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
    
    private function update(){
        $sql  = "UPDATE __inscricao_convencao SET ";
        $sql .= "pago = " . Persistencia::prepare($this->getPago(), Persistencia::BIT) . ", ";
        $sql .= "comprovante = " . Persistencia::prepare($this->getComprovante(), Persistencia::FK) . " ";
        $sql .= "WHERE id = " . $this->getId();
        return mysql_query($sql);
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
    
    public function InsereComprovante(Comprovante $comprovante){
        
        if($this->getPago()){
            Comprovante::deletaComprovante($this->getComprovante());
        }
        $comprovante->save();
        if($comprovante->getId()){
            $this->setComprovante($comprovante->getId());
            $this->setPago('1');
            return $this->save();
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
        $inscricao->setComprovante($inscricao_->comprovante);
        return $inscricao;
    }
    
}
