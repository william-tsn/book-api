<?php
require_once "database.php";

// la verif pour voir si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "Utilisateur non connecté"]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Ajout d'un livre aux favoris
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id']) && isset($_POST['title'])) {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $image_url = $_POST['image_url'];

    // je vérifie si le livre est déjà en favoris
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

// je supprime un livre des favoris
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_book_id'])) {
    $book_id = $_POST['delete_book_id'];

    $stmt = $bdd->prepare("DELETE FROM favoris WHERE user_id = ? AND book_id = ?");
    $stmt->execute([$user_id, $book_id]);

    // je redirige vers la page des favoris après la suppression
    header('Location: ../pages/favorite.php');
    exit();
}

// je viens récupérer les favoris de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $bdd->prepare("SELECT * FROM favoris WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
?>
