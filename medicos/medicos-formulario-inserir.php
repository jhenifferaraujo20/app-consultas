<?php include "../includes/cabecalho.php" ; ?>

<h2 class="text-center mb-5">Cadastrar novo médico</h2>
<form name="formulario-inserir-medicos" method="post" action="medicos-inserir.php">
    <div class="row justify-content-center">
        <p class="col-md-6">
            <label class="form-label">Nome</label><br>
            <input name="nome" class="form-control" required>
        </p>
        <p class="col-md-4">
            <label class="form-label">Telefone</label><br>
            <input name="telefone" class="form-control" required>
        </p>
    </div>
    <div class="row justify-content-center">
        <p class="col-md-6">
            <label class="form-label">Especialidade</label><br>
            <select name="especialidade" class="form-select" required>
                <option value="Cardiologista">Cardiologista</option>
                <option value="Nutricionista">Nutricionista</option>
                <option value="Ortopedista">Ortopedista</option>
            </select>
        </p>
        <p class="col-md-4">
            <label class="form-label">CRM</label><br>
            <input name="crm" class="form-control" required>
        </p>
    </div>
    <div class="row justify-content-end">
        <p class="col-md-2">
            <button type="subtmit" class="btn btn-success">Salvar</button>
        </p>
    </div>
    
</form>

<?php include "../includes/rodape.php" ; ?>