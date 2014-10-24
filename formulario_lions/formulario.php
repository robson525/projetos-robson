<link href="formulario/css/formulario.css" rel="stylesheet" type="text/css"/>
<script src="formulario/js/formulario.js" type="text/javascript"></script>
<script src="formulario/js/jquery.js" type="text/javascript"></script>
<script src="formulario/js/jquery.mask.js" type="text/javascript"></script>
<script src="formulario/js/jquery.blockUI.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function($) {
        $("#cpf").mask("000.000.000-00");
        $("#matricula").mask("0000000000");
    });
    var matTeste = false;
    var cpfTeste = false;
    function Estado(cidade, clube) {
        jQuery(document).ready(function($) {

            $.post('../../../formulario/auxi/cidades.php', {estado: $('#estado').val()},
            function(resposta) {
                $('#cidade').html(resposta);
                //	$(document).ready(function() {  });
            });

            $.post('../../../formulario/auxi/clubes.php', {estado: $('#estado').val()},
            function(resposta) {
                $('#clube').html(resposta);
                //	$(document).ready(function() {  });
            });
        });

        if (cidade && clube) {
            $(document).ready(function() {
                alert('Carregado');
                Selecionar('cidade', cidade);
                Selecionar('clube', clube);
            });
        }

    }

    jQuery(document).ready(function($) {


        //********************** VERIFICA SE MATRICULA JÁ EXISTE ************************************
        $('#matricula').change(function() {
            $.post('../../../formulario/auxi/verificar.php', {matricula: $(this).val()},
            function(resposta) {
                if (resposta != false) {
                    matTeste = true;
                    document.getElementById('id').value = resposta;
                }
                else {
                    matTeste = false;
                }
                testeMatCpf();
            });

        });

        //********************** VERIFICA SE CPF JÁ EXISTE ************************************
        $('#cpf').change(function() {
            //if(document.getElementById('matricula').value.length == 10){
            $.post('../../../formulario/auxi/verificar.php', {cpf: $(this).val()},
            function(resposta) {
                if (resposta != false) {
                    cpfTeste = true;
                    document.getElementById('id').value = resposta;
                }
                else {
                    cpfTeste = false;
                }
                testeMatCpf();
            });
            //	}
        });

        //**********************************************************
        $('#atualizar').click(function() {
            document.getElementById('form_oculta').submit();
        });


    });



</script>


<?php
$usuario = false;




?>

<div id="div_oculta" style="display:none">
    <form id="form_oculta" name="form_oculta" action="" method="post" >
        <input id="id" type="text" name="id" value="" onClick="Estado('<?php if ($usuario) echo $campo['cidade']; ?>', '<?php if ($usuario) echo $campo['clube']; ?>')">
    </form>
</div>

