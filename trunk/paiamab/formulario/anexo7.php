<?php
require_once('classes/class.prontuario.php');

if (isset($_SESSION['anexo7']) && $_SESSION['anexo7']) {
    $ficha = true;
        
} elseif (($_SESSION['selecionar'] || $submetido)) {
    $prontuario = new Prontuario('1_anexo7');
    $_SESSION['anexo7'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
    $ficha = $_SESSION['anexo7']?true:false;
} else {
    $ficha = false;
}

if (isset($_SESSION['fichaCadas']) && $_SESSION['fichaCadas']) {
    $n_controle = $_SESSION['fichaCadas']['n_controle'];
} else {
    $n_controle = false;
}
?>


<div id="div_erro_validacao"><br>
    <center>
        <?php
        if (isset($_POST['submit']) && $_POST['submit'])
            echo $mensagem_texto;
        ?>
        <br>
    </center>
</div>
<center>
    <h2>Anexo 7: Avaliação Multidimencional</h2>
</center>

<div id="div_ficha">

    <form id="form_ficha" name="form_ficha" method="post" action="index.php?form=7" >

        <table id="tab_anexo" border="0" align="center" width="80%">
            <tr>
                <td width="20%"></td>
                <td class="td_esq">Nº de Controle: </td>
                <td class="td_dir" width="40%"> <input id="n_controle" name="n_controle" type="text" maxlength="10" value="<?php echo $n_controle ? $_SESSION['fichaCadas']['n_controle'] : ""; ?>" disabled> 
                    <input name="n_controle" type="text" value="<?php echo $n_controle ? $_SESSION['fichaCadas']['n_controle'] : ""; ?>" hidden> 
                </td>

            </tr>
            <tr>
                <td></td>
                <td class="td_esq">Nome: </td>
                <td class="td_dir"> <input id="nome" name="nome" type="text" maxlength="100" style="width:98%" value="<?php echo $n_controle ? $_SESSION['fichaCadas']['nome'] : ""; ?>" disabled> 

                </td>

            </tr>

            <tr><td><br><br></td></tr>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <tr>
                <td class="td_esq"><br><br></td>
            </tr>

            <tr>
                <td></td>
                <td class="td_esq">Entrevistador/Coletor: </td>
                <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha ? $_SESSION['anexo7']['entrevistador'] : ""; ?>"> </td>
                <td class="td_esq">Data: </td>
                <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha ? $_SESSION['anexo7']['data'] : ""; ?>"> </td>

            </tr>

            <tr>
                <td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo7" hidden> </td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td style="padding-top:10px;">
                    <?php if (!$ficha) { ?>
                        <input id="submit" name="submit" class="bot_submit" type="submit" value="Salvar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');" > 
                    <?php } else { ?>
                        <input id="submit" name="submit" class="bot_submit" type="submit" value="Atualizar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');">
                    <?php } ?>
                </td>
            </tr>

        </table>            





    </form>


</div>