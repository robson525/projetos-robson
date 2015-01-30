<?php
    if(!isset($user) || !in_array(13, $user->groups)):
        $erro = true;
        $msg = "Erro 1 -Você não tem permissão para acessar esta área.";
    else:
        $convencao_id = (int) $_GET['gerenciar'];
        $convencao = Convencao::getById($convencao_id);
        if(!$convencao || !$convencao->getAberta()):
            $erro = true;
            $msg = "Erro 2 - Você não tem permissão para acessar esta área.";
        
        else:
            
            $inscritos = InscricaoConvencao::getInscricoesGerencia($convencao_id);
            //var_dump($inscritos);
        endif;      
    endif;
    
    $Ninscricoes = 0;
    
?>

<div style="text-align: right;">
    <button class="button" onclick="window.location='cadastro.html'">Voltar</button>
</div>

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


<?php if(isset($inscritos)): ?>
    <link href="formulario/css/fixedheadertable.css" rel="stylesheet" media="screen" />
    <style type="text/css">
        table tr, table td{
            white-space: nowrap;
        }
    </style>
    <script src="formulario/js/jquery.js" type="text/javascript"></script>
    <script src="formulario/js/jquery.fixedheadertable.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery.noConflict();
        function Estado(cidade, clube) {
            jQuery(document).ready(function($) {

                $.post('../../../formulario/auxi/cidades.php', {estado: $('#estado').val()},
                function(resposta) {
                    $('#cidade').html(resposta);
                    if (cidade) {
                        Selecionar('cidade', cidade);
                    }
                });

                $.post('../../../formulario/auxi/clubes.php', {estado: $('#estado').val()},
                function(resposta) {
                    $('#clube').html(resposta);
                    if (clube) {
                        Selecionar('clube', clube);
                    }
                });

            });
        }
        function Selecionar(selecionar , Option){
            var Select = document.getElementById(selecionar); 
            for ( i =0; i < Select.length; i++){
                    if (Select[i].value == Option){
                            Select[i].selected = true;
                    }
            } 
        }
        
        
        jQuery(document).ready(function($) {
            $('#informacoes').fixedHeaderTable({
                footer: true,
                cloneHeadToFoot: true,
                altClass: 'odd',
                autoShow: true
            });
            $('#myTable05').fixedHeaderTable({
                altClass: 'odd',
                footer: true
            });
        });
        
    </script>
    
    <br>
    <center><h3>Gerênciamento das Inscrições da <?php echo $convencao->getTitulo() ?></h3></center>
    <br>
    
    <div style="font-weight:bold;">
        <form method="POST" action="">
            <label style="text-shadow: 1px 1px 1px #999999;">Filtrar por: </label><br>
            Estado:
            <label> <select id="estado" name="estado" onChange="Estado(false, false);">
                        <option value="" style="font-weight:bold;"></option>
                        <option value="AMAPÁ">AMAPÁ</option>
                        <option value="MARANHÃO" >MARANHÃO</option>
                        <option value="PARÁ" >PARÁ</option>
                        <option value="PIAUÍ">PIAUÍ</option>
                    </select>
            </label>
            &ensp;Cidade:
            <label>
                <select id="cidade" name="cidade" size="1" style="min-width:100px">
                    <option id="padrao" value="" >SELECIONE UM ESTADO</option>    
                </select>
            </label>
            &ensp;Clube:
            <label>
                <select id="clube" name="clube" style="min-width:100px">
                    <option value="">SELECIONE UM ESTADO</option>
                </select>
            </label>
            &ensp;
            <?php if (isset($_POST['estado']) && $_POST['estado']) { ?> <script>  
                    Selecionar('estado', "<?php echo $_POST['estado']; ?>");
                    Estado("<?php echo $_POST['cidade'] ?>", "<?php echo $_POST['clube'] ?>");
            </script> <?php } ?>
            <input type="submit" class="button" value="Filtrar" />
        </form>
    </div>

    <br> 
    
    <div class="div_fancyTable" style="<?php echo count($inscritos)>20 ? "height: 500px;" : "" ?>">
        <table class="fancyTable" id="myTable05" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th >Nº</th>
                    <th >Prefixo</th>
                    <th >Nome</th>
                    <th >Estado</th>
                    <th >Cidade</th>
                    <th >Cluble</th>
                    <th >Inscrição | Pago &ensp;&ensp;</th>
                    <th >Nascimento</th>
                    <th >Delegado</th>
                    <th >Cargo no Clube</th>
                    <th >Cargo no Distrito</th>
                    <th >CL Melvin Jones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inscritos as $i => $iscrito): ?>
                    <tr>
                        <td ><?php echo $i + 1 ?></td>
                        <td ><?php echo $iscrito->prefixo ?></td>
                        <td ><?php echo $iscrito->name ?></td>
                        <td ><?php echo $iscrito->estado ?></td>
                        <td ><?php echo $iscrito->cidade ?></td>
                        <td ><?php echo $iscrito->clube ?></td>
                        <td >
                            <?php foreach ($iscrito->inscricoes as $inscricao): ?>
                                <ul>
                                    <li class="insc"><?php echo Ninscricao($inscricao->id) ?></li>
                                    <li class="pago"><?php echo $inscricao->pago ? "SIM" : "NÃO" ?></li>
                                </ul>
                                <br>
                                <?php $Ninscricoes++ ?>
                            <?php endforeach;?>
                        </td>
                        <td ><?php echo $iscrito->nascimento ? DateTime::createFromFormat("Y-m-d", $iscrito->nascimento)->format('d-m-Y') : "" ?></td>
                        <td ><?php echo $iscrito->delegado ?></td>
                        <td ><?php echo $iscrito->cargo_clube != "OUTRO" ? $iscrito->cargo_clube : $iscrito->qual_cc ?></td>
                        <td ><?php echo $iscrito->cargo_distrito != "OUTRO" ? $iscrito->cargo_distrito : $iscrito->qual_cd ?></td>
                        <td ><?php echo $iscrito->cl_mj ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    
    <br>
    <table class="category" style="width: 30%;">
        <tr>
            <th>Total de Inscritos</th>
            <td><?php echo count($inscritos); ?></td>
        </tr>
        <tr>
            <th>Total de Inscrições na Convenção</th>
            <td><?php echo $Ninscricoes; ?></td>
        </tr>
        <tr>
            <th>Inscritos no ultimos 7 dias</th>
            <td><?php echo InscricaoConvencao::fetInscritosSemana($convencao_id); ?></td>
        </tr>
    </table>
    
<?php elseif(!$erro): ?>
    <br>
        <center><h3>Ainda não há Inscritos</h3></center>
    <br>
<?php endif; ?>




<?php 
    
    function Ninscricao($id) {
        if(strlen($id) == 1){
            return '00' . $id;
        }else if(strlen($id) == 2){
            return '0' . $id;
        }
        return $id;
    }
    
?>
        
        
       