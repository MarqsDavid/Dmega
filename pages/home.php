<?php include('../php/sessionHome.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <?php include('../components/sidebarMenu.php') ?>

    <div class="container">
        <div class="row py-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div class="dashboard-title-text">
                    <h2><?php echo htmlspecialchars($nameUser . ' ' . $lastName); ?></h2>
                    <p class="text-grey">Online</p>
                </div>
            </div>
        </div>
        <div class="overview-section p-5">
            <div class="row overview-section-title">
                <div class="details">
                    <div class="recentMovement">
                        <div class="cardHeader">
                            <h2>Movimentação Recente de Ativos</h2>
                        </div>
                        <div class="container">
                            <div class="table-responsive">
                                <table id="tabela-dados" class="table table-striped table-bordered no-border-table">
                                    <thead>
                                        <tr>
                                            <th>Descrição</th>
                                            <th>Nº Patrimônio</th>
                                            <th>Localização</th>
                                            <th>Responsável</th>
                                            <th>Data</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="hidden-rows">
                                        <?php include('../php/whileHome.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Arquivos JavaScript -->
        <script src="../js/icones.js"></script>


        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="../js/home.js"></script>

</body>

</html>
