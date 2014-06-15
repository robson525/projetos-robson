
<?php 
	require_once('classes/class.prontuario.php');
	
	if($_SESSION['selecionar'])
		$prontuario = new Prontuario('1_anexo1');
	
	if(($_SESSION['selecionar'] || $submetido)){
		$_SESSION['anexo1'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
		//var_dump($_SESSION['anexo1']);
	}
	
	if(isset($_SESSION['fichaCadas']) && $_SESSION['fichaCadas']){
		//$ficha = true;
		$n_controle = $_SESSION['fichaCadas']['n_controle'];
	}else{
		//$ficha = false;		
		$n_controle = false;
	}
	
	
	if(isset($_SESSION['anexo1']) && $_SESSION['anexo1']){
		$ficha = true;
	}else{
		$ficha = false;		
	}
		
?>

<script type="text/javascript">
	
</script>



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
<h2>Anexo 1 : Avaliação da Qualidade de Vida</h2>
</center>


<div id="div_ficha">

<form id="form_ficha" name="form_ficha" method="post" action="index.php?form=1" >

	<table id="tab_anexo" border="0" align="center" width="80%">
    	<tr>
        	<td></td>
        	<td class="td_esq" width="40%">Nº de Controle: </td>
            <td class="td_dir" width="40%"> <input id="n_controle" name="n_controle" type="text" maxlength="10" value="<?php echo $n_controle?$_SESSION['fichaCadas']['n_controle']:""; ?>" disabled> 
            <input name="n_controle" type="text" value="<?php echo $n_controle?$_SESSION['fichaCadas']['n_controle']:""; ?>" hidden> 
            </td>
        
        </tr>
        <tr>
        	<td></td>
        	<td class="td_esq">Nome: </td>
            <td class="td_dir"> <input id="nome" name="nome" type="text" maxlength="100" style="width:100%" value="<?php echo $n_controle?$_SESSION['fichaCadas']['nome']:""; ?>" disabled> 
            
            </td>
        
        </tr>
        
        <tr>
        	<td class="text_explicativo" colspan="4"> <br><br>&nbsp;&nbsp; Este questionário pergunta a respeito dos seus pensamentos, sentimentos e sobre certos aspectos de sua qualidade de vida, e aborda questões que podem ser importantes para você como membro mais velho da sociedade. Por favor, responda todas as perguntas. Se você não está seguro a respeito de que resposta dar a uma pergunta, por favor escolha a que lhe parece mais apropriada. Esta pode ser muitas vezes a sua primeira resposta.<br><br>&nbsp;&nbsp;
Por favor tenha em mente os seus valores, esperanças, prazeres e preocupações. Pedimos que pense na sua vida nas duas últimas semanas. Por exemplo, pensando nas duas últimas semanas, uma pergunta poderia ser:<br><br>
</td>

        </tr>
        
        <tr>
        	<td class="td_dir" style="vertical-align:bottom; padding-bottom:15px;">1.1</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> O quanto você se preocupa com o que o seu futuro poderá trazer?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr>
                    	<th width="15%"> Nada </td>
                        <th width="20%"> Muito Pouco </td>
                        <th width="25%"> Mais ou Menos </td>
                        <th width="20%"> Bastatnte </td>
                        <th width="20%"> Extremamente </td>
                    </tr>
                    <tr><?php $tab1_p1 = $ficha?$_SESSION['anexo1']['tab1_p1']:false;?>
                        <td width="15%" onClick="radioClick('tab1_p1_1')"> <input id="tab1_p1_1" type="radio" name="tab1_p1" value="1" 
																							<?php echo $tab1_p1=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab1_p1_2')"> <input id="tab1_p1_2" type="radio" name="tab1_p1" value="2"
                        																	<?php echo $tab1_p1=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab1_p1_3')"> <input id="tab1_p1_3" type="radio" name="tab1_p1" value="3"
                        																	<?php echo $tab1_p1=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab1_p1_4')"> <input id="tab1_p1_4" type="radio" name="tab1_p1" value="4"
                        																	<?php echo $tab1_p1=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab1_p1_5')"> <input id="tab1_p1_5" type="radio" name="tab1_p1" value="5"
                        																	<?php echo $tab1_p1=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="text_explicativo" colspan="4" ><br><br><br>&nbsp;&nbsp; Você deve marcar a alternativa que melhor reflete o quanto você se preocupou com o seu futuro durante as duas últimas semanas. Por favor leia cada questão, pense no que sente e marque a altenativa na escala que seja a melhor resposta para você em cada questão.
<br><br>&nbsp;&nbsp;
As seguintes questões perguntam sobre o quanto você tem tido certos sentimentos nas últimas duas semanas:<br><br>
</td>
        </tr>
     
        <tr>
        	<td class="td_dir"></td>
        	<td class="td_esq"> </td>
            <td class="td_dir"> 
            	<table width="100%" class="table_radio" border="0">
                    <tr>
                    	<th width="15%"> Nada </td>
                        <th width="20%"> Muito Pouco </td>
                        <th width="25%"> Mais ou Menos </td>
                        <th width="20%"> Bastatnte </td>
                        <th width="20%"> Extremamente </td>
                    </tr>
               </table></td>
        </tr>
        
        <tr>
        	<td class="td_dir">2.1</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto as perdas nos seus sentidos (por   exemplo,   audição,   visão,
paladar,  olfato,  tato),  afetam  a  sua  vida diária?</td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab2_p1 = $ficha?$_SESSION['anexo1']['tab2_p1']:false;?>
                        <td width="15%" onClick="radioClick('tab2_p1_1')"> <input id="tab2_p1_1" type="radio" name="tab2_p1" value="1" 
                        																		<?php echo $tab2_p1=="1"?"checked":""?>/></td>
                        <td width="20%" onClick="radioClick('tab2_p1_2')"> <input id="tab2_p1_2" type="radio" name="tab2_p1" value="2"
                        																		<?php echo $tab2_p1=="2"?"checked":""?>/></td>
                        <td width="25%" onClick="radioClick('tab2_p1_3')"> <input id="tab2_p1_3" type="radio" name="tab2_p1" value="3"
                        																		<?php echo $tab2_p1=="3"?"checked":""?>/></td>
                        <td width="20%" onClick="radioClick('tab2_p1_4')"> <input id="tab2_p1_4" type="radio" name="tab2_p1" value="4"
                        																		<?php echo $tab2_p1=="4"?"checked":""?>/></td>
                        <td width="20%" onClick="radioClick('tab2_p1_5')"> <input id="tab2_p1_5" type="radio" name="tab2_p1" value="5"
                        																		<?php echo $tab2_p1=="5"?"checked":""?>/></td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">2.2</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até  que  ponto  a  perda  de,  por exemplo, audição, visão, paladar, olfato, tato, afeta a sua capacidade de participar em atividades?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab2_p2 = $ficha?$_SESSION['anexo1']['tab2_p2']:false;?>
                        <td width="15%" onClick="radioClick('tab2_p2_1')"> <input id="tab2_p2_1" type="radio" name="tab2_p2" value="1"
                        																		<?php echo $tab2_p2=="1"?"checked":""?>/></td>
                        <td width="20%" onClick="radioClick('tab2_p2_2')"> <input id="tab2_p2_2" type="radio" name="tab2_p2" value="2"
                        																		<?php echo $tab2_p2=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab2_p2_3')"> <input id="tab2_p2_3" type="radio" name="tab2_p2" value="3"
                        																		<?php echo $tab2_p2=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab2_p2_4')"> <input id="tab2_p2_4" type="radio" name="tab2_p2" value="4"
                        																		<?php echo $tab2_p2=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab2_p2_5')"> <input id="tab2_p2_5" type="radio" name="tab2_p2" value="5"
                        																		<?php echo $tab2_p2=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        
        <tr>
        	<td class="text_explicativo" colspan="4" ><br><br><br>&nbsp;&nbsp; A seguintes questões perguntam sobre <span style="text-decoration:underline;">quão completamente</span> você fez ou se sentiu apto a fazer algumas coisas nas duas últimas semanas:<br><br>
</td>
        </tr>
        <tr>
        	<td class="td_dir"></td>
        	<td class="td_esq"> </td>
            <td class="td_dir"> 
            	<table width="100%" class="table_radio" border="0">
                    <tr>
                    	<th width="15%"> Nada </td>
                        <th width="20%"> Muito Pouco </td>
                        <th width="25%"> Mais ou Menos </td>
                        <th width="20%"> Bastatnte </td>
                        <th width="20%"> Extremamente </td>
                    </tr>
               </table></td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.1</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quanta  liberdade  você  tem  de tomar as sua próprias decisões?</td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab3_p1 = $ficha?$_SESSION['anexo1']['tab3_p1']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p1_1')"> <input id="tab3_p1_1" type="radio" name="tab3_p1" value="1" 
                        																		<?php echo $tab3_p1=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p1_2')"> <input id="tab3_p1_2" type="radio" name="tab3_p1" value="2"
                        																		<?php echo $tab3_p1=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p1_3')"> <input id="tab3_p1_3" type="radio" name="tab3_p1" value="3"
                        																		<?php echo $tab3_p1=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p1_4')"> <input id="tab3_p1_4" type="radio" name="tab3_p1" value="4"
                        																		<?php echo $tab3_p1=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p1_5')"> <input id="tab3_p1_5" type="radio" name="tab3_p1" value="5"
                        																		<?php echo $tab3_p1=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.2</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até  que  ponto  você  sente  que controla o seu futuro?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p2 = $ficha?$_SESSION['anexo1']['tab3_p2']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p2_1')"> <input id="tab3_p2_1" type="radio" name="tab3_p2" value="1" 
                        																		<?php echo $tab3_p1=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p2_2')"> <input id="tab3_p2_2" type="radio" name="tab3_p2" value="2"
                        																		<?php echo $tab3_p1=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p2_3')"> <input id="tab3_p2_3" type="radio" name="tab3_p2" value="3"
                        																		<?php echo $tab3_p1=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p2_4')"> <input id="tab3_p2_4" type="radio" name="tab3_p2" value="4"
                        																		<?php echo $tab3_p1=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p2_5')"> <input id="tab3_p2_5" type="radio" name="tab3_p2" value="5"
                        																		<?php echo $tab3_p1=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.3</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> O quanto você sente que as pessoas ao seu redor respeitam a sua liberdade?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p3 = $ficha?$_SESSION['anexo1']['tab3_p3']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p3_1')"> <input id="tab3_p3_1" type="radio" name="tab3_p3" value="1" 
                        																		<?php echo $tab3_p3=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p3_2')"> <input id="tab3_p3_2" type="radio" name="tab3_p3" value="2"
                        																		<?php echo $tab3_p3=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p3_3')"> <input id="tab3_p3_3" type="radio" name="tab3_p3" value="3"
                        																		<?php echo $tab3_p3=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p3_4')"> <input id="tab3_p3_4" type="radio" name="tab3_p3" value="4"
                        																		<?php echo $tab3_p3=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p3_5')"> <input id="tab3_p3_5" type="radio" name="tab3_p3" value="5"
                        																		<?php echo $tab3_p3=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.4</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quão  preocupado  você  está  pela  maneira pela qual irá morrer?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p4 = $ficha?$_SESSION['anexo1']['tab3_p4']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p4_1')"> <input id="tab3_p4_1" type="radio" name="tab3_p4" value="1" 
                        																		<?php echo $tab3_p4=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p4_2')"> <input id="tab3_p4_2" type="radio" name="tab3_p4" value="2"
                        																		<?php echo $tab3_p4=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p4_3')"> <input id="tab3_p4_3" type="radio" name="tab3_p4" value="3"
                        																		<?php echo $tab3_p4=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p4_4')"> <input id="tab3_p4_4" type="radio" name="tab3_p4" value="4"
                        																		<?php echo $tab3_p4=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p4_5')"> <input id="tab3_p4_5" type="radio" name="tab3_p4" value="5"
                        																		<?php echo $tab3_p4=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.5</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> O quanto você tem medo de não poder controlar a sua morte?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p5 = $ficha?$_SESSION['anexo1']['tab3_p5']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p5_1')"> <input id="tab3_p5_1" type="radio" name="tab3_p5" value="1" 
                        																		<?php echo $tab3_p5=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p5_2')"> <input id="tab3_p5_2" type="radio" name="tab3_p5" value="2"
                        																		<?php echo $tab3_p5=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p5_3')"> <input id="tab3_p5_3" type="radio" name="tab3_p5" value="3"
                        																		<?php echo $tab3_p5=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p5_4')"> <input id="tab3_p5_4" type="radio" name="tab3_p5" value="4"
                        																		<?php echo $tab3_p5=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p5_5')"> <input id="tab3_p5_5" type="radio" name="tab3_p5" value="5"
                        																		<?php echo $tab3_p5=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.6</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> O  quanto  você  tem  medo  de morrer?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p6 = $ficha?$_SESSION['anexo1']['tab3_p6']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p6_1')"> <input id="tab3_p6_1" type="radio" name="tab3_p6" value="1" 
                        																		<?php echo $tab3_p6=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p6_2')"> <input id="tab3_p6_2" type="radio" name="tab3_p6" value="2"
                        																		<?php echo $tab3_p6=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p6_3')"> <input id="tab3_p6_3" type="radio" name="tab3_p6" value="3"
                        																		<?php echo $tab3_p6=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p6_4')"> <input id="tab3_p6_4" type="radio" name="tab3_p6" value="4"
                        																		<?php echo $tab3_p6=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p6_5')"> <input id="tab3_p6_5" type="radio" name="tab3_p6" value="5"
                        																		<?php echo $tab3_p6=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.7</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> O  quanto  você  teme  sofrer  dor antes a morrer?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p7 = $ficha?$_SESSION['anexo1']['tab3_p7']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p7_1')"> <input id="tab3_p7_1" type="radio" name="tab3_p7" value="1" 
                        																		<?php echo $tab3_p7=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p7_2')"> <input id="tab3_p7_2" type="radio" name="tab3_p7" value="2"
                        																		<?php echo $tab3_p7=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p7_3')"> <input id="tab3_p7_3" type="radio" name="tab3_p7" value="3"
                        																		<?php echo $tab3_p7=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p7_4')"> <input id="tab3_p7_4" type="radio" name="tab3_p7" value="4"
                        																		<?php echo $tab3_p7=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p7_5')"> <input id="tab3_p7_5" type="radio" name="tab3_p7" value="5"
                        																		<?php echo $tab3_p7=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.8</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto o funcionamento dos seu sentidos (por exemplo, audição, visão, paladar, olfato, tato) afeta a sua capacidade de interagir com outras pessoas?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p8 = $ficha?$_SESSION['anexo1']['tab3_p8']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p8_1')"> <input id="tab3_p8_1" type="radio" name="tab3_p8" value="1" 
                        																		<?php echo $tab3_p8=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p8_2')"> <input id="tab3_p8_2" type="radio" name="tab3_p8" value="2"
                        																		<?php echo $tab3_p8=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p8_3')"> <input id="tab3_p8_3" type="radio" name="tab3_p8" value="3"
                        																		<?php echo $tab3_p8=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p8_4')"> <input id="tab3_p8_4" type="radio" name="tab3_p8" value="4"
                        																		<?php echo $tab3_p8=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p8_5')"> <input id="tab3_p8_5" type="radio" name="tab3_p8" value="5"
                        																		<?php echo $tab3_p8=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.9</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto você consegue fazer as coisas que gostaria de fazer?</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p9 = $ficha?$_SESSION['anexo1']['tab3_p9']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p9_1')"> <input id="tab3_p9_1" type="radio" name="tab3_p9" value="1" 
                        																		<?php echo $tab3_p9=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p9_2')"> <input id="tab3_p9_2" type="radio" name="tab3_p9" value="2"
                        																		<?php echo $tab3_p9=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p9_3')"> <input id="tab3_p9_3" type="radio" name="tab3_p9" value="3"
                        																		<?php echo $tab3_p9=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p9_4')"> <input id="tab3_p9_4" type="radio" name="tab3_p9" value="4"
                        																		<?php echo $tab3_p9=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p9_5')"> <input id="tab3_p9_5" type="radio" name="tab3_p9" value="5"
                        																		<?php echo $tab3_p9=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.10</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto você está satisfeito com as suas oportunidades para continuar alcançando outras realizações na sua vida?
</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p10 = $ficha?$_SESSION['anexo1']['tab3_p10']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p10_1')"> <input id="tab3_p10_1" type="radio" name="tab3_p10" value="1"
                        																		<?php echo $tab3_p10=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p10_2')"> <input id="tab3_p10_2" type="radio" name="tab3_p10" value="2"
                        																		<?php echo $tab3_p10=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p10_3')"> <input id="tab3_p10_3" type="radio" name="tab3_p10" value="3"
                        																		<?php echo $tab3_p10=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p10_4')"> <input id="tab3_p10_4" type="radio" name="tab3_p10" value="4"
                        																		<?php echo $tab3_p10=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p10_5')"> <input id="tab3_p10_5" type="radio" name="tab3_p10" value="5"
                        																		<?php echo $tab3_p10=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.11</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> O quanto você sente que recebeu o reconhecimento que merece na sua vida?
</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p11 = $ficha?$_SESSION['anexo1']['tab3_p11']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p11_1')"> <input id="tab3_p11_1" type="radio" name="tab3_p11" value="1"
                        																		<?php echo $tab3_p11=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p11_2')"> <input id="tab3_p11_2" type="radio" name="tab3_p11" value="2"
                        																		<?php echo $tab3_p11=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p11_3')"> <input id="tab3_p11_3" type="radio" name="tab3_p11" value="3"
                        																		<?php echo $tab3_p11=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p11_4')"> <input id="tab3_p11_4" type="radio" name="tab3_p11" value="4"
                        																		<?php echo $tab3_p11=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p11_5')"> <input id="tab3_p11_5" type="radio" name="tab3_p11" value="5"
                        																		<?php echo $tab3_p11=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">3.12</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto você sente que tem o suficiente para fazer em cada dia?
</td>
            <td class="td_dir"> 
                <table width="100%" class="table_radio" border="0">
                    <tr><?php $tab3_p12 = $ficha?$_SESSION['anexo1']['tab3_p12']:false;?>
                        <td width="15%" onClick="radioClick('tab3_p12_1')"> <input id="tab3_p12_1" type="radio" name="tab3_p12" value="1"
                        																		<?php echo $tab3_p12=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p12_2')"> <input id="tab3_p12_2" type="radio" name="tab3_p12" value="2"
                        ]																		<?php echo $tab3_p12=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab3_p12_3')"> <input id="tab3_p12_3" type="radio" name="tab3_p12" value="3"
                        																		<?php echo $tab3_p12=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p12_4')"> <input id="tab3_p12_4" type="radio" name="tab3_p12" value="4"
                        																		<?php echo $tab3_p12=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab3_p12_5')"> <input id="tab3_p12_5" type="radio" name="tab3_p12" value="5"
                        																		<?php echo $tab3_p12=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        
        <tr>
        	<td class="text_explicativo" colspan="4" ><br><br><br>&nbsp;&nbsp; As seguintes questões pedem a você que diga o quanto você se sentiu satisfeito, feliz ou bem sobre vários aspectos de sua vida nas duas últimas semanas:<br><br>
