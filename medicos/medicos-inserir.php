<?php
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$crm = $_POST['crm'];
$especialidade = $_POST['especialidade'];


include "../includes/conexao.php";
$sqlInserir = "INSERT INTO tb_medicos(nome, telefone, crm, especialidade) VALUES ('{$nome}', '{$telefone}', '{$crm}', '{$especialidade}');";

$resultado = mysqli_query($conexao, $sqlInserir);

if($resultado){
    header('Location: medicos-listar.php');
}else{
    echo "Algum erro aconteceu";
}

?>