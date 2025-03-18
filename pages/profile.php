<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKS API</title>
    <script defer src="../scripts/profile.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>

<body class="bg-gradient-to-r from-blue-300 to-indigo-500 min-h-screen flex flex-col items-center p-6">

    <?php include '../component/header.php'; ?>

    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-lg mt-10">
        <h2 class="text-2xl font-semibold text-center mb-4">Modifier votre profil</h2>
        <div class="mb-4">
            <label for="usernameInput" class="block font-medium mb-1">Nom d'utilisateur</label>
            <input type="text" id="usernameInput"
                class="w-full border-gray-500 rounded-lg p-3 shadow-sm">
            <button type="submit" id="usernameSubmit"
                class="mt-2 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Appliquer
            </button>
        </div>
        <div class="mb-4">
            <label for="passwordInput" class="block font-medium mb-1">Mot de passe</label>
            <input type="password" id="passwordInput"
                class="w-full rounded-lg p-3 shadow-sm">
            <button type="submit" id="passwordSubmit"
                class="mt-2 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Appliquer
            </button>
        </div>
        <div class="mb-4">
            <label for="pdpInput" class="block font-medium mb-1">URL de la photo de profil</label>
            <input type="text" id="pdpInput"
                class="w-full rounded-lg p-3 shadow-sm">
            <button type="submit" id="pdpSubmit"
                class="mt-2 w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Appliquer
            </button>
        </div>
        <div class="mt-6">
            <button id="saveBtn" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition font-bold">
                Sauvegarder les changements
            </button>
        </div>
    </div>
    <script>
        document.getElementById('saveBtn').addEventListener('click', function () {
            location.reload();
        });
    </script>


</body>

</html>