</td>
        </tr>
        <tr>
        	<td class="td_dir"></td>
        	<td class="td_esq"> </td>
            <td class="td_dir"> 
            	<table width="100%" class="table_radio" border="0">
                    <tr>
                    	<th width="15%"> Nada </td>
                        <th width="20%"> Muito Pouco </td>
                        <th width="25%"> Mais ou Menos </td>
                        <th width="20%"> Bastatnte </td>
                        <th width="20%"> Extremamente </td>
                    </tr>
               </table></td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.1</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quão satisfeito você está com aquilo que alcançou na sua vida? </td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p1 = $ficha?$_SESSION['anexo1']['tab4_p1']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p1_1')"> <input id="tab4_p1_1" type="radio" name="tab4_p1" value="1" 
                        																		<?php echo $tab4_p1=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p1_2')"> <input id="tab4_p1_2" type="radio" name="tab4_p1" value="2"
                        																		<?php echo $tab4_p1=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p1_3')"> <input id="tab4_p1_3" type="radio" name="tab4_p1" value="3"
                        																		<?php echo $tab4_p1=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p1_4')"> <input id="tab4_p1_4" type="radio" name="tab4_p1" value="4"
                        																		<?php echo $tab4_p1=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p1_5')"> <input id="tab4_p1_5" type="radio" name="tab4_p1" value="5"
                        																		<?php echo $tab4_p1=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.2</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quão satisfeito você está com a maneira com a qual você usa o seu tempo?
 </td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p2 = $ficha?$_SESSION['anexo1']['tab4_p2']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p2_1')"> <input id="tab4_p2_1" type="radio" name="tab4_p2" value="1" 
                        																		<?php echo $tab4_p2=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p2_2')"> <input id="tab4_p2_2" type="radio" name="tab4_p2" value="2"
                        																		<?php echo $tab4_p2=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p2_3')"> <input id="tab4_p2_3" type="radio" name="tab4_p2" value="3"
                        																		<?php echo $tab4_p2=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p2_4')"> <input id="tab4_p2_4" type="radio" name="tab4_p2" value="4"
                        																		<?php echo $tab4_p2=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p2_5')"> <input id="tab4_p2_5" type="radio" name="tab4_p2" value="5"
                        																		<?php echo $tab4_p2=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.3</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quão satisfeito você está com o seu nível de atividade?
 </td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p3 = $ficha?$_SESSION['anexo1']['tab4_p3']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p3_1')"> <input id="tab4_p3_1" type="radio" name="tab4_p3" value="1" 
                        																		<?php echo $tab4_p3=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p3_2')"> <input id="tab4_p3_2" type="radio" name="tab4_p3" value="2"
                        																		<?php echo $tab4_p3=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p3_3')"> <input id="tab4_p3_3" type="radio" name="tab4_p3" value="3"
                        																		<?php echo $tab4_p3=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p3_4')"> <input id="tab4_p3_4" type="radio" name="tab4_p3" value="4"
                        																		<?php echo $tab4_p3=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p3_5')"> <input id="tab4_p3_5" type="radio" name="tab4_p3" value="5"
                        																		<?php echo $tab4_p3=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.4</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quão satisfeito você está com as oportunidades que você tem para participar de atividades da comunidade? </td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p4 = $ficha?$_SESSION['anexo1']['tab4_p4']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p4_1')"> <input id="tab4_p4_1" type="radio" name="tab4_p4" value="1" 
                        																		<?php echo $tab4_p4=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p4_2')"> <input id="tab4_p4_2" type="radio" name="tab4_p4" value="2"
                        																		<?php echo $tab4_p4=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p4_3')"> <input id="tab4_p4_3" type="radio" name="tab4_p4" value="3"
                        																		<?php echo $tab4_p4=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p4_4')"> <input id="tab4_p4_4" type="radio" name="tab4_p4" value="4"
                        																		<?php echo $tab4_p4=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p4_5')"> <input id="tab4_p4_5" type="radio" name="tab4_p4" value="5"
                        																		<?php echo $tab4_p4=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.5</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Quão feliz você está com as coisas que você pode esperar daqui para frente?
 </td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p5 = $ficha?$_SESSION['anexo1']['tab4_p5']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p5_1')"> <input id="tab4_p5_1" type="radio" name="tab4_p5" value="1" 
                        																		<?php echo $tab4_p5=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p5_2')"> <input id="tab4_p5_2" type="radio" name="tab4_p5" value="2"
                        																		<?php echo $tab4_p5=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p5_3')"> <input id="tab4_p5_3" type="radio" name="tab4_p5" value="3"
                        																		<?php echo $tab4_p5=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p5_4')"> <input id="tab4_p5_4" type="radio" name="tab4_p5" value="4"
                        																		<?php echo $tab4_p5=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p5_5')"> <input id="tab4_p5_5" type="radio" name="tab4_p5" value="5"
                        																		<?php echo $tab4_p5=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.6</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Como você avaliaria o funcionamento dos seus sentidos   (por   exemplo,   audição,   visão,   paladar, olfato, tato)?

 </td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p6 = $ficha?$_SESSION['anexo1']['tab4_p6']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p6_1')"> <input id="tab4_p6_1" type="radio" name="tab4_p6" value="1" 
                        																		<?php echo $tab4_p6=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p6_2')"> <input id="tab4_p6_2" type="radio" name="tab4_p6" value="2"
                        																		<?php echo $tab4_p6=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p6_3')"> <input id="tab4_p6_3" type="radio" name="tab4_p6" value="3"
                        																		<?php echo $tab4_p6=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p6_4')"> <input id="tab4_p6_4" type="radio" name="tab4_p6" value="4"
                        																		<?php echo $tab4_p6=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p6_5')"> <input id="tab4_p6_5" type="radio" name="tab4_p6" value="5"
                        																		<?php echo $tab4_p6=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.7</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até   que   ponto   você   tem   um sentimento  de  companheirismo  em  sua vida?
