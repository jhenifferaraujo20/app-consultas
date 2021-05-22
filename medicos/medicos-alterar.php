<?php
include "../includes/conexao.php";

$id_medico = $_POST['id_medico'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$crm = $_POST['crm'];
$especialidade = $_POST['especialidade'];

$sqlAlterar = "UPDATE tb_medicos SET 
                nome = '{$nome}' , 
                telefone = '{$telefone}' , 
                crm = '{$crm}' , 
                especialidade = '{$especialidade}' 
                WHERE id = {$id_medico}";

$resultado = mysqli_query($conexao , $sqlAlterar);

if($resultado){
    header('Location: medicos-listar.php');
}else{
    echo "Ocorreu algum erro";
}

?>