<div id="div_formulario">
    <form id="formulario" name="formulario" action="cadastro.html?cadastrar=2" method="POST" onSubmit="return validaForm();">
        <table id="tabela" align="center" border="0" width="100%" >
            <tr>
                <td width="30%" class="col-1">Nome Completo <span class="span_obg">*</span></td>
                <td width="70%"><input id="nome" name="nome" type="text" maxlength="100" style="width:98%" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" value="<?php if ($usuario) echo $campo['nome']; ?>" required /></td>
            </tr>
            <tr id="cadastrado">
                <td></td><td>
                    Usário já está Cadastrado. Clique <a href="#" id="atualizar">AQUI</a> caso queira atualizar seu cadastro. 
                </td>
            </tr>
            <tr>
                <td class="col-1">Número de Matricula <span class="span_obg">*</span></td>
                <td><input id="matricula" name="matricula" type="text" maxlength="10" style="width:25%" value="<?php if ($usuario) echo $campo['matricula']; ?>"  required />
                    <br>
                    <span class="span_pequeno">Vide: <a href="http://www.lionsdla6.com.br/index.php/distrito/lista-de-associados.html" target="_blank">Lista de	 Associados do Distrito</a></span></td>
            </tr>
            <tr>
                <td class="col-1">CPF <span class="span_obg">*</span></td>
                <td>
                    <input id="cpf" name="cpf" type="text" style="width:25%;" onKeyPress="tirarShadow('cpf')" value="<?php if ($usuario) echo $campo['cpf']; ?>" required <?php echo $usuario?'disabled="true"':'' ?>/>
                </td>
            </tr>
            <tr>
                <td class="col-1">E-mail <span class="span_obg">*</span></td>
                <td><input id="email" name="email" type="email" maxlength="50" style="width:50%;" onKeyUp="minuscula(this)" value="<?php if ($usuario) echo $campo['email']; ?>" required/></td>
            </tr>
            <tr>
                <td class="col-1">Senha <span class="span_obg">*</span></td>
                <td><input id="senha1" type="password" value="" maxlength="50" style="width:25%;" required/></td>
            </tr>
            <tr>
                <td class="col-1">Repita a Senha <span class="span_obg">*</span></td>
                <td><input id="senha2" type="password" value="" maxlength="50" style="width:25%;" required/></td>
            </tr>
            <tr>
                <td class="col-1">Data de Nascimento &nbsp;</td>
                <td><select id="dia" name="dia" onChange="tirarShadow('dia');
                        tirarShadow('mes');
                        tirarShadow('ano');">
                                <?php echo monta_dia(); ?>
                    </select>
                    <select id="mes" name="mes" onChange="tirarShadow('dia');
                            tirarShadow('mes');
                            tirarShadow('ano');">
                                <?php echo monta_mes(); ?>
                    </select>
                    <select id="ano" name="ano" onChange="tirarShadow('dia');
                            tirarShadow('mes');
                            tirarShadow('ano');">
                                <?php echo monta_ano(); ?>
                    </select></td>
            </tr>
            <tr>
                <td class="col-1" id="end">Endereço &nbsp;</td>
                <td id="enderec"><input id="endereco" name="endereco" type="text" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%" value="<?php if ($usuario) echo $campo['endereco']; ?>"/>
                    <span class="span_pequeno">Endereço</span></td>
            </tr>
            <tr>
                <td></td>
                <td id="compl"><input id="complemento" name="complemento" maxlength="100" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:98%;" value="<?php if ($usuario) echo $campo['complemento']; ?>"/>
                    <span class="span_pequeno">Complemento</span></td>
            </tr>
            <tr>
                <td class="col-1">Estado <span class="span_obg">*</span></td>
                <td><select id="estado" name="estado" onChange="Estado(false, false);" required>
                        <option value=""></option>
                        <option value="AMAPÁ">AMAPÁ</option>
                        <option value="MARANHÃO" >MARANHÃO</option>
                        <option value="PARÁ" >PARÁ</option>
                        <option value="PIAUÍ">PIAUÍ</option>
                    </select></td>
            <?php if ($usuario) { ?> <script>  Selecionar('estado', "<?php echo $campo['estado']; ?>")</script> <?php } ?>
            </tr>
            <tr>
                <td class="col-1">Cidade <span class="span_obg">*</span></td>
                <td><select id="cidade" name="cidade" size="1" style="min-width:100px" required >
                        <option id="padrao" value="" >SELECIONE UM ESTADO</option>    
                    </select></td>
            </tr>
            <tr>
                <td class="col-1">Clube <span class="span_obg">*</span></td>
                <td><select id="clube" name="clube" style="min-width:100px" required>
                        <option value="">SELECIONE UM ESTADO</option>
                    </select></td>
            </tr>
            <tr>
                <td class="col-1">Delegado do Clube ? <span class="span_obg">*</span></td>
                <td><select id="delegado" name="delegado" onChange="Delegado()" required>
                        <option value=""></option>
                        <option value="SIM">SIM</option>
                        <option value="NÃO">NÃO</option>
                    </select>
                    <?php if ($usuario) { ?> <script>  Selecionar('delegado', "<?php echo $campo['delegado']; ?>")</script> <?php } ?>
                    <br>
                    <span id="span_delegado">Ao Delegado é obrigatório a apresentação da carta de credenciamento e copia das cartas internacional e distrital dos dois semestres anteriores para votação no dia do evento.</span></td>
            </tr>
            <tr>
                <td class="col-1">Cargo no Clube &nbsp;</td>
                <td><select id="cargo_clube" name="cargo_clube" onChange="mostrarQual()" >
                        <option value=""></option>
                        <option value="PRESIDENTE">PRESIDENTE</option>
                        <option value="SECRETÁRIO">SECRETÁRIO</option>
                        <option value="TESOUREIRO">TESOUREIRO</option>
                        <option value="LEO">LEO</option>
                        <option value="OUTRO">OUTRO</option>
                    </select></td>
            <?php if ($usuario) { ?> <script>  Selecionar('cargo_clube', "<?php echo $campo['cargo_clube']; ?>")</script> <?php } ?>
            </tr>
            <tr class="ocultar" id="qual_clube">
                <td class="col-1">Qual ? &nbsp;</td>
                <td><input id="outro_cargo_clube" name="outro_cargo_clube" type="text" maxlength="30" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" value="<?php if ($usuario) echo $campo['qual_cc']; ?>"/></td>
            </tr>
            <tr>
                <td class="col-1">Cargo no Distrito &nbsp;</td>
                <td><select id="cargo_distrito" name="cargo_distrito" onChange="mostrarQual()">
                        <option value="0"></option>
                        <option value="GOVERNADOR">GOVERNADOR</option>
                        <option value="VICE GOVERNADOR">VICE GOVERNADOR</option>
                        <option value="PDG">PDG</option>
                        <option value="ASSESSOR">ASSESSOR</option>
                        <option value="ASSISTENTE">ASSISTENTE</option>
                        <option value="ASSOCIADO">ASSOCIADO</option>
                        <option value="CONVIDADO">CONVIDADO</option>
                        <option value="COORDENADOR">COORDENADOR</option>
                        <option value="DIRETOR">DIRETOR</option>
                        <option value="DOMADORA">DOMADORA</option>
                        <option value="PRESIDENTE DA RAGIÃO">PRESIDENTE DA RAGIÃO</option>
                        <option value="PRESIDENTE DA DIVISÃO">PRESIDENTE DA DIVISÃO</option>
                        <option value="COORDENADOR">COORDENADOR</option>
                        <option value="EX-PRESIDENTE CONSELHO">EX-PRESIDENTE CONSELHO</option>
                        <option value="VOGAL">VOGAL</option>
                        <option value="SECRETARIO">SECRETARIO</option>
                        <option value="TESOUREIRO">TESOUREIRO</option>
                        <option value="VICE PRESIDENTE">VICE PRESIDENTE</option>
                        <option value="OUTRO">OUTRO</option>
                    </select></td>
            <?php if ($usuario) { ?> <script>  Selecionar('cargo_distrito', "<?php echo $campo['cargo_distrito']; ?>")</script> <?php } ?>
            </tr>
            <tr class="ocultar" id="qual_distrito" >
                <td class="col-1">Qual ? &nbsp;</td>
                <td><input id="outro_cargo_distrtito" name="outro_cargo_distrtito" type="text" maxlength="30" onChange="maiuscula(this)" onKeyUp="maiuscula(this)" style="width:40%" value="<?php if ($usuario) echo $campo['qual_cd']; ?>"/></td>
            </tr>
            <tr>
                <td class="col-1">CL Melvin Jones ? <span class="span_obg">*</span></td>
                <td><select id="cl_mj" name="cl_mj" required>
                        <option value=""></option>
                        <option value="SIM">SIM</option>
                        <option value="NÃO">NÃO</option>
                    </select></td>
            <?php if ($usuario) { ?> <script>  Selecionar('cl_mj', "<?php echo $campo['cl_mj']; ?>")</script> <?php } ?>
            </tr>
            <tr>
                <td class="col-1">Prefixo <span class="span_obg">*</span></td>
                <td><select id="prefixo" name="prefixo" required>
                        <option value=""></option>
                        <option value="Cal">Cal</option>
                        <option value="CL">CL</option>
                        <option value="DM">DM</option>
                        <option value="CCLEO">CCLEO</option>
                        <option value="Convidado">Convidado</option>
                    </select></td>
            <?php if ($usuario) { ?> <script>  Selecionar('prefixo', "<?php echo $campo['prefixo']; ?>")</script> <?php } ?>
            </tr>
            <tr>
                <td class="col-1">Tamanho Camisa <span class="span_obg">*</span></td>
                <td><select id="camisa" name="camisa" required>
                        <option value=""></option>
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select></td>
            <?php if ($usuario) { ?> <script>  Selecionar('camisa', "<?php echo $campo['camisa']; ?>")</script> <?php } ?>
            </tr>
            <?php if ($usuario) { ?> <script>  mostrarQual();
                            document.getElementById("id").click();</script> <?php } ?>
            <tr>
                <td colspan="2" >Campos marcados com <span class="span_obg">*</span> são Obrigatórios.</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center"><button id="botao" class="button" type="submit" name="botao" ><?php echo $usuario ? "Atualizar" : "Cadastrar"; ?></button></td>
            </tr>
        </table>
    </form>
