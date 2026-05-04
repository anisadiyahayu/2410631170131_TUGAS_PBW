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
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .login-box {
            width: 350px;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #3e9bff;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #007bff;
        }

        .pesan {
            background: #fff3cd;
            color: #856404;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if (isset($_GET['message'])) { ?>
        <div class="pesan">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php } ?>

    <form method="post" action="proses_login.php">
        <label>Nama Pengguna</label>
        <input type="text" name="username" required>

        <label>Kata Sandi</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>