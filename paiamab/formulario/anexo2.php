<?php 
	require_once('classes/class.prontuario.php');
	
	if($_SESSION['selecionar'])
		$prontuario = new Prontuario('1_anexo2');
	
	if(($_SESSION['selecionar'] || $submetido)){
		$_SESSION['anexo2'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
		//var_dump($_SESSION['anexo1']);
	}
	
	if(isset($_SESSION['fichaCadas']) && $_SESSION['fichaCadas']){
		//$ficha = true;
		$n_controle = $_SESSION['fichaCadas']['n_controle'];
	}else{
		//$ficha = false;		
		$n_controle = false;
	}
	
	
	if(isset($_SESSION['anexo2']) && $_SESSION['anexo2']){
		$ficha = true;
	}else{
		$ficha = false;		
	}
		
?>

<div id="div_erro_validacao">
  <center>
    <?php 
        if(isset($_POST['submit']) && $_POST['submit'])
            echo $mensagem_texto;
    ?>
    <br>
  </center>
</div>
<center>
  <h2>Anexo 2: Escala de Estresse Percebido</h2>
</center>
<div id="div_ficha">
  <form id="form_ficha" name="form_ficha" method="post" action="index.php?form=2" >
    <table id="tab_anexo" border="0" align="center" width="80%">
    <tr>
      <td width=""></td>
      <td class="td_esq" width="40%">Nº de Controle: </td>
      <td class="td_dir" width="40%"><input id="n_controle" name="n_controle" type="text" maxlength="10" value="<?php echo $n_controle?$_SESSION['fichaCadas']['n_controle']:""; ?>" disabled>
      <input name="n_controle" type="text" value="<?php echo $n_controle?$_SESSION['fichaCadas']['n_controle']:""; ?>" hidden> </td>
    </tr>
    <tr>
      <td></td>
      <td class="td_esq">Nome: </td>
      <td class="td_dir"><input id="nome" name="nome" type="text" maxlength="100" style="width:100%" value="<?php echo $n_controle?$_SESSION['fichaCadas']['nome']:""; ?>" disabled></td>
    </tr>
    <tr>
      <td class="text_explicativo" colspan="4"><br>
        &nbsp;&nbsp; As questões nesta escala perguntam sobre seus sentimentos e pensamentos durante o último mês. Em cada caso, será pedido para você indicar o quão frequentemente você tem se sentido de uma determinada maneira. Embora algumas das perguntas sejam similares, há diferenças entre elas e você deve analisar cada uma como uma pergunta separada. A melhor abordagem é responder a cada pergunta razoavelmente rápido. Isto é, não tente contar o número de vezes que você se sentiu de 
        uma maneira particular, mas indique a alternativa que lhe pareça como uma estimativa razoável.<br>
        <br>
        <br></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><span style="font-size:20px;">Primeira intervenção:</span> Nesse último mês, com que frequência...</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr>
                    	<th width="15%"> Nunca </th>
                        <th width="25%"> Quase Nunca </th>
                        <th width="20%"> Às Vezes </th>
                        <th width="25%"> Quase Sempre </th>
                        <th width="15%"> Sempre </th>
                    </tr>
          </table>
      </td>
    </tr>
    <tr>
      <td>1 </td>
      <td class="td_just">Você tem ficado triste por causa de algo que aconteceu inesperadamente?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p1 = $ficha?$_SESSION['anexo2']['tab1_p1']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p1_1')"> <input id="tab1_p1_1" type="radio" name="tab1_p1" value="0"
                        																		<?php echo $tab1_p1=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p1_2')"> <input id="tab1_p1_2" type="radio" name="tab1_p1" value="1"
                        																		<?php echo $tab1_p1=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p1_3')"> <input id="tab1_p1_3" type="radio" name="tab1_p1" value="2"
                        																		<?php echo $tab1_p1=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p1_4')"> <input id="tab1_p1_4" type="radio" name="tab1_p1" value="3"
                        																		<?php echo $tab1_p1=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p1_5')"> <input id="tab1_p1_5" type="radio" name="tab1_p1" value="4"
                        																		<?php echo $tab1_p1=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>2 </td>
      <td class="td_just">Você tem se sentido incapaz de controlar as coisas importantes em sua vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p2 = $ficha?$_SESSION['anexo2']['tab1_p2']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p2_2')"> <input id="tab1_p2_1" type="radio" name="tab1_p2" value="0"
                        																		<?php echo $tab1_p2=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p2_2')"> <input id="tab1_p2_2" type="radio" name="tab1_p2" value="1"
                        																		<?php echo $tab1_p2=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p2_3')"> <input id="tab1_p2_3" type="radio" name="tab1_p2" value="2"
                        																		<?php echo $tab1_p2=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p2_4')"> <input id="tab1_p2_4" type="radio" name="tab1_p2" value="3"
                        																		<?php echo $tab1_p2=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p2_5')"> <input id="tab1_p2_5" type="radio" name="tab1_p2" value="4"
                        																		<?php echo $tab1_p2=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
      	</td>
    </tr>
    <tr>
      <td>3 </td>
      <td class="td_just">Você tem se sentido nervoso e “estressado”?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p3 = $ficha?$_SESSION['anexo2']['tab1_p3']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p3_1')"> <input id="tab1_p3_1" type="radio" name="tab1_p3" value="0"
                        																		<?php echo $tab1_p3=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p3_2')"> <input id="tab1_p3_2" type="radio" name="tab1_p3" value="1"
                        																		<?php echo $tab1_p3=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p3_3')"> <input id="tab1_p3_3" type="radio" name="tab1_p3" value="2"
                        																		<?php echo $tab1_p3=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p3_4')"> <input id="tab1_p3_4" type="radio" name="tab1_p3" value="3"
                        																		<?php echo $tab1_p3=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p3_5')"> <input id="tab1_p3_5" type="radio" name="tab1_p3" value="4"
                        																		<?php echo $tab1_p3=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>4 </td>
      <td class="td_just">Você tem tratado com sucesso dos problemas difíceis da vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p4 = $ficha?$_SESSION['anexo2']['tab1_p4']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p4_1')"> <input id="tab1_p4_1" type="radio" name="tab1_p4" value="0"
                        																		<?php echo $tab1_p4=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p4_2')"> <input id="tab1_p4_2" type="radio" name="tab1_p4" value="1"
                        																		<?php echo $tab1_p4=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p4_3')"> <input id="tab1_p4_3" type="radio" name="tab1_p4" value="2"
                        																		<?php echo $tab1_p4=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p4_4')"> <input id="tab1_p4_4" type="radio" name="tab1_p4" value="3"
                        																		<?php echo $tab1_p4=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p4_5')"> <input id="tab1_p4_5" type="radio" name="tab1_p4" value="4"
                        																		<?php echo $tab1_p4=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>5 </td>
      <td class="td_just">Você tem sentido que está lidando bem com as mudanças importantes que estão ocorrendo em sua vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p5 = $ficha?$_SESSION['anexo2']['tab1_p5']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p5_1')"> <input id="tab1_p5_1" type="radio" name="tab1_p5" value="0"
                        																		<?php echo $tab1_p5=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p5_2')"> <input id="tab1_p5_2" type="radio" name="tab1_p5" value="1"
                        																		<?php echo $tab1_p5=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p5_3')"> <input id="tab1_p5_3" type="radio" name="tab1_p5" value="2"
                        																		<?php echo $tab1_p5=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p5_4')"> <input id="tab1_p5_4" type="radio" name="tab1_p5" value="3"
                        																		<?php echo $tab1_p5=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p5_5')"> <input id="tab1_p5_5" type="radio" name="tab1_p5" value="4"
                        																		<?php echo $tab1_p5=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>6 </td>
      <td class="td_just">Você tem se sentido confiante na sua habilidade de resolver problemas pessoais?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p6 = $ficha?$_SESSION['anexo2']['tab1_p6']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p6_1')"> <input id="tab1_p6_1" type="radio" name="tab1_p6" value="0"
                        																		<?php echo $tab1_p6=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p6_2')"> <input id="tab1_p6_2" type="radio" name="tab1_p6" value="1"
                        																		<?php echo $tab1_p6=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p6_3')"> <input id="tab1_p6_3" type="radio" name="tab1_p6" value="2"
                        																		<?php echo $tab1_p6=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p6_4')"> <input id="tab1_p6_4" type="radio" name="tab1_p6" value="3"
                        																		<?php echo $tab1_p6=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p6_5')"> <input id="tab1_p6_5" type="radio" name="tab1_p6" value="4"
                        																		<?php echo $tab1_p6=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>7 </td>
      <td class="td_just">Você tem sentido que as coisas estão acontecendo de acordo com a sua vontade?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p7 = $ficha?$_SESSION['anexo2']['tab1_p7']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p7_1')"> <input id="tab1_p7_1" type="radio" name="tab1_p7" value="0"
                        																		<?php echo $tab1_p7=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p7_2')"> <input id="tab1_p7_2" type="radio" name="tab1_p7" value="1"
                        																		<?php echo $tab1_p7=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p7_3')"> <input id="tab1_p7_3" type="radio" name="tab1_p7" value="2"
                        																		<?php echo $tab1_p7=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p7_4')"> <input id="tab1_p7_4" type="radio" name="tab1_p7" value="3"
                        																		<?php echo $tab1_p7=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p7_5')"> <input id="tab1_p7_5" type="radio" name="tab1_p7" value="4"
                        																		<?php echo $tab1_p7=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>8 </td>
      <td class="td_just">Você tem achado que não conseguiria lidar com todas as coisas que você tem que fazer?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p8 = $ficha?$_SESSION['anexo2']['tab1_p8']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p8_1')"> <input id="tab1_p8_1" type="radio" name="tab1_p8" value="0"
                        																		<?php echo $tab1_p8=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p8_2')"> <input id="tab1_p8_2" type="radio" name="tab1_p8" value="1"
                        																		<?php echo $tab1_p8=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p8_3')"> <input id="tab1_p8_3" type="radio" name="tab1_p8" value="2"
                        																		<?php echo $tab1_p8=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p8_4')"> <input id="tab1_p8_4" type="radio" name="tab1_p8" value="3"
                        																		<?php echo $tab1_p8=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p8_5')"> <input id="tab1_p8_5" type="radio" name="tab1_p8" value="4"
                        																		<?php echo $tab1_p8=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>9 </td>
      <td class="td_just">Você tem conseguido controlar as irritações em sua vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p9 = $ficha?$_SESSION['anexo2']['tab1_p9']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p9_1')"> <input id="tab1_p9_1" type="radio" name="tab1_p9" value="0"
                        																		<?php echo $tab1_p9=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p9_2')"> <input id="tab1_p9_2" type="radio" name="tab1_p9" value="1"
                        																		<?php echo $tab1_p9=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p9_3')"> <input id="tab1_p9_3" type="radio" name="tab1_p9" value="2"
                        																		<?php echo $tab1_p9=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p9_4')"> <input id="tab1_p9_4" type="radio" name="tab1_p9" value="3"
                        																		<?php echo $tab1_p9=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p9_5')"> <input id="tab1_p9_5" type="radio" name="tab1_p9" value="4"
                        																		<?php echo $tab1_p9=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>10 </td>
      <td class="td_just">Você tem sentido que as coisas estão sob seus controle?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p10 = $ficha?$_SESSION['anexo2']['tab1_p10']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p10_1')"> <input id="tab1_p10_1" type="radio" name="tab1_p10" value="0"
                        																		<?php echo $tab1_p10=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p10_2')"> <input id="tab1_p10_2" type="radio" name="tab1_p10" value="1"
                        																		<?php echo $tab1_p10=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p10_3')"> <input id="tab1_p10_3" type="radio" name="tab1_p10" value="2"
                        																		<?php echo $tab1_p10=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p10_4')"> <input id="tab1_p10_4" type="radio" name="tab1_p10" value="3"
                        																		<?php echo $tab1_p10=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p10_5')"> <input id="tab1_p10_5" type="radio" name="tab1_p10" value="4"
                        																		<?php echo $tab1_p10=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>11 </td>
      <td class="td_just">Você tem ficado irritado porque as coisas que acontecem estão fora do seu controle?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p11 = $ficha?$_SESSION['anexo2']['tab1_p11']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p11_1')"> <input id="tab1_p11_1" type="radio" name="tab1_p11" value="0"
                        																		<?php echo $tab1_p11=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p11_2')"> <input id="tab1_p11_2" type="radio" name="tab1_p11" value="1"
                        																		<?php echo $tab1_p11=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p11_3')"> <input id="tab1_p11_3" type="radio" name="tab1_p11" value="2"
                        																		<?php echo $tab1_p11=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p11_4')"> <input id="tab1_p11_4" type="radio" name="tab1_p11" value="3"
                        																		<?php echo $tab1_p11=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p11_5')"> <input id="tab1_p11_5" type="radio" name="tab1_p11" value="4"
                        																		<?php echo $tab1_p11=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>12 </td>
      <td class="td_just">Você tem se encontrado pensando sobre as coisas que deve fazer?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p12 = $ficha?$_SESSION['anexo2']['tab1_p12']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p12_1')"> <input id="tab1_p12_1" type="radio" name="tab1_p12" value="0"
                        																		<?php echo $tab1_p12=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p12_2')"> <input id="tab1_p12_2" type="radio" name="tab1_p12" value="1"
                        																		<?php echo $tab1_p12=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p12_3')"> <input id="tab1_p12_3" type="radio" name="tab1_p12" value="2"
                        																		<?php echo $tab1_p12=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p12_4')"> <input id="tab1_p12_4" type="radio" name="tab1_p12" value="3"
                        																		<?php echo $tab1_p12=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p12_5')"> <input id="tab1_p12_5" type="radio" name="tab1_p12" value="4"
                        																		<?php echo $tab1_p12=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>13 </td>
      <td class="td_just">Você tem conseguido controlar a maneira com que gasta seu tempo?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p13 = $ficha?$_SESSION['anexo2']['tab1_p13']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p13_1')"> <input id="tab1_p13_1" type="radio" name="tab1_p13" value="0"
                        																		<?php echo $tab1_p13=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p13_2')"> <input id="tab1_p13_2" type="radio" name="tab1_p13" value="1"
                        																		<?php echo $tab1_p13=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p13_3')"> <input id="tab1_p13_3" type="radio" name="tab1_p13" value="2"
                        																		<?php echo $tab1_p13=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p13_4')"> <input id="tab1_p13_4" type="radio" name="tab1_p13" value="3"
                        																		<?php echo $tab1_p13=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p13_5')"> <input id="tab1_p13_5" type="radio" name="tab1_p13" value="4"
                        																		<?php echo $tab1_p13=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td>14 </td>
      <td class="td_just">Você tem sentido que as dificuldades se acumulam a ponto de você acreditar que não pode superá-las?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab1_p14 = $ficha?$_SESSION['anexo2']['tab1_p14']:-1;?>
                    	<th width="15%" onClick="radioClick('tab1_p14_1')"> <input id="tab1_p14_1" type="radio" name="tab1_p14" value="0"
                        																		<?php echo $tab1_p14=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p14_2')"> <input id="tab1_p14_2" type="radio" name="tab1_p14" value="1"
                        																		<?php echo $tab1_p14=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab1_p14_3')"> <input id="tab1_p14_3" type="radio" name="tab1_p14" value="2"
                        																		<?php echo $tab1_p14=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab1_p14_4')"> <input id="tab1_p14_4" type="radio" name="tab1_p14" value="3"
                        																		<?php echo $tab1_p14=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab1_p14_5')"> <input id="tab1_p14_5" type="radio" name="tab1_p14" value="4"
                        																		<?php echo $tab1_p14=="4"?"checked":""?>/> </th>
                    </tr>
          </table></td>
    </tr>
    <tr>
      <td><br>
        <br></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><span style="font-size:20px;">Ultima intervenção:</span> Nesse último mês, com que frequência...</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr>
                    	<th width="15%"> Nunca </th>
                        <th width="25%"> Quase Nunca </th>
                        <th width="20%"> Às Vezes </th>
                        <th width="25%"> Quase Sempre </th>
                        <th width="15%"> Sempre </th>
                    </tr>
          </table>
      </td>
    </tr>
    <tr>
      <td>1 </td>
      <td class="td_just">Você tem ficado triste por causa de algo que aconteceu inesperadamente?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p1 = $ficha?$_SESSION['anexo2']['tab2_p1']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p1_1')"> <input id="tab2_p1_1" type="radio" name="tab2_p1" value="0"
                        																		<?php echo $tab2_p1=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p1_2')"> <input id="tab2_p1_2" type="radio" name="tab2_p1" value="1"
                        																		<?php echo $tab2_p1=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p1_3')"> <input id="tab2_p1_3" type="radio" name="tab2_p1" value="2"
                        																		<?php echo $tab2_p1=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p1_4')"> <input id="tab2_p1_4" type="radio" name="tab2_p1" value="3"
                        																		<?php echo $tab2_p1=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p1_5')"> <input id="tab2_p1_5" type="radio" name="tab2_p1" value="4"
                        																		<?php echo $tab2_p1=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>2 </td>
      <td class="td_just">Você tem se sentido incapaz de controlar as coisas importantes em sua vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p2 = $ficha?$_SESSION['anexo2']['tab2_p2']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p2_1')"> <input id="tab2_p2_1" type="radio" name="tab2_p2" value="0"
                        																		<?php echo $tab2_p2=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p2_2')"> <input id="tab2_p2_2" type="radio" name="tab2_p2" value="1"
                        																		<?php echo $tab2_p2=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p2_3')"> <input id="tab2_p2_3" type="radio" name="tab2_p2" value="2"
                        																		<?php echo $tab2_p2=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p2_4')"> <input id="tab2_p2_4" type="radio" name="tab2_p2" value="3"
                        																		<?php echo $tab2_p2=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p2_5')"> <input id="tab2_p2_5" type="radio" name="tab2_p2" value="4"
                        																		<?php echo $tab2_p2=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>3 </td>
      <td class="td_just">Você tem se sentido nervoso e “estressado”?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p3 = $ficha?$_SESSION['anexo2']['tab2_p3']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p3_1')"> <input id="tab2_p3_1" type="radio" name="tab2_p3" value="0"
                        																		<?php echo $tab2_p3=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p3_2')"> <input id="tab2_p3_2" type="radio" name="tab2_p3" value="1"
                        																		<?php echo $tab2_p3=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p3_3')"> <input id="tab2_p3_3" type="radio" name="tab2_p3" value="2"
                        																		<?php echo $tab2_p3=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p3_4')"> <input id="tab2_p3_4" type="radio" name="tab2_p3" value="3"
                        																		<?php echo $tab2_p3=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p3_5')"> <input id="tab2_p3_5" type="radio" name="tab2_p3" value="4"
                        																		<?php echo $tab2_p3=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>4 </td>
      <td class="td_just">Você tem tratado com sucesso dos problemas difíceis da vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p4 = $ficha?$_SESSION['anexo2']['tab2_p4']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p4_1')"> <input id="tab2_p4_1" type="radio" name="tab2_p4" value="0"
                        																		<?php echo $tab2_p4=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p4_2')"> <input id="tab2_p4_2" type="radio" name="tab2_p4" value="1"
                        																		<?php echo $tab2_p4=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p4_3')"> <input id="tab2_p4_3" type="radio" name="tab2_p4" value="2"
                        																		<?php echo $tab2_p4=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p4_4')"> <input id="tab2_p4_4" type="radio" name="tab2_p4" value="3"
                        																		<?php echo $tab2_p4=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p4_5')"> <input id="tab2_p4_5" type="radio" name="tab2_p4" value="4"
                        																		<?php echo $tab2_p4=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>5 </td>
      <td class="td_just">Você tem sentido que está lidando bem com as mudanças importantes que estão ocorrendo em sua vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p5 = $ficha?$_SESSION['anexo2']['tab2_p5']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p5_1')"> <input id="tab2_p5_1" type="radio" name="tab2_p5" value="0"
                        																		<?php echo $tab2_p5=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p5_2')"> <input id="tab2_p5_2" type="radio" name="tab2_p5" value="1"
                        																		<?php echo $tab2_p5=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p5_3')"> <input id="tab2_p5_3" type="radio" name="tab2_p5" value="2"
                        																		<?php echo $tab2_p5=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p5_4')"> <input id="tab2_p5_4" type="radio" name="tab2_p5" value="3"
                        																		<?php echo $tab2_p5=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p5_5')"> <input id="tab2_p5_5" type="radio" name="tab2_p5" value="4"
                        																		<?php echo $tab2_p5=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>6 </td>
      <td class="td_just">Você tem se sentido confiante na sua habilidade de resolver problemas pessoais?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p6 = $ficha?$_SESSION['anexo2']['tab2_p6']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p6_1')"> <input id="tab2_p6_1" type="radio" name="tab2_p6" value="0"
                        																		<?php echo $tab2_p6=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p6_2')"> <input id="tab2_p6_2" type="radio" name="tab2_p6" value="1"
                        																		<?php echo $tab2_p6=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p6_3')"> <input id="tab2_p6_3" type="radio" name="tab2_p6" value="2"
                        																		<?php echo $tab2_p6=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p6_4')"> <input id="tab2_p6_4" type="radio" name="tab2_p6" value="3"
                        																		<?php echo $tab2_p6=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p6_5')"> <input id="tab2_p6_5" type="radio" name="tab2_p6" value="4"
                        																		<?php echo $tab2_p6=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>7 </td>
      <td class="td_just">Você tem sentido que as coisas estão acontecendo de acordo com a sua vontade?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p7 = $ficha?$_SESSION['anexo2']['tab2_p7']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p7_1')"> <input id="tab2_p7_1" type="radio" name="tab2_p7" value="0"
                        																		<?php echo $tab2_p7=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p7_2')"> <input id="tab2_p7_2" type="radio" name="tab2_p7" value="1"
                        																		<?php echo $tab2_p7=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p7_3')"> <input id="tab2_p7_3" type="radio" name="tab2_p7" value="2"
                        																		<?php echo $tab2_p7=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p7_4')"> <input id="tab2_p7_4" type="radio" name="tab2_p7" value="3"
                        																		<?php echo $tab2_p7=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p7_5')"> <input id="tab2_p7_5" type="radio" name="tab2_p7" value="4"
                        																		<?php echo $tab2_p7=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>8 </td>
      <td class="td_just">Você tem achado que não conseguiria lidar com todas as coisas que você tem que fazer?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p8 = $ficha?$_SESSION['anexo2']['tab2_p8']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p8_1')"> <input id="tab2_p8_1" type="radio" name="tab2_p8" value="0"
                        																		<?php echo $tab2_p8=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p8_2')"> <input id="tab2_p8_2" type="radio" name="tab2_p8" value="1"
                        																		<?php echo $tab2_p8=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p8_3')"> <input id="tab2_p8_3" type="radio" name="tab2_p8" value="2"
                        																		<?php echo $tab2_p8=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p8_4')"> <input id="tab2_p8_4" type="radio" name="tab2_p8" value="3"
                        																		<?php echo $tab2_p8=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p8_5')"> <input id="tab2_p8_5" type="radio" name="tab2_p8" value="4"
                        																		<?php echo $tab2_p8=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>9 </td>
      <td class="td_just">Você tem conseguido controlar as irritações em sua vida?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p9 = $ficha?$_SESSION['anexo2']['tab2_p9']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p9_1')"> <input id="tab2_p9_1" type="radio" name="tab2_p9" value="0"
                        																		<?php echo $tab2_p9=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p9_2')"> <input id="tab2_p9_2" type="radio" name="tab2_p9" value="1"
                        																		<?php echo $tab2_p9=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p9_3')"> <input id="tab2_p9_3" type="radio" name="tab2_p9" value="2"
                        																		<?php echo $tab2_p9=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p9_4')"> <input id="tab2_p9_4" type="radio" name="tab2_p9" value="3"
                        																		<?php echo $tab2_p9=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p9_5')"> <input id="tab2_p9_5" type="radio" name="tab2_p9" value="4"
                        																		<?php echo $tab2_p9=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>10 </td>
      <td class="td_just">Você tem sentido que as coisas estão sob seus controle?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p10 = $ficha?$_SESSION['anexo2']['tab2_p10']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p10_1')"> <input id="tab2_p10_1" type="radio" name="tab2_p10" value="0"
                        																		<?php echo $tab2_p10=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p10_2')"> <input id="tab2_p10_2" type="radio" name="tab2_p10" value="1"
                        																		<?php echo $tab2_p10=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p10_3')"> <input id="tab2_p10_3" type="radio" name="tab2_p10" value="2"
                        																		<?php echo $tab2_p10=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p10_4')"> <input id="tab2_p10_4" type="radio" name="tab2_p10" value="3"
                        																		<?php echo $tab2_p10=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p10_5')"> <input id="tab2_p10_5" type="radio" name="tab2_p10" value="4"
                        																		<?php echo $tab2_p10=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>11 </td>
      <td class="td_just">Você tem ficado irritado porque as coisas que acontecem estão fora do seu controle?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p11 = $ficha?$_SESSION['anexo2']['tab2_p11']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p11_1')"> <input id="tab2_p11_1" type="radio" name="tab2_p11" value="0"
                        																		<?php echo $tab2_p11=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p11_2')"> <input id="tab2_p11_2" type="radio" name="tab2_p11" value="1"
                        																		<?php echo $tab2_p11=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p11_3')"> <input id="tab2_p11_3" type="radio" name="tab2_p11" value="2"
                        																		<?php echo $tab2_p11=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p11_4')"> <input id="tab2_p11_4" type="radio" name="tab2_p11" value="3"
                        																		<?php echo $tab2_p11=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p11_5')"> <input id="tab2_p11_5" type="radio" name="tab2_p11" value="4"
                        																		<?php echo $tab2_p11=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>12 </td>
      <td class="td_just">Você tem se encontrado pensando sobre as coisas que deve fazer?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p12 = $ficha?$_SESSION['anexo2']['tab2_p12']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p12_1')"> <input id="tab2_p12_1" type="radio" name="tab2_p12" value="0"
                        																		<?php echo $tab2_p12=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p12_2')"> <input id="tab2_p12_2" type="radio" name="tab2_p12" value="1"
                        																		<?php echo $tab2_p12=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p12_3')"> <input id="tab2_p12_3" type="radio" name="tab2_p12" value="2"
                        																		<?php echo $tab2_p12=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p12_4')"> <input id="tab2_p12_4" type="radio" name="tab2_p12" value="3"
                        																		<?php echo $tab2_p12=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p12_5')"> <input id="tab2_p12_5" type="radio" name="tab2_p12" value="4"
                        																		<?php echo $tab2_p12=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>13 </td>
      <td class="td_just">Você tem conseguido controlar a maneira com que gasta seu tempo?</td>
      <td><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p13 = $ficha?$_SESSION['anexo2']['tab2_p13']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p13_1')"> <input id="tab2_p13_1" type="radio" name="tab2_p13" value="0"
                        																		<?php echo $tab2_p13=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p13_2')"> <input id="tab2_p13_2" type="radio" name="tab2_p13" value="1"
                        																		<?php echo $tab2_p13=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p13_3')"> <input id="tab2_p13_3" type="radio" name="tab2_p13" value="2"
                        																		<?php echo $tab2_p13=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p13_4')"> <input id="tab2_p13_4" type="radio" name="tab2_p13" value="3"
                        																		<?php echo $tab2_p13=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p13_5')"> <input id="tab2_p13_5" type="radio" name="tab2_p13" value="4"
                        																		<?php echo $tab2_p13=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>14 </td>
      <td class="td_just">Você tem sentido que as dificuldades se acumulam a ponto de você acreditar que não pode superá-las?</td>
      <td ><table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p14 = $ficha?$_SESSION['anexo2']['tab2_p14']:-1;?>
                    	<th width="15%" onClick="radioClick('tab2_p14_1')"> <input id="tab2_p14_1" type="radio" name="tab2_p14" value="0"
                        																		<?php echo $tab2_p14=="0"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p14_2')"> <input id="tab2_p14_2" type="radio" name="tab2_p14" value="1"
                        																		<?php echo $tab2_p14=="1"?"checked":""?>/> </th>
                        <th width="20%" onClick="radioClick('tab2_p14_3')"> <input id="tab2_p14_3" type="radio" name="tab2_p14" value="2"
                        																		<?php echo $tab2_p14=="2"?"checked":""?>/> </th>
                        <th width="25%" onClick="radioClick('tab2_p14_4')"> <input id="tab2_p14_4" type="radio" name="tab2_p14" value="3"
                        																		<?php echo $tab2_p14=="3"?"checked":""?>/> </th>
                        <th width="15%" onClick="radioClick('tab2_p14_5')"> <input id="tab2_p14_5" type="radio" name="tab2_p14" value="4"
                        																		<?php echo $tab2_p14=="4"?"checked":""?>/> </th>
                    </tr>
          </table>
        </td>
    </tr>
    <td><td><br><br></td></td>
    <tr>
      <td></td>
      <td class="td_esq">Entrevistador/Coletor: </td>
      <td class="td_dir"><input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha?$_SESSION['anexo2']['entrevistador']:""; ?>"></td>
      <td class="td_esq">Data: </td>
      <td class="td_dir"><input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha?$_SESSION['anexo2']['data']:""; ?>"></td>
    </tr>
    <tr>
      <td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo2" hidden></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td style="padding-top:10px;"><?php if(!$ficha){ ?>
        <input id="submit" name="submit" class="bot_submit" type="submit" value="Salvar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');" >
        <?php }else{ ?>
        <input id="submit" name="submit" class="bot_submit" type="submit" value="Atualizar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');">
        <?php }?></td>
    </tr>
  </form>
  </table>
</div>
