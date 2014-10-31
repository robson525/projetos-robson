<?php
    $convencao_id = (int) $_GET['convencao'];
    $convencao = Convencao::getById($convencao_id);
    if(!$convencao || !$convencao->getAberta()):
        $erro = true;
        $msg = "Você não tem permissão para acessar esta área.";
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
        }
    endif;
    
    if(isset($_FILES['comprovante'])):
        $pastaAnexo = "formulario/conprovante/convencao-16/";
        $extPermitidas = array("pdf", "jpg", "png", "jpeg");
        $tamanhoMax = 4194304; //4M
        $extensao = strtolower(end(explode('.', $_FILES['comprovante']['name'])));

        if(in_array($extensao, $extPermitidas)){
            if($_FILES['comprovante']['size'] <= $tamanhoMax){
                
                
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
    $inscricoes = InscricaoConvencao::getByUsuario($usuario->getId());
    
    $inscrito = false;
    $pago = false;
    foreach ($inscricoes as $inscricao){
        if($inscricao->getConvencao_id() == $convencao_id){
            $inscrito = true;
            if($inscricao->getPago()){
                $pago = true;
            }
        }
    }
?>

    
    <?php if($inscrito):?>

        <div style=" margin-top: 50px;">
            <center><h2><?php echo $convencao->getTitulo(); ?></h2></center>
            <table style="width: 100%">
                <tr>
                    <td style="width: 40%; vertical-align: top;">
                        <table class="category" style="width:100%;">
                            <caption><h4>Situação</h4></caption>
                            <tr>
                                <td style="text-align: center;">
                                    <?php echo  $pago ? "Pago" : "Pendente do Comprovante Pagamento"?>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td style="width: 60%; vertical-align: top;">
                        <form method="POST" action="" enctype="multipart/form-data" onsubmit="return validaArquivo()">
                            <table class="category" style="">
                                <caption><h4>Comprovante de Pagamento</h4></caption>
                                <tr>
                                    <td style="text-align:right;">Anexar comprovante:</td>
                                    <td><input type="file" name="comprovante" id="comprovante" accept="image/jpg,image/jpeg,image/png,application/pdf" required="true"/></td>
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
                    </td>
                </tr>
            </table>
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




<?php 
    var_dump($convencao);
    var_dump($inscricoes);
    var_dump($inscrito);
    var_dump($pago);
?>