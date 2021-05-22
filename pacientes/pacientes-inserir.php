<?php
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];
$convenio = $_POST['convenio'];
$diagnostico = $_POST['diagnostico'];


include "../includes/conexao.php";
$sqlInserir = "INSERT INTO tb_pacientes(nome, telefone, data_nascimento, convenio, diagnostico) VALUES ('{$nome}', '{$telefone}', '{$data_nascimento}', '{$convenio}', '{$diagnostico}');";

$resultado = mysqli_query($conexao, $sqlInserir);

if($resultado){
    header('Location: pacientes-listar.php');
}else{
    echo "Algum erro aconteceu";
}

?>