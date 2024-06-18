<?php if(!validacaoTamanhoBusca($busca)): ?>
<div class="alert alert-danger" role="alert">
    <strong>Ops!!!</strong>
    Você precisa informar ao menos 3 caracteres para realizar uma busca
</div>
<?php endif; ?>

<?php if(!validacaoTamanhoBusca($busca, $tarefa)): ?>
<div class="alert alert-warning">
    <strong>Ops!!!</strong>
    <?php echo "Não foram encontrados registros com a palavra-chave {$tarefa}." ?>
</div>
<?php endif; ?>

<?php if(estaVazioBusca($busca)): ?>
<div class="alert alert-danger">
    <strong>Ops!!!</strong>
    Está vazio. Você precisa informar algo.
</div>
<?php endif; ?>