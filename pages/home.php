<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK'ING API</title>
    <script defer src="../scripts/app.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>

<body class="bg-[#fdf6ec] min-h-screen flex flex-col items-center p-6">

    <?php include '../component/header.php'; ?>

    <div class="mt-12 bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl text-center">
        <h1 class="text-2xl font-bold text-[#9b4d1f]">Recherche de Livres</h1>

        <div class="mt-4 flex items-center justify-center space-x-2">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="relative w-full max-w-xl">
                    <input type="text" class="search w-full border p-3 rounded-lg shadow-md bg-white pl-10"
                        placeholder="Rechercher un livre par titre..." />
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <button class="searchBtn px-6 py-3 bg-[#d97941] text-white rounded-lg hover:bg-[#b55f30] transition">
                    Rechercher
                </button>
            <?php else: ?>
                <p class="text-white bg-red-500 px-4 py-2 rounded-lg shadow-md">
                    Vous devez être connecté pour rechercher des livres.
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="flex flex-col items-center mt-6 w-full">
        <div class="filters-menu mb-4"></div>
        <div class="resultats grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full max-w-6xl p-4">
        </div>
    </div>


</body>

</html>