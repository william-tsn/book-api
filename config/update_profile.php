<?php

session_start();
require_once 'database.php';
header("Content-Type: application/json");

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Utilisateur non connecté"]);
    die();
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);

// ma partie Nom d'utilisateur
if (isset($data['username'])) {
    $username = trim($data['username']);

    $stmt = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
    if ($stmt->execute([$username, $user_id])) {
        echo json_encode(["success" => true, "message" => "Nom d'utilisateur mis à jour"]);
        $_SESSION['username'] = $username;
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour"]);
    }
}

// Ma partie mot de passe 
if (isset($data['password'])) {
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $stmt = $bdd->prepare("UPDATE users SET password = ? WHERE id = ?");
    if ($stmt->execute([$password, $user_id])) {
        echo json_encode(["success" => true, "message" => "Mot de passe mis à jour"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour"]);
    }
}

//Ma partie photo de profil 
if (isset($data['pdp'])) {
    $pdp = trim($data['pdp']);

    $stmt = $bdd->prepare("UPDATE users SET photo_de_profil = ? WHERE id = ?");
    if ($stmt->execute([$pdp, $user_id])) {
        echo json_encode(["success" => true, "message" => "Photo de profil mise à jour"]);
        $_SESSION['pdp'] = $pdp;
    } else {
        echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour"]);
    }
}
?>

