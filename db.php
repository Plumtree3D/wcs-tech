
<?php session_start(); 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PWD', '');
    define('DBNAME', 'challenge');

    try {
        $db = new PDO("mysql:host=". HOST .";dbname=". DBNAME, USER, PWD, [
            // Gestion des erreurs PHP/SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            // Gestion du jeu de caractères
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            // Choix du retours des résultats
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        // echo 'Base de données connectée';

    } catch (Exception $error) {
        echo 'Exception error : '. "<br>". $error->getMessage();
    }

    $fetch = "SELECT * FROM argonautes" ;
    $pdo = $db;
    $temp = $pdo->prepare($fetch);
    $temp->execute();
    $names = $temp->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST["name"]) && !empty($_POST["name"])) {
        $name =  htmlspecialchars($_POST["name"]);
        $request = $pdo->prepare("INSERT INTO argonautes (name) VALUES ('$name')");
        $resultat= $request->execute(); $request->debugDumpParams(); 
        header('Location: ./'); 
    }

    if(isset($_GET['del'])) {
        $id = $_GET['del']; 
        $request = $pdo->prepare("DELETE FROM `argonautes` WHERE argonautes.id = ('$id')");
        $request->execute();
        header('Location: ./'); 
      }
    