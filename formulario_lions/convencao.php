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
    
?>
<script type="text/javascript">
    function validaArquivo(){
        
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
                        <table class="category" style="">
                            <caption><h4>Comprovante de Pagamento</h4></caption>
                            <tr>
                                <td style="text-align:right;">Anexar comprovante:</td>
                                <td><input type="file" name="comprovante" accept="image/jpg,image/jpeg,image/png,application/pdf" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;">Extensões permitidas: .pdf , .jpj , .png , .jpeg </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"> <button class="button" type="submit">Enviar</button> </td>
                            </tr>
                        </table>        
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