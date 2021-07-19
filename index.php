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
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css" integrity="sha512-DYOwgMAsSbNzrSwEU3nQ7bcYo5aEqpIq1lOe5doeuUwXjuFYjIPvIZDZrEOH+QMIXvRpqcc8gPKcoIMIyAZMCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js" integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</head>

<body>

    <div class="container layout-index">
        <div class="row title-content">
            <h1>Sistema de cadastro de usuário</h1>
        </div>
        <div class="card">
            <form action="#" name="form-cadastro" id="form-cadastro">
                <input type="hidden" name="id_user" id="id_user">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" placeholder="Seu nome">
                        </div>
                        <div class="col-5">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="Seu email">
                        </div>
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" placeholder="Seu Telefone">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-2">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" onblur="getCep()" class="form-control" id="cep" placeholder="Seu cep">
                        </div>
                        <div class="col-4">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" class="form-control" id="endereco" placeholder="Seu endereço">
                        </div>
                        <div class="col-2">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" class="form-control" id="numero" placeholder="Número">
                        </div>
                        <div class="col-4">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                        </div>    
                    </div>
                </div>
        </div>
        <button onclick="save(event)" class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Salvar Dados">
            <i class="far fa-save fa-3x"></i></button>
        </form>
    </div>
        <hr>
        <div class="data-table">
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
                                <button class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top" title='Editar <?php echo $user['nome']; ?>' onclick='updateUser("<?php echo $user['id']; ?>")'>

                                    <i class="fas fa-user-edit fa-lg"></i> </button>
                            <td><button class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="top" title='Excluir <?php echo $user['nome']; ?>' onclick='showAlertDialog("<?php echo $user['id']; ?>","<?php echo $user['nome']; ?>", "<?php echo $user['email']; ?>")'><i class="fas fa-trash fa-lg"></i></button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <span>Não existe nenhum usuário cadastro!</span>
        <?php endif; ?>
    </div>
    </div>
    <script src="https://unpkg.com/imask"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table-users').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese-Brasil.json'
                }
            });
        });
    </script>
    <script type="text/javascript" src="js/functions.js"></script>
</body>

</html>