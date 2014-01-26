<?php
//ob_start();
# Aqui incluímos a classe html2pdf.
include_once('../class/conecta.php');
include('html2pdf/html2pdf.class.php');

$ordem = $_GET['ordem'];
$orgao = $_GET['orgao'];
$profs = $_GET['profs'];
$conex = new Conecta();
$ordem = "";
$filtro = "";
$cont = 1;

// Ordenação
if (!empty($_GET["ordem"])){
	$ordem = $_GET["ordem"].", ";
	
}

if (!empty($_GET["orgao"]) && !empty($_GET["profs"])){
	$orgao = $_GET["orgao"];
	$profs = $_GET["profs"];
	$filtro = "WHERE orgao = '$orgao' AND profissao = '$profs'";
}
else {
	//Filtrar Orgão
	if (!empty($_GET["orgao"])){
		$orgao = $_GET["orgao"];
		$filtro = "WHERE orgao = '$orgao'";
	}
	
	//Filtrar Profissão
	else if (!empty($_GET["profs"])){
		$profs = $_GET["profs"];
		$filtro = "WHERE profissao = '$profs'";
	}
}
	
	$sql = "SELECT * FROM 1_formulario $filtro ORDER BY $ordem nome";

	$query = mysql_query($sql);
	
	$result = "";
	
	
	while($l = mysql_fetch_array($query)) {
		$nome 		= $l["nome"];
		$cpf		= $l["cpf"];
		$email		= $l["email"];
		$telefone	= $l["telefone"];
		$nascimento	= implode("/", array_reverse(explode("-", $l["nascimento"])));
		$endereco	= $l["endereco"];
		$complemento= $l["complemento"];
		$cidade		= $l["cidade"];
		$profissao	= $l["profissao"];
		$outra		= $l["outra_profissao"];
		$orgao		= $l["orgao"];
		$escola		= $l["escola"];
		
		$result .= "
		<tr>
			<td >$cont</td>
			<td>$nome</td>
			<td>$cpf</td>
			<td>$email</td>
			<td>$telefone</td>
			<td>$nascimento</td>
			<td>$endereco<br>$complemento<br>$cidade</td>
			<td>$orgao</td>
			<td>$profissao</td>
			<td>$escola</td>
		</tr>\n";
		
		$cont++;
	}
	
	$conex->desconecta();

$html = "

<link rel='stylesheet' type='text/css' href='salvarPDF.css' />

<table id='cabecalho' border='0' align='center'>
	<tr>
		<td>Resultado das Inscrições</td>
	</tr>
</table>

<br>

<table id='tabelaPDF' border='1' align='center' width='98%'>
    <tr>
  	<th scope='col'>&nbsp;</th>
    <th scope='col'>Nome</th>
    <th scope='col'>CPF</th>
    <th scope='col'>Email</th>
    <th scope='col'>Telefone</th>
    <th scope='col'>Nascimento</th>
    <th scope='col'>Endereço</th>
    <th scope='col'>Orgão</th>
    <th scope='col'>Profissão</th>
    <th scope='col'>Escola</th>
  </tr>
    
</table>
	
 " ;
 

//$html = ob_get_contents();
# Converte o HTML para PDF.
try
{
	// Formato do PDF: Retrato, A4, Portugues, HTML Unicode, Codoficação, Margens
    $html2pdf = new HTML2PDF('L', 'A4', 'pt', true, 'UTF-8', 2); // 
     
    # Passamos o html que se quer converter.
    $html2pdf->writeHTML($html); 
     
    // Exibe o PDF:
    $html2pdf->Output('Resultado.pdf', 'I');
}
catch(HTML2PDF_exception $e) 
{ 
	echo $e; 
}



?>