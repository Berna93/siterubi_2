<?php
include('../session.php');
?>
<?php
    require_once('functions.php');
    search($customer['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Visualização de Clientes</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add_customer.php"><i class="fa fa-plus"></i> Novo Cliente</a>
            <a class="btn btn-default" href="view_customer.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>

    </div>
</header>

<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
       <thead>
    <tr>
        <th>ID</th>
        <th width="30%">Nome</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Opções</th>
    </tr>
</thead>
<tbody>
<?php if ($customers) : ?>
<?php foreach ($customers as $customer) : ?>
    <tr>
        <td><?php echo $customer['id']; ?></td>
        <td><?php echo $customer['name_var']; ?></td>
        <td><?php echo $customer['cpf_var']; ?></td>
        <td><?php echo $customer['email_var']; ?></td>
        <td class="actions text-right">
            <a href="edit_customer.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
                <i class="fa fa-trash"></i> Excluir
            </a>
        </td>
    </tr>
<?php endforeach; ?>

<?php else : ?>
    <tr>
        <td colspan="6">Nenhum registro encontrado.</td>
    </tr>
<?php endif; ?>
</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );

</script>

        <?php include(FOOTER_TEMPLATE); ?>