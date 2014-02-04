<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/formularios.css" rel="stylesheet" type="text/css"/>
<title>Documento sem título</title>
</head>
<center>
<h1>Anexo 4: Avaliação Nutricional</h1>
</center>
<body>

<div id="div_anexos">



<form id="anexo6">
	   
 <table id="tab1" border="1"  cellspacing="0" width="100%" >  
 
 
        <tr>
        	<td><h2>1 - Avaliação Antropométrica:</h2>             
                        
                 <span > Peso (kg):</span>               <input id="tab1_p1" name="tab1_p1" type="text" maxlength="10" >&ensp;&ensp; 
        	     <span > Altura (m):</span>              <input id="tab1_p2" name="tab1_p2" type="text" maxlength="10">&ensp;&ensp;
                 <span > IMC (KG/m2):</span>             <input id="tab1_p3" name="tab1_p3" type="text" maxlength="10">&ensp;&ensp;<br/ ><br/ >
                 
                 <span > Diagnóstico Nutricional:</span> <input id="tab1_p4" name="tab1_p4" type="text" maxlength="20">&ensp;&ensp;
                 <span > CC (cm):</span>                 <input id="tab1_p5" name="tab1_p5" type="text" maxlength="10">&ensp;&ensp;
                 <span > Classificação:</span>           <input id="tab1_p6" name="tab1_p6" type="text" maxlength="20">&ensp;&ensp;<br/ ><br/ >
                 
                 
                 <span > % Gordura:</span>               <input id="tab1_p7" name="tab1_p7" type="text" maxlength="10">&ensp;&ensp;
                 <span > Classificação:</span>           <input id="tab1_p8" name="tab1_p8" type="text" maxlength="20"> &ensp;&ensp;                
                  <br/ >&ensp;                
            </td>
       </tr>
       
       <tr>
          <td><h2>2 - Dados Clínicos:</h2>
          
               <span >História/ QP/ Diagnóstico Clínico:</span ><br/ >
               <span >O que interfere na sua alimentação? (causas para o problema)</span > <br/ >
              <TEXTAREA  id="tab1_p2.01" NAME="tab1_p2.01" ROWS=5 COLS=60> </TEXTAREA><br/ >
              
              
              
              <span >Quando decide emagrecer, que atitude toma?(O que deixa de comer?) </span > <br/ >              
              <TEXTAREA  id="tab1_p2.02" NAME="tab1_p2.02" ROWS=5 COLS=60> </TEXTAREA><br/ >
              
              
              
              <span>Mudanças na consistência da alimentação:</span> <select id="tab1_p2.03" name="tab1_p2.03">
                                                         <option value=""></option>
                                                         <option value="Sim">Sim</option>
                                                         <option value="Não">Não</option>
                                                          </select><br/ >
              
              
              
                <span>Apetite/ Consumo Alimentar:</span> <select id="tab1_p2.04" name="tab1_p2.04">
                                                         <option value=""></option>
                                                         <option value="Abaixo do Normal">Abaixo do Normal</option>
                                                         <option value="Normal ">Normal</option>
                                                         <option value="Acima do Normal ">Acima do Normal </option>                                                         </select><br/ >
                                                         
                                           <span >Porque?</span > <br/ >
              <TEXTAREA  id="tab1_p2.05" NAME="tab1_p2.05" ROWS=5 COLS=60> </TEXTAREA><br/ >   
              
              
              <span>Medicamentos:</span> <select id="tab1_p2.06" name="tab1_p2.06">
                                                         <option value=""></option>
                                                         <option value="Sim">Sim</option>
                                                         <option value="Não">Não</option>
                                                         </select>&ensp;&ensp;
                                                         
                    <span >Qual?</span> <input id="tab1_p2.07" name="tab1_p2.07" type="text" maxlength="20"> &ensp;&ensp; 
                    <span >Frequência de uso:</span>           <input id="tab1_p2.08" name="tab1_p2.08" type="text" maxlength="20">            
                   <br/ >&ensp; 
                                        
         </td>
       </tr>
       
       <tr>
          <td><h2>2.1 - Histórico Familiar:</h2>
                    
 <table id="tab2"  border="1" align="center" cellspacing="0"  width="80%">
     <tr>
         <td>PATOLOGIAS</td>
         <td>MÃE</td>
         <td>PAI</td>
         <td>AVÓS MARTENOS</td>
         <td>AVÓS PARTENOS</td>
     </tr>
     <tr>
         <td>1 - Hipertensão Arterial Sistêmica</td>
         <td><INPUT id="tab2_p1.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"> </td>
         <td><INPUT id="tab2_p1.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"> </td>
         <td><INPUT id="tab2_p1.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"> </td>
         <td><INPUT id="tab2_p1.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"> </td>
     </tr>
     <tr>
         <td>2 - Diabetes Melliturs(1/2)</td>
         <td><INPUT id="tab2_p2.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p2.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p2.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p2.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>3 - Infarto Agudo do Miocárdio</td>
         <td><INPUT id="tab2_p3.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p3.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p3.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p3.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>4 - AVC</td>
         <td><INPUT id="tab2_p4.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p4.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p4.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p4.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         
         
     </tr>
     <tr>
         <td>5 - Trombose</td>
         <td><INPUT id="tab2_p5.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p5.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p5.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p5.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>6 - Dislipidemias</td>
         <td><INPUT id="tab2_p6.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p6.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p6.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p6.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         
     </tr>
     <tr>
         <td>7 - Dislipidemias</td>
         <td><INPUT id="tab2_p7.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p7.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p7.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p7.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>8 - Intolerância ou Alergia Alimentar</td>
         <td><INPUT id="tab2_p8.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p8.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p8.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p8.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>9 - Câncer</td>
         <td><INPUT id="tab2_p9.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p9.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p9.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p9.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>10 - Obesidade</td>
         <td><INPUT id="tab2_p10.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p10.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p10.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p10.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
     </tr>
     <tr>
         <td>11 - Outras</td>
         <td><INPUT id="tab2_p11.1" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p11.2" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p11.3" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>
         <td><INPUT id="tab2_p11.4" TYPE="checkbox" NAME="OPCAO" VALUE="Sim"></td>         
     </tr>
     
</table>



</td>
       <br/ >&ensp;&ensp;   
         
   </td> 
</tr>
  
  <tr>
      <td>
         <h2>3 - Revisão de Sistemas:</h2>
      </td>
  </tr>                
          
        
     
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

</body>
</html>