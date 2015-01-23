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

    public function getNinscricao() {
        if(strlen($this->id) == 1){
            return '00' . $this->id;
        }else if(strlen($this->id) == 2){
            return '0' . $this->id;
        }
        return $this->id;
    }

    public function save(){
        if(!$this->getId()){
            if(!$this->verificaCadastroÇÇÇ()){//consertar essa parte
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
           $this->id = mysql_fetch_object( mysql_query("SELECT LAST_INSERT_ID() AS id FROM __inscricao_convencao;"))->id;
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
    
    public static function getById($inscricao_id = 0){
        if(!$inscricao_id){
            $inscricao_id = '0';
        }
        $sql = "SELECT * FROM __inscricao_convencao WHERE id = " . Persistencia::prepare($inscricao_id, Persistencia::INT);
        $query = mysql_query($sql);
        $array = array();
        while ($result = mysql_fetch_object($query)){
            $array[] = self::load($result);
        }
        return $array;
    }
    
    public static function getByUsuario($usuario_id = 0){
        if(!$usuario_id){
            $usuario_id = '0';
        }
        $sql = "SELECT * FROM __inscricao_convencao WHERE usuario_id = " . Persistencia::prepare($usuario_id, Persistencia::INT);
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
    
    public static function getInscricoesGerencia($convencaoId = 0){
        $sql  = "SELECT u.*, us.*, ic.* ";
        $sql  .= "FROM __inscricao_convencao ic ";
        $sql .= "INNER JOIN jom0__usuario u ON u.id = ic.usuario_id ";
        $sql .= "INNER JOIN jom0__users us ON us.id = u.user_id ";
        $sql .= "INNER JOIN jom0__user_usergroup_map ugm ON ugm.user_id = us.id ";
        $sql .= "WHERE ugm.group_id IN (2, 13) AND ic.convencao_id = ".Persistencia::prepare($convencaoId, Persistencia::FK) . " ";
        
        $sql .= (isset($_POST['estado']) && $_POST['estado']) ? "AND u.estado = " . Persistencia::prepare($_POST['estado'], Persistencia::STRING) . " " : "";
        $sql .= (isset($_POST['cidade']) && $_POST['cidade']) ? "AND u.cidade = " . Persistencia::prepare($_POST['cidade'], Persistencia::STRING) . " ": "";
        $sql .= (isset($_POST['clube'])  && $_POST['clube'] ) ? "AND u.clube  = " . Persistencia::prepare($_POST['clube'],  Persistencia::STRING) . " ": "";
        
        $sql .= "ORDER BY us.id ";
        
        $query = mysql_query($sql);
        $inscricoes = array();
        if(mysql_num_rows($query)){
            while($inscricao = mysql_fetch_object($query)){
                $inscricoes[] = $inscricao;
            }
        }
        return $inscricoes;
    }
    
    public static function fetInscritosSemana($convencaoId = 0){
        $sql  = "SELECT COUNT(us.id) AS quantidade ";
        $sql .= "FROM jom0__users us ";
        $sql .= "INNER JOIN jom0__usuario u ON u.user_id = us.id ";
        $sql .= "INNER JOIN __inscricao_convencao ic ON ic.usuario_id = u.id ";
        $sql .= "INNER JOIN jom0__user_usergroup_map ugm ON ugm.user_id = us.id ";
        $sql .= "WHERE registerDate > (NOW() - INTERVAL 7 DAY) AND ugm.group_id IN (2, 13) ";
        $sql .= "AND ic.convencao_id = " . Persistencia::prepare($convencaoId, Persistencia::FK) . " ";
        $sql .= (isset($_POST['estado']) && $_POST['estado']) ? "AND u.estado = " . Persistencia::prepare($_POST['estado'], Persistencia::STRING) . " " : "";
        $sql .= (isset($_POST['cidade']) && $_POST['cidade']) ? "AND u.cidade = " . Persistencia::prepare($_POST['cidade'], Persistencia::STRING) . " ": "";
        $sql .= (isset($_POST['clube'])  && $_POST['clube'] ) ? "AND u.clube  = " . Persistencia::prepare($_POST['clube'],  Persistencia::STRING) . " ": "";
        
        $query = mysql_query($sql);
        return mysql_fetch_object($query)->quantidade;
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
