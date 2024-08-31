<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./img/logo.ico" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css" />
</head>

<body>

    <!-- Seção Principal de Login -->
    <section class="vh-100 d-flex justify-content-center align-items-center" style="background-color: #38b6ff;">
        <div class="card shadow-sm" style="max-width: 400px; width: 100%; margin: 1rem;">
            <div class="card-body">
                <div class="logo-container d-flex align-items-center justify-content-center mb-3">
                    <img src="./img/logo.ico" alt="Logo" class="fa-2x me-2" style="width: 2em;">
                    <span class=" h4 fw-bold mb-0">
                        <span class="text-primary">D</span>MEGA
                    </span>
                </div>
                <div class="form-container">
                    <h3 class="title mb-4"><i class="far fa-caret-square-right"></i> Entrar</h3>
                    <form action="../assets/php/loginUser.php" method="POST" class="form-horizontal">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="passwordUsers" class="form-control" id="password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Começar</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="#loginModal" data-bs-toggle="modal" data-bs-target="#loginModal"
                            class="text-muted">Entrar como administrador</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="loginModal" class="modal fade" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Entrar como Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar">x</button>
                </div>
                <div class="modal-body">
                    <div class="form-bg">
                        <div class="form-container">
                            <h3 class="title"><i class="far fa-caret-square-right"></i>Administrador</h3>
                            <form action="../assets/php/loginMaster.php" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label for="email">Usuário</label>
                                    <input name="username" type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" name="passwordAdmin" class="form-control" id="password">
                                </div>
                                <button type="submit" name="submit" class="btn signup">Começar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>

</html>