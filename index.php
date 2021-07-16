<?php
require "bootstrap.php";
$users = Usuario::get();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js" integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css" integrity="sha512-DYOwgMAsSbNzrSwEU3nQ7bcYo5aEqpIq1lOe5doeuUwXjuFYjIPvIZDZrEOH+QMIXvRpqcc8gPKcoIMIyAZMCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div class="container layout-index">
        <form action="#" name="form-cadastro" id="form-cadastro">
            <input type="hidden" name="id_user" id="id_user">
            <div class="mb-3">
                <div class="row">
                    <div class="col-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Seu nome">
                    </div>
                    <div class="col-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="Seu email">
                    </div>
                    <div class="col-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" placeholder="Seu Telefone">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" placeholder="Seu cep">
                    </div>
                    <div class="col-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Seu endereço">
                    </div>
                    <div class="col-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" placeholder="Número">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-3">
                        <label for="bairro" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                    </div>
                </div>
            </div>

            <button onclick="save(event)" class="btn btn-success btn-lg">Salvar</button>
        </form>
   
    <hr>
    <?php if (count($users) > 0) :; ?>
        <table class="table" id="table-users">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">e-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Número</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?php echo $user['id']; ?></th>
                        <td><?php echo $user['nome']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['telefone']; ?></td>
                        <td><?php echo $user['cep']; ?></td>
                        <td><?php echo $user['endereco']; ?></td>
                        <td><?php echo $user['numero']; ?></td>
                        <td><?php echo $user['bairro']; ?></td>
                        <td>
                            <button class="btn btn-primary" onclick='updateUser("<?php echo $user['id']; ?>")'>Editar</button>
                        <td><button class="btn btn-danger" onclick='showAlertDialog("<?php echo $user['id']; ?>",
                                                         "<?php echo $user['nome']; ?>", 
                                                         "<?php echo $user['email']; ?>")'>Excluir</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-users').DataTable();
        });
    </script>
    <script type="text/javascript" src="js/functions.js"></script>
</body>

</html>