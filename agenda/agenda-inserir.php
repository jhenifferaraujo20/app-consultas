<?php
$data = $_POST['data'];
$hora = $_POST['hora'];
$sala = $_POST['sala'];
$id_medico = $_POST['id_medico'];
$id_paciente = $_POST['id_paciente'];


include "../includes/conexao.php";
$sqlInserir = "INSERT INTO tb_agenda(data, hora, id_medico, sala, id_paciente) VALUES ('{$data}', '{$hora}', '{$id_medico}', '{$sala}', '{$id_paciente}');";

$resultado = mysqli_query($conexao, $sqlInserir);

if($resultado){
    header('Location: agenda-listar.php?mensagem=cadastrado');
}else{
    echo "Algum erro aconteceu";
}

?>