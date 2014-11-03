<?php

require("libraries/phpmailer/phpmailer.php");

class Email {
    
    private $mail;
    private $destinatario;
    
    public function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->IsSMTP(); 
        $this->mail->Host = "smtp.lionsdla6.com.br"; 
        $this->mail->SMTPAuth = true; 
        $this->mail->Username = 'convencao=lionsdla6.com.br'; 
        $this->mail->Password = 'fortunamajor'; 
        
        $this->mail->From = "convencao@lionsdla6.com.br"; // Seu e-mail
        $this->mail->FromName = "Distrito LA6"; // Seu nome
        $this->mail->IsHTML(true);
        
        $this->mail->SMTPSecure = 'tls';
        $this->mail->WordWrap = 50;
        $this->mail->Port = 587;
        $this->mail->CharSet = "UTF-8";
    }
    
    public function setFrom($from = ''){
        $this->mail->From = $from;
    }
    
    public function setDestinatario($email = '', $nome = ''){
        $this->mail->AddAddress($email, $nome);
        $this->destinatario = $nome;
    } 
    
    public function inscricaoConvencao($convencao = 'XVI Convenção'){
        $this->mail->Subject = "Confirmação de Inscrição na " . $convencao;
        
        $texto = " Caro(a) senhor(a) " . $this->destinatario . "<br>Seu cadastro foi realizado com sucesso na ". $convencao ." Distrital do Distrito LA6. " 
                . '<br>Para mais informa&ccedil;&otilde;es visite o site do <strong><a title="Distrito LA6" href="http://www.lionsdla6.com.br" target="_blank">Distrito LA6</a>.</strong>';

        $this->mail->Body = $texto;
        
        //$this->mail->AltBody = " Caro(a) senhor(a) " . $this->destinatario . "\r\n Seu cadastro foi realizado com sucesso na ". $convencao ." Distrital do Distrito LA6.";
    }
    
    public function enviar(){
        //return $this->mail;
        if($this->mail->send()){
            return true;
        }else{
            echo $this->mail->ErrorInfo;
            return false;;
        }
    }
    
    public function getError(){
        return $this->mail->ErrorInfo;
    }
    
}
