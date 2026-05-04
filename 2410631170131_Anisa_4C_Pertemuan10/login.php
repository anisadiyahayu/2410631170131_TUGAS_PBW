<?php
session_start();

if (isset($_SESSION['login_Un51k4']) && $_SESSION['login_Un51k4'] === true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Data Menu Kantin</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Login</h4>
                </div>

                <div class="card-body">

                    <?php if (isset($_GET['message'])) { ?>
                        <div class="alert alert-warning">
                            <?php echo htmlspecialchars($_GET['message']); ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action="proses_login.php">
                        <div class="mb-3">
                            <label class="form-label">Nama Pengguna</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>