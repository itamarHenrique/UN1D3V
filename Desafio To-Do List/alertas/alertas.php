<?php if(!validarEntrada($titulo)): ?>
<div class="alert alert-warning">
    <strong>Ops!!!</strong>
    O campo titulo não pode ficar vazio.
</div>
<?php endif; ?>

<?php if(!validarEntrada($titulo)): ?>
<div class="alert alert-warning">
    <strong>Ops!!!</strong>
    O campo titulo não pode ter menos de 5 caracteres.
</div>
<?php endif; ?>

<?php if(!validarData($data)): ?>
<div class="alert alert-warning">
    <strong>Ops!!!</strong>
    O campo data não pode ser uma data anterior da de hoje e/ou ficar vazia.
</div>
<?php endif; ?>

<?php if ($gravou): ?>
    <div class="alert alert-success">
        <strong>Uhuuu!</strong>
        Tarefa cadastrada com sucesso!
    </div>
<?php endif; ?>