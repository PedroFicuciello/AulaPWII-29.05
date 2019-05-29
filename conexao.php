<?php
$servername = "localhost";
$database = "conexao";
$username = "root";
$password = "";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//Criando a conexão com o banco
try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
  echo "Conexão bem-sucedida";

} catch (PDOException $error) {
  echo 'Erro de Conexão: ' . $error->getMessage();
}

//Variaveis que contem os dados do formulário
$Name = "Frajola";
$cpf = "2223334455";
$email = "thom.e@jerry.com";

//comando usado para preparar a inserção dos dados recuperados do formulário no banco de dados
$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO usuario (nome, lastname, email) VALUES (:name, :cpf, :email)");
$my_Insert_Statement->bindParam(:name, $Name);
$my_Insert_Statement->bindParam(:cpf, $cpf);
$my_Insert_Statement->bindParam(:email, $email);
//aviso da inserção caso bem sucedida ou não
if ($my_Insert_Statement->execute()) {
  echo "Dados inseridos com sucesso";
} else {
  echo "Erro na inserção dos dados";
}
//executando a inserção
$Name = "Frajola";
$cpf = "2223334455";
$email = "thom.e@jerry.com";

$my_Insert_Statement->execute();
// Execute again now that the variables have changed
if ($my_Insert_Statement->execute()) {
  echo "Dados inseridos com sucesso";
} else {
}
  echo "Erro na inserção dos dados";