</td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p7 = $ficha?$_SESSION['anexo1']['tab4_p7']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p7_1')"> <input id="tab4_p7_1" type="radio" name="tab4_p7" value="1" 
                        																		<?php echo $tab4_p7=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p7_2')"> <input id="tab4_p7_2" type="radio" name="tab4_p7" value="2" 
                        																		<?php echo $tab4_p7=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p7_3')"> <input id="tab4_p7_3" type="radio" name="tab4_p7" value="3" 
                        																		<?php echo $tab4_p7=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p7_4')"> <input id="tab4_p7_4" type="radio" name="tab4_p7" value="4" 
                        																		<?php echo $tab4_p7=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p7_5')"> <input id="tab4_p7_5" type="radio" name="tab4_p7" value="5" 
                        																		<?php echo $tab4_p7=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.8</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto você sente amor em sua vida?
</td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p8 = $ficha?$_SESSION['anexo1']['tab4_p8']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p8_1')"> <input id="tab4_p8_1" type="radio" name="tab4_p8" value="1"  
                        																		<?php echo $tab4_p8=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p8_2')"> <input id="tab4_p8_2" type="radio" name="tab4_p8" value="2" 
                        																		<?php echo $tab4_p8=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p8_3')"> <input id="tab4_p8_3" type="radio" name="tab4_p8" value="3" 
                        																		<?php echo $tab4_p8=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p8_4')"> <input id="tab4_p8_4" type="radio" name="tab4_p8" value="4" 
                        																		<?php echo $tab4_p8=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p8_5')"> <input id="tab4_p8_5" type="radio" name="tab4_p8" value="5" 
                        																		<?php echo $tab4_p8=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
        
        <tr>
        	<td class="td_dir">4.9</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até	que	ponto	você oportunidades  para amar?</td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p9 = $ficha?$_SESSION['anexo1']['tab4_p9']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p9_1')"> <input id="tab4_p9_1" type="radio" name="tab4_p9" value="1"  
                        																		<?php echo $tab4_p9=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p9_2')"> <input id="tab4_p9_2" type="radio" name="tab4_p9" value="2" 
                        																		<?php echo $tab4_p9=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p9_3')"> <input id="tab4_p9_3" type="radio" name="tab4_p9" value="3" 
                        																		<?php echo $tab4_p9=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p9_4')"> <input id="tab4_p9_4" type="radio" name="tab4_p9" value="4" 
                        																		<?php echo $tab4_p9=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p9_5')"> <input id="tab4_p9_5" type="radio" name="tab4_p9" value="5" 
                        																		<?php echo $tab4_p9=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
       
        <tr>
        	<td class="td_dir">4.10</td>
        	<td class="td_just" style="vertical-align:bottom; padding-bottom:15px;"> Até que ponto	você oportunidades para ser amado?</td>
            <td class="td_esq"> 
                <table width="100%" class="table_radio" border="0">
                
                    <tr><?php $tab4_p10 = $ficha?$_SESSION['anexo1']['tab4_p10']:false;?>
                        <td width="15%" onClick="radioClick('tab4_p10_1')"> <input id="tab4_p10_1" type="radio" name="tab4_p10" value="1"  
                        																			<?php echo $tab4_p10=="1"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p10_2')"> <input id="tab4_p10_2" type="radio" name="tab4_p10" value="2"
                        																			<?php echo $tab4_p10=="2"?"checked":""?>/> </td>
                        <td width="25%" onClick="radioClick('tab4_p10_3')"> <input id="tab4_p10_3" type="radio" name="tab4_p10" value="3"
                        																			<?php echo $tab4_p10=="3"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p10_4')"> <input id="tab4_p10_4" type="radio" name="tab4_p10" value="4"
                        																			<?php echo $tab4_p10=="4"?"checked":""?>/> </td>
                        <td width="20%" onClick="radioClick('tab4_p10_5')"> <input id="tab4_p10_5" type="radio" name="tab4_p10" value="5"
                        																			<?php echo $tab4_p10=="5"?"checked":""?>/> </td>
                    </tr>
               </table>
        	</td>
        </tr>
               
        
        <tr>
        	<td class="td_esq"></td>
        	<td class="td_esq"> </td>
            <td class="td_dir"><br><br></td>
        </tr>
        
   
        
        <tr>
        	<td></td>
        	<td class="td_esq">Entrevistador/Coletor: </td>
            <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha?$_SESSION['anexo1']['entrevistador']:""; ?>"> </td>
            <td class="td_esq">Data: </td>
            <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha?$_SESSION['anexo1']['data']:""; ?>"> </td>
        
        </tr>
        
        <tr>
        	<td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo1" hidden> </td>
            <td></td>
        </tr>
       	
        <tr>
        	<td></td>
        	<td></td>
            <td style="padding-top:10px;">
            <?php if(!$ficha){ ?>
<input id="submit" name="submit" class="bot_submit" type="submit" value="Salvar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');" > 
			<?php }else{ ?>
<input id="submit" name="submit" class="bot_submit" type="submit" value="Atualizar" onMouseOver="MouseOver('submit');" onMouseOut="MouseOut('submit');">
			<?php }?>
</td>
        </tr>
        
        
    </table>

</form>

</div>