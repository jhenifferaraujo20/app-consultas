<?php include "../includes/cabecalho.php"; ?>

<?php if(isset($_GET['mensagem'])){
    if($_GET['mensagem'] == 'cadastrado'){ ?>
        <div class="alert alert-success">
            Cadastrado com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'excluido'){ ?>
        <div class="alert alert-danger">
            Excluído com sucesso!
        </div>
    <?php
    }
    if($_GET['mensagem'] == 'alterado'){ ?>
        <div class="alert alert-warning">
            Alterado com sucesso!
        </div>
    <?php
    }
}
    ?>

<p>
    <a href="medicos-formulario-inserir.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Novo médico</a>
</p>

<?php
include "../includes/conexao.php";

$sqlBusca = "SELECT * FROM tb_medicos;";
$listaDeMedicos = mysqli_query($conexao , $sqlBusca);
?>

<div class="table-responsive">
    <table class="table table-hover table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($medico = mysqli_fetch_assoc($listaDeMedicos)){
                echo "<tr>";
                echo "<td>{$medico['id']}</td>";
                echo "<td>{$medico['nome']}</td>";
                echo "<td>{$medico['telefone']}</td>";
                echo "<td>{$medico['crm']}</td>"; 
                echo "<td>{$medico['especialidade']}</td>";
                echo "<td><a href='medicos-formulario-alterar.php?id_medico={$medico['id']}' class='btn btn-warning'><i class='bi bi-pencil'></i></a> ";
                echo "<a href='medicos-excluir.php?id_medico={$medico['id']}' class='btn btn-danger'><i class='bi bi-x-lg'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../includes/rodape.php"; ?>