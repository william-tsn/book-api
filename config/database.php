<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

// Connection à la base de données
try {
    $bdd = new PDO("mysql:host=$servername;dbname=bibliothèque;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}

// Gérer l'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inscription'])) {
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validation des champs avec les contraintes (Pseudo, Nom, Prénom, Email, Mot de passe)
    if (strlen($pseudo) < 4 || strlen($pseudo) > 24 || preg_match('/[^a-zA-Z0-9_]/', $pseudo)) {
        echo json_encode(["success" => false, "message" => "Pseudo invalide"]);
        exit;
    }

    if (strlen($nom) < 2 || strlen($nom) > 50 || preg_match('/[^a-zA-ZÀ-ÿ -]/', $nom)) {
        echo json_encode(["success" => false, "message" => "Nom invalide"]);
        exit;
    }

    if (strlen($prenom) < 2 || strlen($prenom) > 50 || preg_match('/[^a-zA-ZÀ-ÿ -]/', $prenom)) {
        echo json_encode(["success" => false, "message" => "Prénom invalide"]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Email invalide"]);
        exit;
    }

    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^a-zA-Z0-9_]).{8,}$/', $password)) {
        echo json_encode(["success" => false, "message" => "Mot de passe invalide"]);
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insertion de l'utilisateur dans la base de données
    $requete = $bdd->prepare("INSERT INTO users (pseudo, nom, prenom, email, password) VALUES (:pseudo, :nom, :prenom, :email, :password)");
    $requete->execute([
        "pseudo" => $pseudo,
        "nom" => $nom,
        "prenom" => $prenom,
        "email" => $email,
        "password" => $passwordHash
    ]);

    header("Location: ../pages/login.php");
    exit();
}

// La je gère la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "") {
        // Vérification de l'existence de l'email dans la base de données
        $req = $bdd->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute([$email]);
        $rep = $req->fetch(PDO::FETCH_ASSOC);

        if ($rep && password_verify($password, $rep['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $rep['id'];
            $_SESSION['pseudo'] = $rep['pseudo'];

            // Récupération de la photo de profil de l'utilisateur
            $stmt = $bdd->prepare("SELECT photo_de_profil FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['pdp'] = $userData['photo_de_profil'];

            header("Location: ../pages/home.php");
            exit();
        } else {
            echo json_encode(["success" => false, "message" => "Email ou mot de passe incorrect"]);
        }
    }
}
?>
