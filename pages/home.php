<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKS API</title>
    <script defer src="../scripts/app.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>

<body class="bg-gradient-to-r from-blue-300 to-indigo-500 p-6 max-w-100vw h-100-vh bg-fixed">

    <?php include '../component/header.php'; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="flex justify-center mt-12">
            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <img src="../assets/Villageoise.webp" alt="" class="w-12 h-24" />
                <p class="text-2xl text-gray-800 ml-4">
                    Heureux de vous revoir, <span
                        class="text-blue-500 font-semibold"><?php echo htmlspecialchars($_SESSION['pseudo']); ?></span> !
                </p>
            </div>
        </div>
    <?php endif; ?>

    <div class="mt-12 flex justify-center">
        <div class="relative flex items-center space-x-2">
            <?php if (isset($_SESSION['user_id'])): ?>
                <input type="text" class="search border p-3 rounded-lg w-80 shadow-md bg-white"
                    placeholder="Rechercher par titre, auteur, sujet..." />
                <button
                    class="searchBtn px-4 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition cursor-pointer">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            <?php else: ?>
                <p class="text-white bg-red-500 px-4 py-2 rounded-lg shadow-md">
                    Vous devez être connecté pour rechercher des livres.
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="flex flex-col items-center mt-6">
        <div class="filters-menu mb-4"></div>
        <div class="resultats grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-6xl">
        </div>
    </div>

</body>

</html>