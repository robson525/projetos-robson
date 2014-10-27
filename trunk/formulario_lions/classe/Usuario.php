<?php
require_once 'Persistencia.php';
/**
 * Description of Usuario
 *
 * @author Robson
 */
class Usuario {
    private $id;
    private $user_id;
    private $matricula;
    private $nascimento;
    private $endereco;
    private $complemento;
    private $estado;
    private $cidade;
    private $clube;
    private $delegado;
    private $cargo_clube;
    private $qual_cc;
    private $cargo_distrito;
    private $qual_cd;
    private $cl_mj;
    private $prefixo;
    private $camisa;
    private $error;
    
    public function getId() {
        return $this->id;
    }

    public function getUser_id() {
        return $this->user_id;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getComplemento() {
        return $this->complemento;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getClube() {
        return $this->clube;
    }

    public function getDelegado() {
        return $this->delegado;
    }

    public function getCargo_clube() {
        return $this->cargo_clube;
    }

    public function getQual_cc() {
        return $this->qual_cc;
    }

    public function getCargo_distrito() {
        return $this->cargo_distrito;
    }

    public function getQual_cd() {
        return $this->qual_cd;
    }

    public function getCl_mj() {
        return $this->cl_mj;
    }

    public function getPrefixo() {
        return $this->prefixo;
    }

    public function getCamisa() {
        return $this->camisa;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setClube($clube) {
        $this->clube = $clube;
    }

    public function setDelegado($delegado) {
        $this->delegado = $delegado;
    }

    public function setCargo_clube($cargo_clube) {
        $this->cargo_clube = $cargo_clube;
    }

    public function setQual_cc($qual_cc) {
        $this->qual_cc = $qual_cc;
    }

    public function setCargo_distrito($cargo_distrito) {
        $this->cargo_distrito = $cargo_distrito;
    }

    public function setQual_cd($qual_cd) {
        $this->qual_cd = $qual_cd;
    }

    public function setCl_mj($cl_mj) {
        $this->cl_mj = $cl_mj;
    }

    public function setPrefixo($prefixo) {
        $this->prefixo = $prefixo;
    }

    public function setCamisa($camisa) {
        $this->camisa = $camisa;
    }
    
    
    public function getError(){
        return $this->error;
    }
    
    public function save(){
        if($this->getId()){
            $this->update();
        }else{
            $this->insert();
        }
    }
    
    private function insert(){
        $sql  = "INSERT INTO jom0__usuario ";
        $sql .= "(user_id, matricula, nascimento, endereco ,complemento ,estado ,cidade ,clube ,delegado ,cargo_clube ,qual_cc ,cargo_distrito ,qual_cd ,cl_mj ,prefixo ,camisa ) ";
        $sql .= "VALUES ( ";
        $sql .= Persistencia::prepare($this->getUser_id(), Persistencia::FK) . ", ";
        $sql .= Persistencia::prepare($this->getMatricula(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getNascimento(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getEndereco(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getComplemento(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getEstado(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getCidade(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getClube(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getDelegado(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getCargo_clube(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getQual_cc(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getCargo_distrito(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getQual_cd(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getCl_mj(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getPrefixo(), Persistencia::STRING) . ", ";
        $sql .= Persistencia::prepare($this->getCamisa(), Persistencia::STRING) . " ) ";
        $sql .= ";";
        $query = mysql_query($sql);
        
        if(mysql_error()){
            $this->error = "Ocorreu um erro ao Cadastrar. Tente novamente mais tarde.<br>".mysql_error() ."<br>".$sql;
            $this->deleteUser();
        }else{
            $this->error = false;
            $this->id = mysql_insert_id();
        }
    }
    
    private function update(){
        
    }
    
    private function deleteUser(){
        $sqlD   = "DELETE u, ug "
                . "FROM jom0__users AS u "
                . "INNER JOIN jom0__user_usergroup_map AS ug ON ug.user_id = u.id "
                . "WHERE u.id = " . $this->user_id . ";"; 
        mysql_query($sqlD);
    }
    
}
