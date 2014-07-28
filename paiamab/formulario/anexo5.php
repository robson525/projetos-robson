<?php
require_once('classes/class.prontuario.php');

if (isset($_SESSION['anexo5']) && $_SESSION['anexo5']) {
    $ficha = true;
        
} elseif (($_SESSION['selecionar'] || $submetido)) {
    $prontuario = new Prontuario('1_anexo5');
    $_SESSION['anexo5'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
    $ficha = $_SESSION['anexo5']?true:false;
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
    <h2>Anexo 5: Prevenção do Câncer de Colo do Útero</h2>
</center>

<div id="div_ficha">

    <form id="form_ficha" name="form_ficha" method="post" action="index.php?form=5" >

        <table id="tab_ficha" border="0" align="center" width="80%">
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
                <?php $p1 = $ficha ? $_SESSION['anexo5']['p1'] : ""; ?>
                <td colspan="2" class="td_esq">1 - Idade da Primeira Mestruação :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p1" value="<?= $p1 ?>" />
                    &ensp; Anos
                </td>
            </tr>
            
            <tr>
                <?php $p2 = $ficha ? $_SESSION['anexo5']['p2'] : ""; ?>
                <td colspan="2" class="td_esq">2 - Idade da Ultima Mestruação :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p2" value="<?= $p2 ?>" />
                    &ensp; Anos
                </td>
            </tr>
            
            <tr>
                <?php $p3 = $ficha ? $_SESSION['anexo5']['p3'] : ""; ?>
                <td colspan="2" class="td_esq">3 - Início da Vida Sexual :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p3" value="<?= $p3 ?>" />
                    &ensp; Anos
                </td>
            </tr>
            
            <tr>
                <?php $p4 = $ficha ? $_SESSION['anexo5']['p4'] : ""; ?>
                <td colspan="2" class="td_esq">4 - Nº de Parceiros desde o início da Vida Sexual :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p4" value="<?= $p4 ?>" />
                    &ensp; Parceiros
                </td>
            </tr>
            
            <tr>
                <?php $p5 = $ficha ? $_SESSION['anexo5']['p5'] : ""; ?>
                <td colspan="2" class="td_esq">5 - Nº de Parceiros no Ultimo Ano :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p5" value="<?= $p5 ?>" />
                    &ensp; Parceiros
                </td>
            </tr>
            
            <tr>
                <?php $p6 = $ficha ? $_SESSION['anexo5']['p6'] : -1; ?>
                <td colspan="2" class="td_esq">6 - Qual Método Contraceptivo já utilizou ?  </td>
                <td class="td_dir"> <select name="p6">
                                        <option value=""> </option>
                                        <option value="1" <?= $p6=="1"?"selected":"" ?>>Camisinha</option>
                                        <option value="2" <?= $p6=="2"?"selected":"" ?>>Pílula Anticoncepcional</option>
                                        <option value="3" <?= $p6=="3"?"selected":"" ?>>Injeção Anticoncepcional</option>
                                        <option value="4" <?= $p6=="4"?"selected":"" ?>>DIU / SIU</option>
                                        <option value="5" <?= $p6=="5"?"selected":"" ?>>Espermicida</option>
                                        <option value="6" <?= $p6=="6"?"selected":"" ?>>Diafragma</option>
                                        <option value="7" <?= $p6=="7"?"selected":"" ?>>Adesivo Anticoncepcional</option>
                                        <option value="8" <?= $p6=="8"?"selected":"" ?>>Outro</option>
                                    </select>
                    &ensp; &ensp; 
                    <?php $p6_2 = $ficha ? $_SESSION['anexo5']['p6_2'] : ""; ?>
                    Outro : <input type="text" maxlength="100" style="width:40%" name="p6_2" value="<?= $p6_2 ?>" />
                </td>
            </tr>
            
            <tr>
                <?php $p7 = $ficha ? $_SESSION['anexo5']['p7'] : -1; ?>
                <td colspan="2" class="td_esq">7 - Possui Filhos ?  </td>
                <td class="td_dir"><select name="p7">
                        <option value=""></option>
                        <option value="1"<?= $p7 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p7 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;
                     <?php $p7_2 = $ficha ? $_SESSION['anexo5']['p7_2'] : ""; ?>
                    Quantos ? <input type="text" class="numero" maxlength="2" style="width:10%" name="p7_2" value="<?= $p7_2 ?>" />
                </td>

            </tr>
            
            <tr>
                <?php $p8 = $ficha ? $_SESSION['anexo5']['p8'] : ""; ?>
                <td colspan="2" class="td_esq">8 - Nº de Partos Normais :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p8" value="<?= $p8 ?>" />
                    &ensp;
                </td>
            </tr>
            
            <tr>
                <?php $p9 = $ficha ? $_SESSION['anexo5']['p9'] : ""; ?>
                <td colspan="2" class="td_esq">9 - Idade no Primeiro Parto :  </td>
                <td class="td_dir"> <input type="text" class="numero" maxlength="2" style="width:10%" name="p9" value="<?= $p9 ?>" />
                    &ensp; Anos
                </td>
            </tr>
            
            <tr>
                <?php $p10 = $ficha ? $_SESSION['anexo5']['p10'] : -1; ?>
                <td colspan="2" class="td_esq">10 - Já fez Aborto ?  </td>
                <td class="td_dir"><select name="p10">
                        <option value=""></option>
                        <option value="1"<?= $p10 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p10 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;
                     <?php $p10_2 = $ficha ? $_SESSION['anexo5']['p10_2'] : ""; ?>
                    Quantos ? <input type="text" class="numero" maxlength="2" style="width:10%" name="p10_2" value="<?= $p10_2 ?>" />
                </td>

            </tr>
            
            <tr>
                <?php $p11 = $ficha ? $_SESSION['anexo5']['p11'] : -1; ?>
                <td colspan="2" class="td_esq">11 - Faz Higiene Intima Interna ?  </td>
                <td class="td_dir"><select name="p11">
                        <option value=""></option>
                        <option value="1"<?= $p11 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p11 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;
                </td>
            </tr>
           
            <tr>
                <?php $p12 = $ficha ? $_SESSION['anexo5']['p12'] : -1; ?>
                <td colspan="2" class="td_esq">12 - Reposição Hormonal ?  </td>
                <td class="td_dir"><select name="p12">
                        <option value=""></option>
                        <option value="1"<?= $p12 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p12 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;
                    <?php $p12_2 = $ficha ? $_SESSION['anexo5']['p12_2'] : ""; ?>
                    Tempo ? <input type="text" class="numero" maxlength="2" style="width:10%" name="p12_2" value="<?= $p12_2 ?>" />&ensp;
                    Anos
                </td>
            </tr>
            
            <tr>
                <?php $p13 = $ficha ? $_SESSION['anexo5']['p13'] : -1; ?>
                <td colspan="2" class="td_esq">13 - Apresenta algum problema ginecológico ?  </td>
                <td class="td_dir"><select name="p13">
                        <option value=""></option>
                        <option value="1"<?= $p13 == "1" ? "selected" : "" ?>>Corrimento</option>
                        <option value="2"<?= $p13 == "2" ? "selected" : "" ?>>Sangramento</option>
                        <option value="3"<?= $p13 == "3" ? "selected" : "" ?>>Dores</option>
                        <option value="4"<?= $p13 == "4" ? "selected" : "" ?>>Coceira</option>
                        <option value="5"<?= $p13 == "5" ? "selected" : "" ?>>Odor Forte</option>
                        <option value="6"<?= $p13 == "6" ? "selected" : "" ?>>Ardência ao Urinar</option>
                        <option value="7"<?= $p13 == "7" ? "selected" : "" ?>>Outros</option>
                    </select>
                    &ensp;
                    <?php $p13_2 = $ficha ? $_SESSION['anexo5']['p13_2'] : ""; ?>
                    Outro : <input type="text" maxlength="100" style="width:40%" name="p13_2" value="<?= $p13_2 ?>" />
                </td>
            </tr>
            
            <tr>
                <?php $p14 = $ficha ? $_SESSION['anexo5']['p14'] : -1; ?>
                <td colspan="2" class="td_esq">14 - Faz Exame Preventivo Periodicamente ?  </td>
                <td class="td_dir"><select name="p14">
                        <option value=""></option>
                        <option value="1"<?= $p14 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p14 == "0" ? "selected" : "" ?>>Não</option>
                        <option value="2"<?= $p14 == "2" ? "selected" : "" ?>>1ª Coleta</option>
                    </select>
                    &ensp;
                </td>
            </tr>
            
            <script type="text/javascript">
                $(document).ready(function(){ $("#p15").mask("00/0000");});
            </script>
            <tr>
                <?php $p15 = $ficha ? $_SESSION['anexo5']['p15'] : ""; ?>
                <td colspan="2" class="td_esq">15 - Em qual Mês e Ano fez o Ultimo Exame Preventivo ?  </td>
                <td class="td_dir"> <input type="text" id="p15" maxlength="7" style="width:30%" name="p15" value="<?= $p15 ?>" />
                    &ensp;
                </td>
            </tr>
            
            <tr>
                <?php $p16 = $ficha ? $_SESSION['anexo5']['p16'] : -1; ?>
                <td colspan="2" class="td_esq">16 - Resultado do Ultimo Exame Preventivo ?  </td>
                <td class="td_dir"><select name="p16">
                        <option value=""></option>
                        <option value="1"<?= $p16 == "1" ? "selected" : "" ?>>Normal</option>
                        <option value="2"<?= $p16 == "2" ? "selected" : "" ?>>Alterado. Com Tratamento</option>
                        <option value="3"<?= $p16 == "3" ? "selected" : "" ?>>Alterado. Sem Tratamento</option>
                    </select>
                    &ensp;
                </td>
            </tr>
            
            <tr>
                <?php $p17 = $ficha ? $_SESSION['anexo5']['p17'] : -1; ?>
                <td colspan="2" class="td_esq">17 - Possui alguma Doença Crônica ?  </td>
                <td class="td_dir"><select name="p17">
                        <option value=""></option>
                        <option value="1"<?= $p17 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p17 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;
                    <?php $p17_2 = $ficha ? $_SESSION['anexo5']['p17_2'] : ""; ?>
                    Qual ? <input type="text" maxlength="100" style="width:40%" name="p17_2" value="<?= $p17_2 ?>" />
                </td>
            </tr>
            
            <tr>
                <?php $p18 = $ficha ? $_SESSION['anexo5']['p18'] : -1; ?>
                <td colspan="2" class="td_esq">18 - Fez Alguma Cirugia ?  </td>
                <td class="td_dir"><select name="p18">
                        <option value=""></option>
                        <option value="1"<?= $p18 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $p18 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;
                    <?php $p18_2 = $ficha ? $_SESSION['anexo5']['p18_2'] : ""; ?>
                    Qual Orgão ? <input type="text" maxlength="100" style="width:40%" name="p18_2" value="<?= $p18_2 ?>" />
                </td>
            </tr>
            
            <tr>
                <?php $p19 = $ficha ? $_SESSION['anexo5']['p19'] : -1; ?>
                <td colspan="2" class="td_esq">19 - Aspectos do Colo do Útero ?  </td>
                <td class="td_dir"><select name="p19">
                        <option value=""></option>
                        <option value="1"<?= $p19 == "1" ? "selected" : "" ?>>Hiperemiado</option>
                        <option value="2"<?= $p19 == "2" ? "selected" : "" ?>>Ferido</option>
                        <option value="3"<?= $p19 == "3" ? "selected" : "" ?>>Ectopia</option>
                        <option value="4"<?= $p19 == "4" ? "selected" : "" ?>>Outros</option>
                    </select>
                    &ensp;
                    <?php $p19_2 = $ficha ? $_SESSION['anexo5']['p19_2'] : ""; ?>
                    Outros: <input type="text" maxlength="100" style="width:55%" name="p19_2" value="<?= $p19_2 ?>" />
                </td>
            </tr>
            
            
            
            <tr>
                <td class="td_esq"><br><br></td>
            </tr>

            <tr>
                <td></td>
                <td class="td_esq">Entrevistador/Coletor: </td>
                <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha ? $_SESSION['anexo5']['entrevistador'] : ""; ?>"> </td>
                <td class="td_esq">Data: </td>
                <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha ? $_SESSION['anexo5']['data'] : ""; ?>"> </td>

            </tr>

            <tr>
                <td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo5" hidden> </td>
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