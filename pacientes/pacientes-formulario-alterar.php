<?php 
include "../includes/cabecalho.php" ; 

$id_paciente = $_GET['id_paciente'];

include "../includes/conexao.php";
$sqlBuscar = "SELECT * FROM tb_pacientes WHERE id={$id_paciente};";

$listaDePacientes = mysqli_query($conexao , $sqlBuscar);

$nome = $telefone = $data_nascimento = $convenio = $diagnostico = "";

while($paciente = mysqli_fetch_assoc($listaDePacientes)){
    $nome = $paciente['nome'];
    $telefone = $paciente['telefone'];
    $data_nascimento = $paciente['data_nascimento'];
    $convenio = $paciente['convenio'];
    $diagnostico = $paciente['diagnostico'];
}
?>

<h2 class="text-center mb-5">Alterar</h2>
<form name="formulario-alterar-pacientes" method="post" action="pacientes-alterar.php">
<input name="id_paciente" type="hidden" value="<?php echo $id_paciente;?>">
    <div class="row justify-content-center">
        <p class="col-md-5">
            <label class="form-label">Nome</label><br>
            <input name="nome" class="form-control" value="<?php echo $nome?>" maxlength="100" required>
        </p>
        <p class="col-md-3">
            <label class="form-label">Telefone</label><br>
            <input name="telefone" class="form-control" value="<?php echo $telefone ?>" maxlength="20" required>
        </p>
        <p class="col-md-2">
            <label class="form-label">Data de nascimento</label><br>
            <input type="date" name="data_nascimento" class="form-control" value="<?php echo $data_nascimento ?>" required>
        </p>
    </div>
    <div class="row justify-content-center">
        <p class="col-md-10">
            <label class="form-label">Diagnóstico</label><br>
            <textarea name="diagnostico" class="form-control" value="<?php echo $diagnostico ?>" required></textarea>
        </p>
    </div>
    <div class="row justify-content-center">
        <p class="col-md-10">
            <label class="form-label">Convênio</label><br>
            <input type="radio" name="convenio" value="sim" class="form-check-input" <?php if($convenio == 'sim'){ echo "checked "; } ?>>
            <label class="form-check-label me-2">Sim</label>
            <input type="radio" name="convenio" value="não" class="form-check-input" <?php if($convenio == 'não'){ echo "checked "; } ?>>
            <label class="form-check-label">Não</label>
        </p>
    </div>
    <div class="row justify-content-end">
        <p class="col-md-2">
            <button type="subtmit" class="btn btn-success">Salvar</button>
        </p>
    </div>
</form>

<?php include "../includes/rodape.php" ; ?>