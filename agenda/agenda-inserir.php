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
    echo "Consulta agendada com sucesso!<br>";
    echo "<a href='agenda-listar.php'>voltar</a>";
}else{
    echo "Algum erro aconteceu";
}

?>