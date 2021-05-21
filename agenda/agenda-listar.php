<?php include "../includes/cabecalho.php"; ?>

<p>
    <a href="agenda-formulario-inserir.php" class="btn btn-success">Agendar consulta</a>
</p>

<?php 
include "../includes/conexao.php";
$sqlBusca = "SELECT
            tb_agenda.id,
            tb_agenda.data,
            tb_agenda.hora,
            tb_medicos.nome as 'nome_medico',
            tb_agenda.sala,
            tb_pacientes.nome as 'nome_paciente'
            FROM tb_agenda
            INNER JOIN tb_pacientes ON tb_agenda.id_paciente = tb_pacientes.id
            INNER JOIN tb_medicos ON tb_agenda.id_medico = tb_medicos.id;";

$listaDeAgenda = mysqli_query($conexao , $sqlBusca);
?>

<div class="table-responsive">
    <table class="table table-hover table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Médico</th>
                <th>Sala</th>
                <th>Paciente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($agenda = mysqli_fetch_assoc($listaDeAgenda)){
                echo "<tr>";
                echo "<td>{$agenda['id']}</td>";
                $dataBrasil = date('d/m/Y', strtotime($agenda['data']));
                echo "<td>{$dataBrasil}</td>";
                echo "<td>{$agenda['hora']}</td>"; 
                echo "<td>{$agenda['nome_medico']}</td>";
                echo "<td>{$agenda['sala']}</td>";
                echo "<td>{$agenda['nome_paciente']}</td>";
                echo "<td><a href='agenda-formulario-alterar.php?id_agenda={$agenda['id']}' class='btn btn-success'>Alterar</a> ";
                echo "<a href='agenda-excluir.php?id_agenda={$agenda['id']}' class='btn btn-danger'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../includes/rodape.php"; ?>