</div>

<?php

function monta_dia() {

    $option = "<option value=''>Dia</option>";

    for ($i = 1; $i <= 31; $i++) {
        $option .= "\t<option value=\"" . sprintf("%02d", $i) . "\">" . sprintf("%02d", $i) . "</option>\n";
    }
    return $option;
}

function monta_mes() {

    $option = "<option value=''>Mês</option>";
    $option .= "<option value='01'>Janeiro</option>";
    $option .= "<option value='02'>Fevereiro</option>";
    $option .= "<option value='03'>Março</option>";
    $option .= "<option value='04'>Abril</option>";
    $option .= "<option value='05'>Maio</option>";
    $option .= "<option value='06'>Junho</option>";
    $option .= "<option value='07'>Julho</option>";
    $option .= "<option value='08'>Agosto</option>";
    $option .= "<option value='09'>Setembro</option>";
    $option .= "<option value='10'>Outubro</option>";
    $option .= "<option value='11'>Novembro</option>";
    $option .= "<option value='12'>Dezembro</option>";

    return $option;
}

function monta_ano() {

    $option = "<option value=''>Ano</option>";

    for ($i = 2013; $i >= 1900; $i--) {
        $option .= "\t<option value=\"" . sprintf("%02d", $i) . "\">" . sprintf("%02d", $i) . "</option>\n";
    }

    return $option;
}
?>
</html>