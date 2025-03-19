<?php
require_once "database.php";

$user_id = $_SESSION['user_id'] ?? null;
$favorites = [];

// Si l'utilisateur est connecté,je récupère ses favoris
if ($user_id) {
    $stmt = $bdd->prepare("SELECT * FROM favoris WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id']) && isset($_POST['title'])) {
    // ici si mon user n'est pas login il ne peut pas voir ses favoris
    if (!$user_id) {
        echo json_encode(["error" => "Vous devez être connecté pour ajouter des favoris."]);
        exit();
    }

    $book_id = $_POST['book_id'];
    $title = $_POST['title'] ?: "Titre non disponible";
    $author = $_POST['author'] ?: "Auteur non disponible";
    $image_url = $_POST['image_url'] ?: "../assets/imagenotfound.jpg";

    // ici je vérifie si le livre est déjà dans les favoris
    $stmt = $bdd->prepare("SELECT * FROM favoris WHERE user_id = ? AND book_id = ?");
    $stmt->execute([$user_id, $book_id]);

    if ($stmt->rowCount() == 0) {
        // Ajouter le livre aux favoris
        $sql = "INSERT INTO favoris (user_id, book_id, title, author, image_url) VALUES (?, ?, ?, ?, ?)";
        $stmt = $bdd->prepare($sql);
        if ($stmt->execute([$user_id, $book_id, $title, $author, $image_url])) {
            echo json_encode(["success" => "Livre ajouté aux favoris"]);
        } else {
            echo json_encode(["error" => "Erreur lors de l'ajout"]);
        }
    } else {
        echo json_encode(["error" => "Livre déjà ajouté"]);
    }
}

// Suppression d'un livre des favoris
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_book_id'])) {
    if (!$user_id) {
        echo json_encode(["error" => "Vous devez être connecté pour supprimer un favori."]);
        exit();
    }

    $book_id = $_POST['delete_book_id'];
    $stmt = $bdd->prepare("DELETE FROM favoris WHERE user_id = ? AND book_id = ?");
    $stmt->execute([$user_id, $book_id]);

    // Redirection vers la page des favoris après la suppression
    header('Location: ../pages/favorite.php');
    exit();
}
?>
