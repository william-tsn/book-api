<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK'ING API</title>
    <script defer src="../scripts/profile.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>

<body class="bg-orange-50 min-h-screen flex flex-col items-center p-6">

    <?php include '../component/header.php'; ?>

    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-lg mt-12 border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-white bg-orange-500 p-4 rounded-xl">
            Modifier votre profil
        </h2>
        <div class="mb-4">
            <label for="usernameInput" class="block font-medium mb-1 pt-8 flex items-center">
                <i class="fas fa-user text-orange-500 mr-2"></i> Pseudo
            </label>
            <div class="flex">
                <input type="text" id="usernameInput" class="w-full border border-gray-300 rounded-lg p-3 shadow-sm">
                <button type="submit" id="usernameSubmit"
                    class="ml-2 px-4 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                    Appliquer
                </button>
            </div>
        </div>
        <div class="mb-4">
            <label for="passwordInput" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-lock text-orange-500 mr-2"></i> Mot de passe
            </label>
            <div class="flex">
                <input type="password" id="passwordInput"
                    class="w-full border border-gray-300 rounded-lg p-3 shadow-sm">
                <button type="submit" id="passwordSubmit"
                    class="ml-2 px-4 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                    Appliquer
                </button>
            </div>
        </div>
        <div class="mb-4">
            <label for="pdpInput" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-image text-orange-500 mr-2"></i> URL de la photo de profil
            </label>
            <div class="flex">
                <input type="text" id="pdpInput" class="w-full border border-gray-300 rounded-lg p-3 shadow-sm">
                <button type="submit" id="pdpSubmit"
                    class="ml-2 px-4 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                    Appliquer
                </button>
            </div>
        </div>
        <div class="mt-6">
            <button id="saveBtn"
                class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition font-bold text-lg">
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