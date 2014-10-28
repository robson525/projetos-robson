<script type="text/javascript">
    function cadConvencao(id, titulo){
        var confirmar =  confirm("Tem certeza que deseja se cadastrar na "+ titulo + " ?");
        if(confirmar){
            document.getElementById('cadast_convencao').value = id;
            document.getElementById('form_cadastrar').submit();
        }
    }
    function pagConvencao(id){
        window.location='cadastro.html?pagamento=' + id;
    }
</script>

 <?php 
       
    if(isset($_POST['convencao']) && $_POST['convencao']){
        $iscricao = new InscricaoConvencao();
        $iscricao->setUsuario_id($usuario->getId());
        $iscricao->setConvencao_id($_POST['convencao']);
        $erro = !$iscricao->save();
        if($erro){
            $msg = "Falha ao cadastrar. Você já está cadastrado nessa Convenção.";
        }else{
            $msg = "Cadastro realizado com sucesso.";
        }
    }
    
    $convencoes = Convencao::getAbertas();
    $inscricoes = InscricaoConvencao::getByUsuario($usuario->getId());
    
?>
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






<div>

    <?php if(isset($convencoes) && count($convencoes)): ?>

        <table class="category" title="Cadastro de Conveção" style="width: 80%; margin: auto; margin-top: 50px; ">
            <caption><h4>Convenções Abertar</h4></caption>
            <tr>
                <th style="width:85%;text-align:center;">Título</th>
                <th style="width:15%;text-align:center;">Ação</th>
            </tr>
            <?php foreach ($convencoes as $convencao): ?>
                <tr>
                    <td style="text-align:center;">
                        <?php echo $convencao->getTitulo() ?>
                    </td>
                    <td style="text-align:center;"> 
                        <?php echo criarBotao($convencao, $inscricoes) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif;?>

</div>

<div>

    <table class="category" title="Informações Cadastrais" style="width: 80%; margin: auto; margin-top: 50px;">
        <caption><h4>Informações Cadastrais</h4></caption>
        <tr>
            <th style="width:25%">CPF / Login</th>
            <td style="width:75%"><?php echo substr($user->username, 0, 3) . '.' . substr($user->username, 3, 3) . '.' . substr($user->username, 6, 3) . '-' . substr($user->username, 9, 2); ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?php echo $user->email ?></td>
        </tr>
        <tr>
            <th>Matricula</th>
            <td><?php echo $usuario->getMatricula() ?></td>
        </tr>
        <tr>
            <th>Data Nascimento</th>
            <td><?php echo $usuario->getDataNascimento(); ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td>
                <?php 
                    echo $usuario->getEndereco() . "<br>" ;
                    echo $usuario->getComplemento() ? $usuario->getComplemento() . '<br>' : "";
                    echo $usuario->getCidade() . " - " . $usuario->getEstado();
                ?>
            </td>
        </tr>
        <tr>
            <th>Clube</th>
            <td><?php echo $usuario->getClube() ?></td>
        </tr>
        <tr>
            <th>Cargo no Clube</th>
            <td><?php echo $usuario->getCargo_clube()!="OUTRO" ? $usuario->getCargo_clube() : $usuario->getQual_cc() ?></td>
        </tr>
        <tr>
            <th>Cargo no Distrito</th>
            <td><?php echo $usuario->getCargo_distrito()!="OUTRO" ? $usuario->getCargo_distrito() : $usuario->getQual_cd() ?></td>
        </tr>
        <tr>
            <th>CL Melvim Jones </th>
            <td><?php echo $usuario->getCl_mj() ?></td>
        </tr>
        <tr>
            <th>Tamanho de Camisa </th>
            <td><?php echo $usuario->getCamisa() ?></td>
        </tr>

    </table>
    <center>
        <button class="button">Atualizar Informações</button
    </center>

</div>

<div style="display:none;">
    <form id="form_cadastrar" action="" method="POST">
        <input type="hidden" id="cadast_convencao" name="convencao" value="" />
    </form>
</div>
<div style="display:none;">
    <form id="form_pagar" action="" method="POST">
        <input type="hidden" id="pagar_convencao" name="pagamento" value="" />
    </form>
</div>




<?php 
function criarBotao($convencao, $inscricoes = array()){
    $botao = '<button class="button" ';
    foreach ($inscricoes as $inscricao){
        if($inscricao->getConvencao_id() == $convencao->getId()){
            if($inscricao->getPago()){
                $botao .= 'disabled="true" style="background-color: grey;" title="Você já está cadastrado nesta convenção.">' . 'Cadastrar</button>';
            }else{
                $botao .= 'onclick="pagConvencao(\''.$convencao->getId().'\')" title="Confirmar Pagamento">' . 'Pagamento</button>' ; 
            }            
        }else{
             $botao .= 'onclick="cadConvencao(\'' . $convencao->getId() . '\', \'' . $convencao->getTitulo() . '\')" title="Cadatrar na Convenção"> ' . 'Cadastrar</button>' ;              
        }
    }
    if(!count($inscricoes)){
        $botao .= 'disabled="true" style="background-color: grey;" title="Você deve primeiro preencher as informações cadastrais.">' . 'Cadastrar</button>';
    }
    return $botao;
}
?>