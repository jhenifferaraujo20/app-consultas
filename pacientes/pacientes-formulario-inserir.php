<?php include "../includes/cabecalho.php" ; ?>

<h2 class="text-center mb-5">Cadastrar novo paciente</h2>
<form name="formulario-inserir-pacientes" method="post" action="pacientes-inserir.php">
    <div class="row justify-content-center">
        <p class="col-md-5">
            <label class="form-label">Nome</label><br>
            <input name="nome" class="form-control" maxlength="100" required>
        </p>
        <p class="col-md-3">
            <label class="form-label">Telefone</label><br>
            <input name="telefone" class="form-control" maxlength="20" required>
        </p>
        <p class="col-md-2">
            <label class="form-label">Data de nascimento</label><br>
            <input type="date" name="data_nascimento" class="form-control" required>
        </p>
    </div>
    <div class="row justify-content-center">
        <p class="col-md-10">
            <label class="form-label">Diagnóstico</label><br>
            <textarea name="diagnostico" class="form-control" required></textarea>
        </p>
    </div>
    <div class="row justify-content-center">
        <p class="col-md-10">
            <label class="form-label">Convênio</label><br>
            <input type="radio" name="convenio" value="sim" class="form-check-input">
            <label class="form-check-label me-2">Sim</label>
            <input type="radio" name="convenio" value="não" class="form-check-input">
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