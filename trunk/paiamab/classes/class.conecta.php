<?php
class Conecta{
	
// 	Informações para conexão
/*	var $host = 'mysql111.prv.f1.k8.com.br';
	var $usuario = 'lionsdla6';
	var $senha = 'Psherman42WallabyWaySydney';
	var $banco = 'lionsdla6';
	var $conn = '';*/
	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $banco = 'araruna_paiamab';
	var $conn = '';

	// Realizando conexão e selecionando o banco de dados
	function __construct(){
		$conn = mysql_connect($this->host, $this->usuario, $this->senha) or die(mysql_error());
		$db = mysql_select_db($this->banco, $conn) or die(mysql_error());
		
		if (mysqli_connect_errno()){
  			echo "Falha ao conectar no MySQL: " . mysqli_connect_error();
  		}
		
		$this->conn = $conn;

	// Definindo o charset como utf8 para evitar problemas com acentuação
		$charset = mysql_set_charset('utf8');
		
	}
	
	function desconecta(){
		mysql_close($this->conn);
		
	}
	
	function testa_backup(){
		$query = mysql_query("SELECT * FROM 1_backup ORDER BY id DESC LIMIT 1"); // pega o ultimo ID
		if (mysql_num_rows($query) < 1)
			mysql_query("INSERT INTO 1_backup (contador) VALUES (1);");
		else{
			$backup = mysql_fetch_object($query);
			$data = date("Y-m-d H:i:s");
			if($backup->contador < 10){
				mysql_query("UPDATE 1_backup SET contador = ".$backup->contador." + 1, data = '". $data."' WHERE id =".$backup->id) or die(mysql_error()." " .$data);
			}
			else{
				$arquivo = $this->backup_db();
				mysql_query("UPDATE 1_backup SET arquivo = '".$arquivo."', data = '". $data."' WHERE id =".$backup->id);
				mysql_query("INSERT INTO 1_backup (contador) VALUES (0);");
			}
		}
	}
	
	function backup_db(){
		/* Store All Table name in an Array */
		$allTables = array();
		$allTables[0] = "1_form_usuario";
		$allTables[1] = "1_ficha";
		$allTables[2] = "1_backup";
		
		$return ="";
		
		foreach($allTables as $table){ echo $table."<br>";
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return .= 'DROP TABLE IF EXISTS '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) {
				while($row = mysql_fetch_row($result)){
				   $return.= 'INSERT INTO '.$table.' VALUES(';
					 for($j=0; $j<$num_fields; $j++){
					   $row[$j] = addslashes($row[$j]);
					   $row[$j] = str_replace("\n","\\n",$row[$j]);
					   if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } 
					   else { $return.= '""'; }
					   if ($j<($num_fields-1)) { $return.= ','; }
					 }
				   $return.= ");\n";
				}
			}
			$return.="\n\n";
			echo $return."<br><br>";
		}
		
		// Create Backup Folder
		$folder = '_db_backup_/';
		if (!is_dir($folder))
		mkdir($folder, 0777, true);
		chmod($folder, 0777);
		
		$date = date('Y-m-d-H-i-s', time()); 
		$filename = $folder."db-backup-".$date; 
		
		$handle = fopen($filename.'.sql','w+');
		fwrite($handle,$return);
		fclose($handle);
		
		return "db-backup-".$date.".sql";
	}
		
}

?>
