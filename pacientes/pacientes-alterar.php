<?php
include "../includes/conexao.php";

$id_paciente = $_POST['id_paciente'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_nascimento = $_POST['data_nascimento'];
$convenio = $_POST['convenio'];
$diagnostico = $_POST['diagnostico'];

$sqlAlterar = "UPDATE tb_pacientes SET 
                nome = '{$nome}' , 
                telefone = '{$telefone}' , 
                data_nascimento = '{$data_nascimento}' , 
                convenio = '{$convenio}' ,
                diagnostico = '{$diagnostico}'
                WHERE id = {$id_paciente}";

$resultado = mysqli_query($conexao , $sqlAlterar);

if($resultado){
    header('Location: pacientes-listar.php');
}else{
    echo "Ocorreu algum erro";
}

?>