<?php
$host = 'mysql.zero.come2us.com.br';
$dbname = 'zero';
$username = 'zero';
$password = 'c0me2us';

try {
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$stmt = $pdo->query("SELECT nome FROM News ORDER BY id DESC LIMIT 5");
$users = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <a href="http://zero.come2us.com.br/">Home</a>
        <a href="/news.php">News</a>
    </div>
    <div class="box-main news-main">
        <div class="box-central news-central">
            <h1>
                News
            </h1>
            <div class="box-form">
                <form action="/enviaD.php" method="post">
                    <div class="form-group news-form">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" pattern="[a-zA-Z0-9]+">
                    </div>
                    <div class="form-group news-form">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
                    </div>
                    <div class="form-check news-form">
                        <input type="checkbox" name="checkBox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Desejo receber as novidades</label>
                    </div>
                    <button type="submit" class="btn btn-primary news-form" id="btn-form">Enviar</button>
                </form>
                <div class="box-inscritos">
                    <h2>Últimos inscritos</h2>
                    <?php
                        foreach ($users as $row) { ?>
                            <p>
                            <?php echo $row['nome']; ?>
                            </p>
                        <?php } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer fnews">
        <p>Copyright 2023</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
</body>
</html>