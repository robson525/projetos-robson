<?php
    $ouro = isset($_POST['ouro']) ? (int) $_POST['ouro'] : false;
    $inscricao_n = isset($_GET['inscricao']) ? (int) $_GET['inscricao'] : false;
    $convencao_id = (int) $_GET['convencao'];
    $convencao = Convencao::getById($convencao_id, $db);
    if(!$convencao || !$convencao->getAberta()):
        $erro = true;
        $msg = "Você não tem permissão para acessar esta área.";
        
    else:
       
        $inscricoes = InscricaoConvencao::getByUsuario($usuario->getId(), $db);
        
        $inscricao = false;
        $Ninscricoes = 0;
        $pago = false;
        foreach ($inscricoes as $inscri){
            if($inscri->getConvencao_id() == $convencao_id){
                $Ninscricoes++;
                if($inscri->getId() == $inscricao_n){
                    $inscricao = $inscri;
                    $ouro = $Ninscricoes - 1;
                    $inscricao->setConnection($db);
                    if($inscri->getPago()){
                        $pago = true;
                        $comprovante = Comprovante::getById($inscricao->getComprovante(), $db);
                    }
                }
            }
        }
        
    endif;
    
    if(isset($_POST['inscrever']) && isset($_POST['convencao'])):
        $inscricao = new InscricaoConvencao($db);
        $inscricao->setUsuario_id($usuario->getId());
        $inscricao->setConvencao_id($_POST['convencao']);
        $erro = !$inscricao->save();
        if($erro){
            $msg = "Falha ao cadastrar.";
        }else{
            $msg = "Cadastro realizado com sucesso.";
            $email = new Email();
            $email->setDestinatario($user->email, $user->name);
            $email->inscricaoConvencao($convencao->getTitulo());
            $email->enviar();
        }
    endif;
    
    if(isset($_FILES['comprovante'])): 
        $pastaAnexo = "formulario/conprovante/convencao-17/";
        $extPermitidas = array("pdf", "jpg", "png", "jpeg");
        $tamanhoMax = 4194304; //4M
        $extensao = strtolower(end(explode('.', $_FILES['comprovante']['name'])));
       
        if(in_array($extensao, $extPermitidas)){
            if($_FILES['comprovante']['size'] <= $tamanhoMax){
                $comprovante = new Comprovante($db);
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
<br>
<?php
if($convencao && $convencao->getAberta()):  
?>
    
    <?php if($inscricao): ?>

        <div style=" margin-top: 20px;">
            <center><h2><?php echo $convencao->getTitulo(); ?></h2></center>            
            <center><h4>21 a 23 de abril de 2016</h4></center>

            
            <table class="category" style="width:80%; margin:auto; margin-top: 50px;">
                <caption><h4>Conta para Doações e Inscrições:</h4></caption>
                <tr>
                    <td style="text-align: center; max-width: 100%;">
                        <p style="display:none;">BANCO DO BRASIL S.A - AGÊNCIA JÓQUEI CLUB PI </p>
                        <p style="display:none;">
                            Prefixo: 3178-X  <br>
                            Nº Conta: 47.506-8<br/>
                            Titular: Associação Internacional de Lions Clubes – Distrito LA 6 - XVI CONVENÇÃO <br>
                            CNPJ: -  01.412.913/0001-88. 
                        </p>
                        <p style="font-weight:bold;"> As Informações Bancárias estarão disponíveis em breve.</p>
                            <table style="margin: auto;">
                                <caption><h5>Valores das Incrições</h5></caption>
                                <tr>
                                    <td>Convencionais: </td>
                                    <td>até 31/03/2016 – R$ 150,00  -  após R$ 180,00</td>
                                </tr>
                                <tr  style="display:none;">
                                    <td>Convidados: </td>
                                    <td>até 31/03/2015 – R$ 200,00 – após R$ 230,00</td>
                                </tr>
                                <tr  style="display:none;">
                                    <td>LEO: </td>
                                    <td>até 31/03/2015 – R$ 90,00 – após R$ 100,00</td>
                                </tr>
                                <tr  style="display:none;">
                                    <td>Inscrição Ouro: </td>
                                    <td>R$ 100,00</td>
                                </tr>
                            </table>
                        <br/>
                        <p style="font-weight:bold; display:none;">A partir da 2ª Inscrição Ouro elas dão direito somente ao sorteio do carro, aumentando suas chances de ganhar.</p>
                    </td>
                    
                </tr>
            </table>
            
            <table class="category" style="width:50%; margin:auto; margin-top: 50px;">
                <tr>
                    <td style="text-align: center; max-width: 100%; padding-top: 20px;">
                        <h2>Inscrição <?php echo $ouro ? ("Ouro " .  $ouro) : "Principal" ?></h2>
                        <h4>Número de Inscrição : <?php echo $inscricao->getNinscricao(); ?></h4>
                    </td>
                </tr>
            </table>
          
            
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
            
            
            <form method="POST" action="cadastro.html?convencao=<?php echo $convencao->getId() ?>&inscricao=<?php echo $inscricao->getId(); ?>" enctype="multipart/form-data" onsubmit="return validaArquivo()">
                <table class="category" style="width: 80%; margin:auto; margin-top: 50px;">
                    <caption><h4>Comprovante de Pagamento</h4></caption>
                    <tr>
                        <td style="text-align:right;"><?php echo $pago ? "Alterar" : "Anexar"; ?> comprovante:</td>
                        <td style="max-width: 100%"><input type="file" name="comprovante" id="comprovante" accept="image/jpg,image/jpeg,image/png,application/pdf" required style="max-width:100%"/></td>
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
            <h2>Confirmar <?php echo $Ninscricoes ? $Ninscricoes.'&ordf; Inscrição Ouro' : 'Inscrição' ?> na <?php echo $convencao->getTitulo() ?> :</h2>
            <form method="POST" action="" >
                <input type="hidden" name="convencao" value="<?php echo $convencao->getId() ?>" />
                <input type="hidden" name="inscrever" value="1" />
                <input type="hidden" name="ouro" value="<?php echo $Ninscricoes ?>" />
                <button class="button" type="submit">Confirmar</button>
            </form>
        </div>  
    <?php endif; ?>   
    
<?php endif; ?>    

<br/><br/>
<div style="text-align: right;">
    <button class="button" onclick="window.location='cadastro.html'">Voltar</button>
</div>
