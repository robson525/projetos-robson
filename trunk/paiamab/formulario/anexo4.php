<?php
require_once('classes/class.prontuario.php');

if(isset($_SESSION['anexo4']) && $_SESSION['anexo4']){
    $ficha = true;
}elseif (($_SESSION['selecionar'] || $submetido)) {
    $prontuario = new Prontuario('1_anexo4');
    $_SESSION['anexo4'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
    $ficha = $_SESSION['anexo4']?true:false;
}else{
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
    <h2>Anexo 4: Doenças de Pele</h2>
</center>


<div id="div_ficha">

    <form id="form_ficha" name="form_ficha" method="post" action="index.php?form=4" >

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
                <?php $tab1_p1 = $ficha ? $_SESSION['anexo4']['tab1_p1'] : -1; ?>
                <td colspan="2" class="td_esq">1 - Você já teve alguma doença de pele?  </td>
                <td class="td_dir">	<select id="tab1_p1" name="tab1_p1">
                        <option value=""></option>
                        <option value="1"<?= $tab1_p1 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0"<?= $tab1_p1 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;&ensp;
                    <?php $tab1_p1_q = $ficha ? $_SESSION['anexo4']['tab1_p1_q'] : ""; ?>
                    <span id="tab1_p1_q"> Qual:  </span> <input name="tab1_p1_q" type="text" maxlength="100" style="width: 68%" value="<?= $tab1_p1_q; ?>">
                </td>

            </tr>



            <tr>
                <?php $tab1_p2 = $ficha ? $_SESSION['anexo4']['tab1_p2'] : -1; ?>
                <td colspan="2" class="td_esq">2 - Você tem alguma macha na pele (dói,coça, muda de cor)?</td>
                <td class="td_dir">
                    <select id="tab1_p2" name="tab1_p2">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p2 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p2 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;&ensp;
                    <?php $tab1_p2_q = $ficha ? $_SESSION['anexo4']['tab1_p2_q'] : ""; ?>
                    <span id="tab1_p2_q">Característica: <input name="tab1_p2_q" type="text" maxlength="100" style="width: 55%" value="<?= $tab1_p2_q; ?>"> </span> 
                </td>
            </tr>

            <tr>
                <?php $tab1_p3 = $ficha ? $_SESSION['anexo4']['tab1_p3'] : -1; ?>
                <td colspan="2" class="td_esq">3 - Em sua casa alguém já teve ou tem alguma doença de pele?</td>
                <td class="td_dir">
                    <select id="tab1_p3" name="tab1_p3">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p3 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p3 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
                    &ensp;&ensp;
                    <?php $tab1_p3_q = $ficha ? $_SESSION['anexo4']['tab1_p3_q'] : ""; ?>
                    <span id="tab1_p3_q"> Qual o parentesco:  <input name="tab1_p3_q" type="text" maxlength="100" style="width: 50%" value="<?= $tab1_p3_q; ?>">  </span>
                </td>
            </tr>

            <tr>
                <?php $tab1_p4 = $ficha ? $_SESSION['anexo4']['tab1_p4'] : -1; ?>
                <td colspan="2" class="td_esq">4 - Você tem alguma caroço no corpo ou na cabeça?</td>
                <td class="td_dir">
                    <select id="tab1_p4" name="tab1_p4">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p4 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p4 == "0" ? "selected" : "" ?>>Não</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p4_q = $ficha ? $_SESSION['anexo4']['tab1_p4_q'] : ""; ?>
                    <span id="tab1_p4_q">Local: <input name="tab1_p4_q" type="text" maxlength="100" style="width: 68%" value="<?= $tab1_p4_q; ?>"> </span> </td>
            </tr>

            <tr>
                <?php $tab1_p5 = $ficha ? $_SESSION['anexo4']['tab1_p5'] : -1; ?>
                <td colspan="2" class="td_esq">5 - Tem alguma parte de seu corpo onde coça (pode ser na cabeça ou nas unhas)?</td>
                <td class="td_dir">
                    <select id="tab1_p5" name="tab1_p5">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p5 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p5 == "0" ? "selected" : "" ?>>Não</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p5_q = $ficha ? $_SESSION['anexo4']['tab1_p5_q'] : ""; ?>
                    <span id="tab1_p5_q">Local: <input name="tab1_p5_q" type="text" maxlength="100" style="width: 68%;" value="<?= $tab1_p5_q; ?>"> </span>
                </td>
            </tr>

            <tr>
                <td colspan="2" class="td_esq">6 - Em caso de feridas ?</td>
                <td class="td_dir">    
                    <table border="0" width="98%">
                        <tr><?php $tab1_p6_1 = $ficha ? $_SESSION['anexo4']['tab1_p6_1'] : -1; ?>
                            <td class="td_esq" width="40%">Coça ?</td>
                            <td class="td_dir"><select name="tab1_p6_1">
                                    <option value=""></option>
                                    <option value="1" <?= $tab1_p6_1 == "1" ? "selected" : "" ?>>Sim</option>
                                    <option value="0" <?= $tab1_p6_1 == "0" ? "selected" : "" ?>>Não</option>
                                </select></td>
                        </tr>
                        <tr><?php $tab1_p6_2 = $ficha ? $_SESSION['anexo4']['tab1_p6_2'] : -1; ?>
                            <td class="td_esq">Tem Pus ?</td>
                            <td class="td_dir"><select name="tab1_p6_2">
                                    <option value=""></option>
                                    <option value="1" <?= $tab1_p6_2 == "1" ? "selected" : "" ?>>Sim</option>
                                    <option value="0" <?= $tab1_p6_2 == "0" ? "selected" : "" ?>>Não</option>
                                </select></td>
                        </tr>
                        <tr><?php $tab1_p6_3 = $ficha ? $_SESSION['anexo4']['tab1_p6_3'] : -1; ?>
                            <td class="td_esq">Doi ?</td>
                            <td class="td_dir"><select name="tab1_p6_3">
                                    <option value=""></option>
                                    <option value="1" <?= $tab1_p6_3 == "1" ? "selected" : "" ?>>Sim</option>
                                    <option value="0" <?= $tab1_p6_3 == "0" ? "selected" : "" ?>>Não</option>
                                </select></td>
                        </tr>
                        <tr><?php $tab1_p6_4 = $ficha ? $_SESSION['anexo4']['tab1_p6_4'] : ""; ?>
                            <td class="td_esq">Quanto Tempo?</td>
                            <td class="td_dir"><input name="tab1_p6_4" type="text" maxlength="20" value="<?= $tab1_p6_4; ?>"></td>
                        </tr>
                        <tr><?php $tab1_p6_5 = $ficha ? $_SESSION['anexo4']['tab1_p6_5'] : -1; ?>
                            <td class="td_esq">Usa algum remedio ?</td>
                            <td class="td_dir"><select name="tab1_p6_5">
                                    <option value=""></option>
                                    <option value="1" <?= $tab1_p6_5 == "1" ? "selected" : "" ?>>Sim</option>
                                    <option value="0" <?= $tab1_p6_5 == "0" ? "selected" : "" ?>>Não</option>
                                </select></td>
                        </tr>
                        <tr><?php $tab1_p6_6 = $ficha ? $_SESSION['anexo4']['tab1_p6_6'] : ""; ?>
                            <td class="td_esq">Caracteristicas ?</td>
                            <td class="td_dir"><input name="tab1_p6_6" type="text" maxlength="100" style="width:99%" value="<?= $tab1_p6_6; ?>"></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr><?php $tab1_p7 = $ficha ? $_SESSION['anexo4']['tab1_p7'] : -1; ?>               
                <td colspan="2" class="td_esq">7 - Você toma quantos banhos ao dia ?</td>
                <td class="td_dir">
                    <select id="tab1_p7" name="tab1_p7">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p7 == "1" ? "selected" : "" ?>>1</option>
                        <option value="2" <?= $tab1_p7 == "2" ? "selected" : "" ?>>2</option>
                        <option value="3" <?= $tab1_p7 == "3" ? "selected" : "" ?>>3</option>
                        <option value="4" <?= $tab1_p7 == "4" ? "selected" : "" ?>>Mais de 3</option>
                    </select> 
                </td>
            </tr>

            <tr> <?php $tab1_p8 = $ficha ? $_SESSION['anexo4']['tab1_p8'] : -1; ?>                 
                <td colspan="2" class="td_esq">8 - Durante o banho o que você costuma usar no corpo (sabão,sabonete)?</td>
                <td class="td_dir">
                    <select id="tab1_p8" name="tab1_p8">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p8 == "1" ? "selected" : "" ?>>Sabão</option>
                        <option value="2" <?= $tab1_p8 == "2" ? "selected" : "" ?>>Sabonete</option>
                        <option value="3" <?= $tab1_p8 == "3" ? "selected" : "" ?>>Outros</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p8_q = $ficha ? $_SESSION['anexo4']['tab1_p8_q'] : ""; ?>
                    <span id="tab1_p8_q">Qual:<input name="tab1_p8_q" type="text" maxlength="20" value="<?= $tab1_p8_q; ?>"> </span>
                </td>
            </tr>

            <tr>  <?php $tab1_p9 = $ficha ? $_SESSION['anexo4']['tab1_p9'] : -1; ?>                 
                <td colspan="2" class="td_esq">9 - Você lava os cabelos todos os dias (usa shapoo, condicionador, sabão, sabonete)?</td>
                <td class="td_dir">
                    <select id="tab1_p9" name="tab1_p9">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p9 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p9 == "0" ? "selected" : "" ?>>Não</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p9_1 = $ficha ? $_SESSION['anexo4']['tab1_p9_1'] : -1; ?>   
                    <select  name="tab1_p9_1">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p9_1 == "1" ? "selected" : "" ?>>Shapoo</option>
                        <option value="2" <?= $tab1_p9_1 == "2" ? "selected" : "" ?>>Condicionador</option>
                        <option value="3" <?= $tab1_p9_1 == "3" ? "selected" : "" ?>>Sabão</option>
                        <option value="4" <?= $tab1_p9_1 == "4" ? "selected" : "" ?>>Sabonete</option>
                        <option value="5" <?= $tab1_p9_1 == "5" ? "selected" : "" ?>>Outros Produtos</option>                
                    </select>&ensp;&ensp;
                    <?php $tab1_p9_2 = $ficha ? $_SESSION['anexo4']['tab1_p9_2'] : ""; ?>  
                    <span id="tab1_p9_2">Qual: <input name="tab1_p9_2" type="text" maxlength="20" value="<?= $tab1_p9_2; ?>"> </span>
            </tr>

            <tr><?php $tab1_p10 = $ficha ? $_SESSION['anexo4']['tab1_p10'] : -1; ?>       
                <td colspan="2" class="td_esq">10 - Você usa protetor solar?</td>
                <td class="td_dir">
                    <select id="tab1_p10" name="tab1_p10">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p10 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p10 == "0" ? "selected" : "" ?>>Não</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p10_q = $ficha ? $_SESSION['anexo4']['tab1_p10_q'] : ""; ?>  
                    <span id="tab1_p10_q">Qual a frequência:<input name="tab1_p10_q" type="text" maxlength="20" value="<?= $tab1_p10_q; ?>"> </span>            
                </td>
            </tr>

            <tr><?php $tab1_p11 = $ficha ? $_SESSION['anexo4']['tab1_p11'] : -1; ?>
                <td colspan="2" class="td_esq">11 - Costuma usar chapéu, guarda-sol, algo para se proteger do sol?</td>
                <td class="td_dir">
                    <select id="tab1_p11" name="tab1_p11">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p11 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p11 == "0" ? "selected" : "" ?>>Não</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p11_q = $ficha ? $_SESSION['anexo4']['tab1_p11_q'] : ""; ?>  
                    <span id="tab1_p11_q">Qual tipo de produto ou objeto: 
                        <input name="tab1_p11_q" type="text" maxlength="20" value="<?= $tab1_p11_q; ?>"> </span> 
                </td>
            </tr>

            <tr><?php $tab1_p12 = $ficha ? $_SESSION['anexo4']['tab1_p12'] : -1; ?>
                <td colspan="2" class="td_esq">12 -  Divide roupas com outras pessoas?</td>
                <td class="td_dir">
                    <select id="tab1_p12" name="tab1_p12">
                        <option value=""></option>
                        <option value="1" <?= $tab1_p12 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab1_p12 == "0" ? "selected" : "" ?>>Não</option>
                    </select>&ensp;&ensp;
                    <?php $tab1_p12_q = $ficha ? $_SESSION['anexo4']['tab1_p12_q'] : ""; ?> 
                    <span id="tab1_p12_q">Com quem:<input name="tab1_p12_q" type="text" maxlength="20" value="<?= $tab1_p12_q; ?>"> </span>
            </tr>

            <tr><td><br><br></td></tr>
            <tr>
                <td colspan="2" style="font-size:17px;"> Dados Complementares </td>
            </tr>

            <tr><?php $tab2_p1 = $ficha ? $_SESSION['anexo4']['tab2_p1'] : -1; ?>
                <td colspan="2" class="td_esq">1 -  Você morra na área urbana ou rural?</td>
                <td class="td_dir">
                    <select id="tab2_p1" name="tab2_p1">
                        <option value=""></option>
                        <option value="1" <?= $tab2_p1 == "1" ? "selected" : "" ?>>Urbana</option>
                        <option value="2" <?= $tab2_p1 == "0" ? "selected" : "" ?>>Rural</option>
                    </select>
                </td>
            </tr>

            <tr><?php $tab2_p2 = $ficha ? $_SESSION['anexo4']['tab2_p2'] : -1; ?>
                <td colspan="2" class="td_esq">2 - Como é sua casa?</td>
                <td class="td_dir">
                    <select id="tab2_p2" name="tab2_p2">
                        <option value=""></option>
                        <option value="1" <?= $tab2_p2 == "1" ? "selected" : "" ?>>Alvenaria</option>
                        <option value="2" <?= $tab2_p2 == "2" ? "selected" : "" ?>>Edifícios</option>
                        <option value="3" <?= $tab2_p2 == "3" ? "selected" : "" ?>>Madeira</option>
                        <option value="4" <?= $tab2_p2 == "4" ? "selected" : "" ?>>Palafita</option>                
                        <option value="5" <?= $tab2_p2 == "5" ? "selected" : "" ?>>Casa de pau a pique</option>
                        <option value="6" <?= $tab2_p2 == "6" ? "selected" : "" ?>>Barraca de Lona</option>
                    </select>
                </td>
            </tr>

            <tr><?php $tab2_p3 = $ficha ? $_SESSION['anexo4']['tab2_p3'] : ""; ?> 
                <td colspan="2" class="td_esq">3 - Qual é sua profissal?</td>
                <td class="td_dir">             
                    <input id="tab2_p3" name="tab2_p3" type="text" maxlength="100" style="width:98%" value="<?= $tab2_p3; ?>">
                </td>
            </tr> 

            <tr><td><br><br></td></tr>
            <tr>
                <td colspan="2" style="font-size:17px;"> Após o exame físico </td>
            </tr>

            <tr><?php $tab3_p1 = $ficha ? $_SESSION['anexo4']['tab3_p1'] : -1; ?>
                <td colspan="2" class="td_esq" >1 - Encontrou mancha no corpo? </td>
                <td class="td_dir">
                    <select id="tab3_p1" name="tab3_p1">
                        <option value=""></option>
                        <option value="1" <?= $tab3_p1 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab3_p1 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
            </tr>
            <tr><?php $tab3_p2 = $ficha ? $_SESSION['anexo4']['tab3_p2'] : ""; ?>
                <td colspan="2" class="td_esq" >2 - Qual a Cor? </td>
                <td class="td_dir">
                    <input name="tab3_p2" type="text" maxlength="50" value="<?= $tab3_p2; ?>"> </td>
            </tr>  
            <tr><?php $tab3_p3 = $ficha ? $_SESSION['anexo4']['tab3_p3'] : ""; ?>
                <td colspan="2" class="td_esq" >3 - Qual o Aspecto? </td>
                <td class="td_dir" >
                    <input id="tab3_p3" name="tab3_p3" type="text" maxlength="50" value="<?= $tab3_p3; ?>"> </td>
            </tr>
            <tr><?php $tab3_p4 = $ficha ? $_SESSION['anexo4']['tab3_p4'] : ""; ?>
                <td colspan="2" class="td_esq" >4 - Qual o Diametro? </td>
                <td class="td_dir">
                    <input id="tab3_p4" name="tab3_p4" type="text" maxlength="50" value="<?= $tab3_p4; ?>">  </td>
            </tr>
            <tr><?php $tab3_p5 = $ficha ? $_SESSION['anexo4']['tab3_p5'] : -1; ?>
                <td colspan="2" class="td_esq">5 - Descamação? </td>
                <td class="td_dir">
                    <select id="tab3_p5" name="tab3_p5">
                        <option value=""></option>
                        <option value="1" <?= $tab3_p5 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab3_p5 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
            </tr>
            <tr><?php $tab3_p6 = $ficha ? $_SESSION['anexo4']['tab3_p6'] : -1; ?>
                <td colspan="2" class="td_esq">6 - Coça? </td>
                <td class="td_dir">
                    <select id="tab3_p6" name="tab3_p6">
                        <option value=""></option>
                        <option value="1" <?= $tab3_p6 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab3_p6 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
            </tr>
            <tr><?php $tab3_p7 = $ficha ? $_SESSION['anexo4']['tab3_p7'] : -1; ?>
                <td colspan="2" class="td_esq">7 - Nas unhas apresenta fungos? </td>
                <td class="td_dir">
                    <select id="tab3_p7" name="tab3_p7">
                        <option value=""></option>
                        <option value="1" <?= $tab3_p7 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab3_p7 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
            </tr>
            <tr><?php $tab3_p8 = $ficha ? $_SESSION['anexo4']['tab3_p8'] : -1; ?>
                <td colspan="2" class="td_esq">8 - Na cabeça encontrou fungos? </td>
                <td class="td_dir">
                    <select id="tab3_p8" name="tab3_p8">
                        <option value=""></option>
                        <option value="1" <?= $tab3_p8 == "1" ? "selected" : "" ?>>Sim</option>
                        <option value="0" <?= $tab3_p8 == "0" ? "selected" : "" ?>>Não</option>
                    </select>
            </tr>



            <tr>
                <td class="td_esq"><br><br></td>
            </tr>

            <tr>
                <td></td>
                <td class="td_esq">Entrevistador/Coletor: </td>
                <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha ? $_SESSION['anexo4']['entrevistador'] : ""; ?>"> </td>
                <td class="td_esq">Data: </td>
                <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha ? $_SESSION['anexo4']['data'] : ""; ?>"> </td>

            </tr>

            <tr>
                <td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo4" hidden> </td>
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
