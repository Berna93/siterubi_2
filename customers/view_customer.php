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
            <h2>Clientes</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add_customer.php"><i class="fa fa-plus"></i> Novo Cliente</a>
            <a class="btn btn-default" href="view_customer.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>

    </div>
</header>

    <div class="row">


          <form role="form" action="view_customer.php?id=<?php echo $customer['id']; ?>" method="post">
            <div class="form-group col-sm-2">
                                        &nbsp <label>ID</label>
                                        <input type="text" class="form-control" name="customer['id']" value="<?php echo $customer['name_var']; ?>" data-error="Por favor, informe um nome válido.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="customer['name_var']" data-error="Por favor, informe um nome válido.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="customer['name_var']" value="<?php echo $customer['name_var']; ?>" data-error="Por favor, informe um nome válido.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group col-sm-2">
                                     <label>Nome</label>
                                     <button type="submit" class="btn btn-success">Pesquisar</button>
                                     </div>
        </form>


    </div>
<hr>

<table class="table table-hover">
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

<?php include(FOOTER_TEMPLATE); ?>