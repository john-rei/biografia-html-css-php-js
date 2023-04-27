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

if (!isset($_POST['nome']) || empty($_POST['nome'])) {
    header("Location: http://zero.come2us.com.br/news.php");
    die();
}

if (!isset($_POST['email']) || empty($_POST['email'])) {
    header("Location: http://zero.come2us.com.br/news.php");
    die();
}

$nome = $_POST['nome'];
$email = $_POST['email'];

$data = [
    'nome' => $nome,
    'email' => $email,
];

$sql = "INSERT INTO News (nome, email) VALUES (:nome, :email)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);

?>

<h1>Cadastrado com sucesso!</h1>
<a href="http://zero.come2us.com.br/news.php">Retornar</a>