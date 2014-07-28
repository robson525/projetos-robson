<?php
require_once('classes/class.prontuario.php');

if (isset($_SESSION['anexo6']) && $_SESSION['anexo6']) {
    $ficha = true;
        
} elseif (($_SESSION['selecionar'] || $submetido)) {
    $prontuario = new Prontuario('1_anexo6');
    $_SESSION['anexo6'] = $prontuario->buscarFichaId($_SESSION['id_ficha']);
    $ficha = $_SESSION['anexo6']?true:false;
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
<h1>Anexo 6: Avaliação Nutricional</h1>
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

            <tr><td><br><br></td></tr>
            
            <tr>
                <th colspan="5"><h3>1 - Avaliação Antropométrica.</h3></th>
            </tr>

            <tr>
                <td></td>
                <td class="td_esq"> Peso (kg):</td>               
                <td class="td_dir"><input id="tab1_p1" name="tab1_p1" type="text" maxlength="10" ></td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq"> Altura (m):</td>              
                <td class="td_dir"><input id="tab1_p2" name="tab1_p2" type="text" maxlength="10"></td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq">IMC (KG/m2):</td>             
                <td class="td_dir"><input id="tab1_p3" name="tab1_p3" type="text" maxlength="10"></td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq"> Diagnóstico Nutricional:</td> 
                <td class="td_dir"><input id="tab1_p4" name="tab1_p4" type="text" maxlength="20"></td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq"> CC (cm):</td>                 
                <td class="td_dir"><input id="tab1_p5" name="tab1_p5" type="text" maxlength="10"></td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq"> Classificação:</td>           
                <td class="td_dir"><input id="tab1_p6" name="tab1_p6" type="text" maxlength="20"></td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq"> % Gordura:</td>               
                <td class="td_dir"><input id="tab1_p7" name="tab1_p7" type="text" maxlength="10"></td>
            </tr>
             <tr>
                <td></td>
                <td class="td_esq"> Classificação:</td>           
                <td class="td_dir"><input id="tab1_p8" name="tab1_p8" type="text" maxlength="20"></td>
            </tr>
            
            
            <tr><td><br></td></tr>
            
            <tr>
                <th colspan="5"><h3>2 - Dados Clínicos.</h3></th>
            </tr>
            <tr>
                <td colspan="2" class="td_esq">História/ QP/ Diagnóstico Clínico:</td >
                <td class="td_dir"><input type="text" name="tab2_p1" maxlength="100" style="width:98%" value="" /> </td>
            </tr>
            <tr>
                <td colspan="2" class="td_esq">O que interfere na sua alimentação? (causas para o problema)</td >
                <td class="td_dir"><input type="text" name="tab2_p2" maxlength="100" style="width:98%" value="" /> </td>
            </tr>
            <tr>
                <td colspan="2" class="td_esq">Apetite/ Consumo Alimentar:</td >
                <td class="td_dir"> <select name="tab2_p3"> 
                                        <option value="1" >Abaixo do Normal</option>
                                        <option value="2" >Normal</option>
                                        <option value="3" >Acima do Normal</option>
                                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq">Porque?</td >
                <td class="td_dir"><input type="text" name="tab2_p4" maxlength="100" style="width:50%" value="" /> </td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq">Medicamentos?</td >
                <td class="td_dir"> <select name="tab2_p5">
                                        <option value=""></option>
                                        <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                    </select>
                    </span> 
                </td>
            </tr>
            <tr>
                <td></td> 
                <td class="td_esq"> 
                            Frequência de uso? <br><br>
                            Qual?
                </td >
                <td class="td_dir">
                    <input type="text" name="tab2_p6" maxlength="100" style="width:50%" value="" /> <br><br>
                    <input type="text" name="tab2_p7" maxlength="100" style="width:50%" value="" />
                </td>
            </tr>
              
            <tr>
                <th colspan="5"><h3>3 - Histórico Familiar</h3></th>
            </tr>
            
            <tr>
                <td colspan="5">
                    <table id="tab2"  border="1" align="center" cellspacing="0"  width="80%">
                        <tr>
                            <td>PATOLOGIAS</td>
                            <td width="15%">MÃE</td>
                            <td width="15%">PAI</td>
                            <td width="15%">AVÓS MARTENOS</td>
                            <td width="15%">AVÓS PARTENOS</td>
                        </tr>
                        <tr>
                            <td>1 - Hipertensão Arterial Sistêmica</td>
                            <td><INPUT id="tab3_p1_1" TYPE="checkbox" NAME="tab3_p1_1" VALUE="1"> </td>
                            <td><INPUT id="tab3_p1_2" TYPE="checkbox" NAME="tab3_p1_2" VALUE="1"> </td>
                            <td><INPUT id="tab3_p1_3" TYPE="checkbox" NAME="tab3_p1_3" VALUE="1"> </td>
                            <td><INPUT id="tab3_p1_4" TYPE="checkbox" NAME="tab3_p1_4" VALUE="1"> </td>
                        </tr>
                        <tr>
                            <td>2 - Diabetes Melliturs(1/2)</td>
                            <td><INPUT id="tab3_p2_1" TYPE="checkbox" NAME="tab3_p2_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p2_2" TYPE="checkbox" NAME="tab3_p2_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p2_3" TYPE="checkbox" NAME="tab3_p2_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p2_4" TYPE="checkbox" NAME="tab3_p2_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>3 - Infarto Agudo do Miocárdio</td>
                            <td><INPUT id="tab3_p3_1" TYPE="checkbox" NAME="tab3_p3_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p3_2" TYPE="checkbox" NAME="tab3_p3_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p3_3" TYPE="checkbox" NAME="tab3_p3_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p3_4" TYPE="checkbox" NAME="tab3_p3_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>4 - AVC</td>
                            <td><INPUT id="tab3_p4_1" TYPE="checkbox" NAME="tab3_p4_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p4_2" TYPE="checkbox" NAME="tab3_p4_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p4_3" TYPE="checkbox" NAME="tab3_p4_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p4_4" TYPE="checkbox" NAME="tab3_p4_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>5 - Trombose</td>
                            <td><INPUT id="tab3_p5_1" TYPE="checkbox" NAME="tab3_p5_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p5_2" TYPE="checkbox" NAME="tab3_p5_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p5_3" TYPE="checkbox" NAME="tab3_p5_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p5_4" TYPE="checkbox" NAME="tab3_p5_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>6 - Dislipidemias</td>
                            <td><INPUT id="tab3_p6_1" TYPE="checkbox" NAME="tab3_p6_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p6_2" TYPE="checkbox" NAME="tab3_p6_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p6_3" TYPE="checkbox" NAME="tab3_p6_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p6_4" TYPE="checkbox" NAME="tab3_p6_4" VALUE="1"></td>

                        </tr>
                        <tr>
                            <td>7 - Dislipidemias</td>
                            <td><INPUT id="tab3_p7_1" TYPE="checkbox" NAME="tab3_p7_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p7_2" TYPE="checkbox" NAME="tab3_p7_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p7_2" TYPE="checkbox" NAME="tab3_p7_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p7_4" TYPE="checkbox" NAME="tab3_p7_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>8 - Intolerância ou Alergia Alimentar</td>
                            <td><INPUT id="tab3_p8_1" TYPE="checkbox" NAME="tab3_p8_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p8_2" TYPE="checkbox" NAME="tab3_p8_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p8_3" TYPE="checkbox" NAME="tab3_p8_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p8_4" TYPE="checkbox" NAME="tab3_p8_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>9 - Câncer</td>
                            <td><INPUT id="tab3_p9_1" TYPE="checkbox" NAME="tab3_p9_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p9_2" TYPE="checkbox" NAME="tab3_p9_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p9_3" TYPE="checkbox" NAME="tab3_p9_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p9_4" TYPE="checkbox" NAME="tab3_p9_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>10 - Obesidade</td>
                            <td><INPUT id="tab3_p10_1" TYPE="checkbox" NAME="tab3_p10_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p10_2" TYPE="checkbox" NAME="tab3_p10_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p10_3" TYPE="checkbox" NAME="tab3_p10_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p10_4" TYPE="checkbox" NAME="tab3_p10_4" VALUE="1"></td>
                        </tr>
                        <tr>
                            <td>11 - Outras</td>
                            <td><INPUT id="tab3_p11_1" TYPE="checkbox" NAME="tab3_p11_1" VALUE="1"></td>
                            <td><INPUT id="tab3_p11_2" TYPE="checkbox" NAME="tab3_p11_2" VALUE="1"></td>
                            <td><INPUT id="tab3_p11_3" TYPE="checkbox" NAME="tab3_p11_3" VALUE="1"></td>
                            <td><INPUT id="tab3_p11_4" TYPE="checkbox" NAME="tab3_p11_4" VALUE="1"></td>         
                        </tr>
                   </table>
                </td>
            </tr>
            
            <tr>
                <th colspan="5"><h3>3 - Revisão de Sistemas.</h3></th>
            </tr> 
              
            <tr>
                <td></td>
                <td style="font-size:17px; font-weight: bold">Sistema Digestório</td>
            </tr>
            
            <tr>
                <td></td>
                <td class="td_esq">Boca:</td>
                <td class="td_dir">
                    <select id="tab4_p1" name="tab4_p1">
                        <option value=""></option>
                        <option value="1">Afta</option>
                        <option value="2">Sangramento</option>
                        <option value="3">Protese</option>
                        <option value="4">Mestigação</option>
                        <option value="5">Nada</option>
                        <option value="6">Outros</option>
                    </select>
        	</td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq">Outros:</td >
                <td class="td_dir"><input type="text" name="tab4_p1_o" maxlength="100" style="width:98%" value="" /> </td>
            </tr>
            
            <tr>
                <td></td>
                <td class="td_esq">Esôfago:</td>
                <td class="td_dir">
                    <select id="tab4_p2" name="tab4_p1">
                        <option value=""></option>
                        <option value="1">Pirose</option>
                        <option value="2">Sangramento</option>
                        <option value="3">Protese</option>
                        <option value="4">Mestigação</option>
                        <option value="5">Nada</option>
                        <option value="6">Outros</option>
                    </select>
        	</td>
            </tr>
            <tr>
                <td></td>
                <td class="td_esq">Outros:</td >
                <td class="td_dir"><input type="text" name="tab4_p3" maxlength="100" style="width:98%" value="" /> </td>
            </tr>
          
              
              
              
             
            <tr><td><br><br><br></td></tr>
            <tr>
                <td></td>
                <td class="td_esq">Entrevistador/Coletor: </td>
                <td class="td_dir"> <input id="entrevistador" name="entrevistador" type="text" maxlength="100" style="width:98%" value="<?php echo $ficha ? $_SESSION['anexo6']['entrevistador'] : ""; ?>"> </td>
                <td class="td_esq">Data: </td>
                <td class="td_dir"> <input id="data" name="data" type="text" maxlength="10" value="<?php echo $ficha ? $_SESSION['anexo6']['data'] : ""; ?>"> </td>
            </tr>
            <tr>
                <td><input id="formulario_tipo" name="formulario_tipo" type="text" value="Anexo6" hidden> </td>
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


<?php die();?>

      
    
  
                 
          
        
     
        <!--  <td>5 - Exames Laboratoriais:
          
                <select id="tab1_p5" name="tab1_p5">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>&ensp;&ensp;
        	<span id="tab1_p5.1">Local: <input id="tab1_p5.1" name="tab1_p5.1" type="text" maxlength="20"> </span> </td>
       </tr>
       
       <tr>
          <td>6 - Hábitos Alimentares e Sociais:
        	<span id="tab1_p6">&ensp;Reação:<input id="tab1_p6" name="tab1_p6" type="text" maxlength="20"> </span>
            &ensp;&ensp;
        	<span id="tab1_p6.1">Tempo:<input id="tab1_p6.1" name="tab1_p6.1" type="text" maxlength="20"> </span>
            &ensp;&ensp;
        	<span id="tab1_p6.2">Remédio:<select id="tab1_p6.2" name="tab1_p6.2">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>&ensp;&ensp; </td> </td> </td>
       </tr>
       
       <tr>
          <td>7 - Consumo de alimentos regionais:
                <select id="tab1_p7" name="tab1_p7">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select> &ensp;&ensp;
                <span>Quantos dias na semana:</span>
                <select id="tab1_p7.1" name="tab1_p7.1">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                </select>
       </tr>
       
       <tr>
          <td>8 - Frequência do consumo de alimentos regionais
                <select id="tab1_p8" name="tab1_p8">
                <option value=""></option>
                <option value="sabao">Sabão</option>
                <option value="sabonete">Sabonete</option>
                <option value="outros produtos">Outros Produtos</option>
                </select>
                
                
       </tr>
       
       <tr>
          <td>9 - DIAGNÓSTICO/IMPRESSÃO NUTRICIONAL:?
                <select id="tab1_p9" name="tab1_p9">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>&ensp;&ensp;
                <select id="tab1_p9.1" name="tab1_p9.1">
                <option value=""></option>
                <option value="Shapoo">Shapoo</option>
                <option value="Condicionador">Condicionador</option>
                <option value="Sabão">Sabão</option>
                <option value="Sabonete">Sabonete</option>
                <option value="Outros Produtos">Outros Produtos</option>                
                </select>
       </tr>
       
       
            
   </table>            
     
          
   <center>
   <h1>Dados Complementares:</h1>
   </center>
<table id="tab2" border="1" align="center" cellspacing="0" >
     
        <tr>
          <td>1 -  Você morra na área urbana ou rural?</td>
          <td>
                <select id="tab2_p1" name="tab2_p1">
                <option value=""></option>
                <option value="Urbana">Urbana</option>
                <option value="Rural">Rural</option>
                </select>
       </tr>
       
       <tr>
          <td>2 - Como é sua casa?</td>
          <td>
                <select id="tab2_p2" name="tab2_p2">
                <option value=""></option>
                <option value="Alvenaria">Alvenaria</option>
                <option value="Edifício">Edifícios</option>
                <option value="Madeira">Madeira</option>
                <option value="Palafita">Palafita</option>                
                <option value="Casa de pau a pique">Casa de pau a pique</option>
                <option value="Barraca de Lona">Barraca de Lona</option>
                
                
                </select>
       </tr>
       
        <tr>
          <td>3 - Qual é sua profissal?</td>
          <td>             
              <input id="tab2_p3" name="tab2_p3" type="text" maxlength="20"> </span>
       </tr>   
           
  </table>   
     
     
     
     
   <center>
   <h1>Após o exame físico:</h1> 
   </center>
      
   <table id="tab3" border="1" align="center" cellspacing="0"   
       <tr>
       <td >1 - Encontrou mancha no corpo? </td>
            <td >
                <select id="tab3_p1" name="tab3_p1">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>
       </tr>
       
       <td >2 - Qual a Cor? </td>
            <td >
                 <input id="tab3_p2" name="tab3_p2" type="text" maxlength="20"> </span> </td>
       </tr>  
       
       <td >3 - Qual o Aspecto? </td>
            <td  >
                 <input id="tab3_p3" name="tab3_p3" type="text" maxlength="20"> </span> </td>
       </tr>
       
       <td >4 - Qual o Diametro? </td>
            <td >
               <input id="tab3_p4" name="tab3_p4" type="text" maxlength="20"> </span> </td>
       </tr>
       
       <td>5 - Descamação? </td>
            <td >
                <select id="tab3_p5" name="tab3_p5">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>
       </tr>
       
       <td>6 - Coça? </td>
            <td >
                <select id="tab3_p6" name="tab3_p6">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>
       </tr>
       
       <td>7 - Nas unhas apresenta fungos? </td>
            <td >
                <select id="tab3_p7" name="tab3_p7">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>
       </tr>
       
       <td>8 - Na cabeça encontrou fungos? </td>
            <td >
                <select id="tab3_p8" name="tab3_p8">
                <option value=""></option>
                <option value="Sim">Sim</option>
                <option value="não">Não</option>
                </select>
       </tr>
     
            
   <table>  
                      <br/ >
   
                     <input id="submit" name="submit" type="submit" value="Salvar"  </td>    
                     --> 
     
</form>


</div>
