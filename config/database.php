<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "book";


// Connection à la base de données
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}

// Traitement de l'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inscription'])) {
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ici les contraintes
    if (strlen($pseudo) < 4 || strlen($pseudo) > 24 || preg_match('/[^a-zA-Z0-9_]/', $pseudo)) {
        $_SESSION['error_message'] = "Pseudo invalide. Il doit être entre 4 et 24 caractères, et ne contenir que des lettres, chiffres et underscores.";
        header("Location: inscription.php");
        exit;
    }

    if (strlen($nom) < 2 || strlen($nom) > 50 || preg_match('/[^a-zA-ZÀ-ÿ -]/', $nom)) {
        $_SESSION['error_message'] = "Nom invalide. Il doit être entre 2 et 50 caractères.";
        header("Location: inscription.php");
        exit;
    }

    if (strlen($prenom) < 2 || strlen($prenom) > 50 || preg_match('/[^a-zA-ZÀ-ÿ -]/', $prenom)) {
        $_SESSION['error_message'] = "Prénom invalide. Il doit être entre 2 et 50 caractères.";
        header("Location: inscription.php");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Email invalide.";
        header("Location: inscription.php");
        exit;
    }

    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^a-zA-Z0-9_]).{8,}$/', $password)) {
        $_SESSION['error_message'] = "Mot de passe invalide. Il doit contenir au moins une majuscule, une minuscule, un chiffre, et un caractère spécial, et être d'au moins 8 caractères.";
        header("Location: inscription.php");
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // j'insère l'utilisateur dans la base de données
    try {
        $requete = $bdd->prepare("INSERT INTO users (pseudo, nom, prenom, email, password) VALUES (:pseudo, :nom, :prenom, :email, :password)");
        $requete->execute([
            "pseudo" => $pseudo,
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "password" => $passwordHash
        ]);
        
        // je redirige vers la page de connexion après inscription réussie
        $_SESSION['success_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        header("Location: ../pages/login.php");
        exit();
    } catch (PDOException $e) {
        // Si erreur lors de l'insertion dans la base de données
        $_SESSION['error_message'] = "Erreur lors de l'inscription. Veuillez réessayer.";
        header("Location: inscription.php");
        exit();
    }
}

// La je gère la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "") {
        // je vérifie l'existence de l'email dans la base de données
        $req = $bdd->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute([$email]);
        $rep = $req->fetch(PDO::FETCH_ASSOC);

        if ($rep && password_verify($password, $rep['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $rep['id'];
            $_SESSION['pseudo'] = $rep['pseudo'];

            // Je récupère la photo de profil de l'utilisateur
            $stmt = $bdd->prepare("SELECT photo_de_profil FROM users WHERE id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['pdp'] = $userData['photo_de_profil'];

            header("Location: ../pages/home.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Email ou mot de passe incorrect";
            header("Location: login.php");
            exit();

        }
    }
}
?>
