<?php
require_once('classes/class.prontuario.php');

if ($_SESSION['selecionar'])
    $prontuario = new Prontuario('1_anexo3');

if (($_SESSION['selecionar'] || $submetido)) {
    //$_SESSION['anexo3'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
    //var_dump($_SESSION['anexo1']);
}

if (isset($_SESSION['fichaCadas']) && $_SESSION['fichaCadas']) {
    $n_controle = $_SESSION['fichaCadas']['n_controle'];
} else {
    $n_controle = false;
}


if (isset($_SESSION['anexo3']) && $_SESSION['anexo3']) {
    $ficha = true;
} else {
    $ficha = false;
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
    <h2>Anexo 3 : Escala Visual Analógoca - EVA</h2>
</center>

<div id="div_ficha">

    <form id="form_ficha" name="form_ficha" method="post" action="index.php?form=3" >

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
                <td class="td_dir"> <input id="nome" name="nome" type="text" maxlength="100" style="width:100%" value="<?php echo $n_controle ? $_SESSION['fichaCadas']['nome'] : ""; ?>" disabled> 

                </td>

            </tr>

            <tr><td>
                    <br><br>
                </td></tr>

            <tr><?php $p1 = $ficha ? $_SESSION['anexo3']['p1'] : -1; ?>
                <td class="td_esq"> 1. </td>
                <td class="td_esq">Sente dor nas costas?</td>
                <td class="td_dir">	<label for="p1_1"> Não </label> <input id="p1_1" name="p1" type="radio" value="0"
                                                                           <?php echo $p1 == "0" ? "checked" : "" ?>/>&emsp;
                    <label for="p1_2"> Sim </label> <input id="p1_2" name="p1" type="radio" value="1"
                                                           <?php echo $p1 == "1" ? "checked" : "" ?>/></td>
            </tr>

            <tr>
                <td class="td_esq"><br><br></td>
            </tr>

            <tr>
                <td class="td_esq" style="vertical-align:super;"> 2. </td>
                <td class="td_esq" style="vertical-align:super;"> Se Sim, em que(quais) região(ões) ?</td>
            </tr>
            <tr>
                <td></td><td></td>
                <td class="td_dir">	<img src="imagens/eva_regiao.png" style="float:right;"/><br><br>
                    <?php $p2_1 = $ficha ? $_SESSION['anexo3']['p2_1'] : -1; ?>
                    <input id="p2_1" name="p2_1" type="checkbox" value="1" <?php echo $p2_1 == "1" ? "checked" : "" ?>/> <label for="p2_1">Cervical</label><br><br>
                    <?php $p2_2 = $ficha ? $_SESSION['anexo3']['p2_2'] : -1; ?>
                    <input id="p2_2" name="p2_2" type="checkbox" value="1" <?php echo $p2_2 == "1" ? "checked" : "" ?>/> <label for="p2_2">Toráxica</label><br><br>
                    <?php $p2_3 = $ficha ? $_SESSION['anexo3']['p2_3'] : -1; ?>
                    <input id="p2_3" name="p2_3" type="checkbox" value="1" <?php echo $p2_3 == "1" ? "checked" : "" ?>/> <label for="p2_3">Lombar</label><br><br>
                    <?php $p2_4 = $ficha ? $_SESSION['anexo3']['p2_4'] : -1; ?>
                    <input id="p2_4" name="p2_4" type="checkbox" value="1" <?php echo $p2_4 == "1" ? "checked" : "" ?>/> <label for="p2_4">Sacral / Pélvico</label><br>
                </td>
                <td></td>
            </tr>
            <tr>
                <td class="td_esq"><br></td>
            </tr>
            <tr>
                <td class="td_esq"> 3. </td>
                <td class="td_dir" colspan="2"> Em uma escala de 0 a 10 como você classificaria a sua dor? </td>
                <td class="td_dir"></td>
            </tr>
            <tr>
                <td class="td_esq"> Inicio </td>
                <td class="" colspan="4" background="imagens/eva_escala.jpg" style="background-repeat: no-repeat; padding:130px 0px 50px 5px;">
                    <table border="1" width="670px" >
                        <tr><?php $p3 = $ficha ? $_SESSION['anexo3']['p3'] : -1; ?>
                            <td onClick="radioClick('p3_0')" width="42px"> <input id="p3_0"  type="radio" name="p3" value="0" <?php echo!$p3 ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_1')" width="43px"> <input id="p3_1"  type="radio" name="p3" value="1" <?php echo $p3 == "1" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_2')"> <input id="p3_2"  type="radio" name="p3" value="2" <?php echo $p3 == "2" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_3')"> <input id="p3_3"  type="radio" name="p3" value="3" <?php echo $p3 == "3" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_4')"> <input id="p3_4"  type="radio" name="p3" value="4" <?php echo $p3 == "4" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_5')"> <input id="p3_5"  type="radio" name="p3" value="5" <?php echo $p3 == "5" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_6')"> <input id="p3_6"  type="radio" name="p3" value="6" <?php echo $p3 == "6" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_7')"> <input id="p3_7"  type="radio" name="p3" value="7" <?php echo $p3 == "7" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_8')"> <input id="p3_8"  type="radio" name="p3" value="8" <?php echo $p3 == "8" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_9')"> <input id="p3_9"  type="radio" name="p3" value="9" <?php echo $p3 == "9" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p3_10')"><input id="p3_10" type="radio" name="p3" value="10" <?php echo $p3 == "10" ? "checked" : "" ?>/></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="td_esq"> Término </td>
                <td class="" colspan="4" background="imagens/eva_escala.jpg" style="background-repeat: no-repeat; padding:130px 0px 50px 5px;">
                    <table border="1" width="670px" >
                        <tr><?php $p4 = $ficha ? $_SESSION['anexo3']['p4'] : -1; ?>
                            <td onClick="radioClick('p4_0')" width="42px"> <input id="p4_0"  type="radio" name="p4" value="0" <?php echo!$p4 ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_1')" width="43px"> <input id="p4_1"  type="radio" name="p4" value="1" <?php echo $p4 == "1" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_2')"> <input id="p4_2"  type="radio" name="p4" value="2" <?php echo $p4 == "2" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_3')"> <input id="p4_3"  type="radio" name="p4" value="3" <?php echo $p4 == "3" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_4')"> <input id="p4_4"  type="radio" name="p4" value="4" <?php echo $p4 == "4" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_5')"> <input id="p4_5"  type="radio" name="p4" value="5" <?php echo $p4 == "5" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_6')"> <input id="p4_6"  type="radio" name="p4" value="6" <?php echo $p4 == "6" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_7')"> <input id="p4_7"  type="radio" name="p4" value="7" <?php echo $p4 == "7" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_8')"> <input id="p4_8"  type="radio" name="p4" value="8" <?php echo $p4 == "8" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_9')"> <input id="p4_9"  type="radio" name="p4" value="9" <?php echo $p4 == "9" ? "checked" : "" ?>/></td>
                            <td onClick="radioClick('p4_10')"><input id="p4_10" type="radio" name="p4" value="10" <?php echo $p4 == "10" ? "checked" : "" ?>/></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td class="td_esq"><br><br></td>
            </tr>

            <tr>
                <td></td>
                <td class="td_esq">Entrevistador/Coletor: </td>
                <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha ? $_SESSION['anexo3']['entrevistador'] : ""; ?>"> </td>
                <td class="td_esq">Data: </td>
                <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha ? $_SESSION['anexo3']['data'] : ""; ?>"> </td>

            </tr>

            <tr>
                <td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo3" hidden> </td>
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