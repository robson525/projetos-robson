<?php
    $convencao_id = (int) $_GET['convencao'];
    $convencao = Convencao::getById($convencao_id);
    if(!$convencao || !$convencao->getAberta()):
        $erro = true;
        $msg = "Você não tem permissão para acessar esta área.";
        
    else:
        
        $inscricoes = InscricaoConvencao::getByUsuario($usuario->getId());
        $inscricao = false;
        $inscrito = false;
        $pago = false;
        foreach ($inscricoes as $inscri){
            if($inscri->getConvencao_id() == $convencao_id){
                $inscrito = true;
                $inscricao = $inscri;
                if($inscri->getPago()){
                    $pago = true;
                    $comprovante = Comprovante::getById($inscricao->getComprovante());
                }
            }
        }
        
    endif;
    
    if(isset($_POST['inscrever']) && isset($_POST['convencao'])):
        $iscricao = new InscricaoConvencao();
        $iscricao->setUsuario_id($usuario->getId());
        $iscricao->setConvencao_id($_POST['convencao']);
        $erro = !$iscricao->save();
        if($erro){
            $msg = "Falha ao cadastrar. Você já está cadastrado nessa Convenção.";
        }else{
            $msg = "Cadastro realizado com sucesso.";
            $inscrito = true;
            $email = new Email();
            $email->setDestinatario($user->email, $user->name);
            $email->inscricaoConvencao();
            $email->enviar();
        }
    endif;
    
    if(isset($_FILES['comprovante'])): var_dump($_FILES['comprovante']);
        $pastaAnexo = "formulario/conprovante/convencao-16/";
        $extPermitidas = array("pdf", "jpg", "png", "jpeg");
        $tamanhoMax = 4194304; //4M
        $extensao = strtolower(end(explode('.', $_FILES['comprovante']['name'])));
       
        if(in_array($extensao, $extPermitidas)){
            if($_FILES['comprovante']['size'] <= $tamanhoMax){
                $comprovante = new Comprovante();
                $comprovante->setNome($_FILES['comprovante']['name']);
                $comprovante->setTipo(".".$extensao);
                $comprovante->setMd5(md5($_FILES['comprovante']['name'] . date("Y-m-d H-i-s")));
                $comprovante->setLocal($pastaAnexo);
                $comprovante->setTempName($_FILES['comprovante']['tmp_name']);
                $pago = $inscricao->InsereComprovante($comprovante);
                if($pago){
                    $erro = false;
                    $msg = "Comprovante de pagamento anexado com sucesso.";
                }else{
                    $erro = true;
                    $msg = "Houve um erro ao anexar seu comprovante. Tente novamente." . mysql_error();
                }
            }else{
                $erro = true;
                $msg = "Tamanho do arquivo é superior ao permitido.";
            }
        }else{
            $erro = true;
            $msg = "Extensão do arquivo não é permitida.";
        }
    endif;
    
?>
<script type="text/javascript">
    var extPermitidas = ["pdf", "jpg", "png", "jpeg"];
    var tamanhoMax = 4194304;
    function validaArquivo(){
        var doc = document.getElementById('comprovante');
        var extensao = doc.value.split('.');
        extensao = extensao[extensao.length - 1].toLowerCase() ;
        if(extPermitidas.indexOf(extensao.toLowerCase()) < 0){
            alert("Extensão do arquivo não é permitida.");
            return false;
        }else if(doc.files[0].size > tamanhoMax){
            alert("Tamanho do arquivo é superior ao permitido.");
            return false;
        }else{
            
            return true;
        }
    }
</script>

<?php if(isset($msg)): ?>
    <div id="system-message" style="text-align: center;">
        <dd class="<?php echo $erro ? 'error' : '' ?>">
            <ul>
                <li>
                    <?php echo $msg ?>
                </li>
            </ul>
        </dd>
    </div>
<?php endif; ?>

<?php
if($convencao && $convencao->getAberta()):  
?>
    
    <?php if($inscrito):?>

        <div style=" margin-top: 20px;">
            <center><h2><?php echo $convencao->getTitulo(); ?></h2></center>
            
            <table class="category" style="width:60%; margin:auto; margin-top: 50px;">
                <caption><h4>Situação</h4></caption>
                <tr>
                    <td style="text-align: center; max-width: 100%">
                        <?php echo  $pago ? "Comprovante de Pagamento Anexado" : "Pendente do Comprovante Pagamento"?>
                    </td>
                </tr>
                <?php if($pago): ?>
                <tr>
                    <td style="text-align: center;"> <?php echo $comprovante->getNome(); ?></td>
                </tr>
                <?php endif;?>
            </table>



            <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validaArquivo()">
                <table class="category" style="width: 80%; margin:auto; margin-top: 50px;">
                    <caption><h4>Comprovante de Pagamento</h4></caption>
                    <tr>
                        <td style="text-align:right;"><?php echo $pago ? "Alterar" : "Anexar"; ?> comprovante:</td>
                        <td style="max-width: 100%"><input type="file" name="comprovante" id="comprovante" accept="image/jpg,image/jpeg,image/png,application/pdf" required="true" style="max-width:100%"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;">Extensões permitidas: .pdf , .jpg , .png , .jpeg </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;">Tamanho máximo do arquivo: 4M </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;"> <button class="button" type="submit">Enviar</button> </td>
                    </tr>
                </table>    
            </form>
          
        </div>

    <?php else: ?>

        <div style="text-align: center;  margin-top: 50px;">
            <h2>Confirmar Inscrição na <?php echo $convencao->getTitulo() ?> :</h2>
            <form method="POST" action="">
                <input type="hidden" name="convencao" value="<?php echo $convencao->getId() ?>" />
                <input type="hidden" name="inscrever" value="1" />
                <button class="button" type="submit">Confirmar</button>
            </form>
        </div>  
    <?php endif; ?>   
    
<?php endif; ?>    

<br/><br/>
<div style="text-align: right;">
    <button class="button" onclick="window.location='cadastro.html'">Voltar</button>
</div>
