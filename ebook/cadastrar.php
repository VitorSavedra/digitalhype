<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
 
<body>
<?php 

//COLETANDO IP
$ip = $_SERVER['REMOTE_ADDR'];
echo $ip;
    
//COLETANDO DATA E HORA
$timestamp = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
$datahora = gmdate("d/m/Y H:i:s", $timestamp);
//PREENCHA OS DADOS DE CONEXÃO A SEGUIR:
 
$host= '';
$bd= '';
$senhabd= '';
 
$userbd = $bd; 
 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome	= $_POST ["nome"];	//atribuição do campo "nome" vindo do formulário para variavel	
$email	= $_POST ["email"];	//atribuição do campo "email" vindo do formulário para variavel
 
//conectando com o localhost - mysql
$conexao = mysql_connect($host,$bd, $senhabd);
if (!$conexao)
	die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db($bd,$conexao);
if (!$banco)
	die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
$query = "INSERT INTO `tbleads` ( `nome` , `email` , `ip` , `datahora`) 
VALUES ('$nome', '$email', '$ip', '$datahora')";
 
mysql_query($query,$conexao);
echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";

//REDIRECIONAMENTO
    $redirect = "http://webteste.profissional.ws/www/lp/obrigado.html";
    header("location:$redirect");
    
?> 
</body>
</html>