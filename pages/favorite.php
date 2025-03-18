<?php
require_once("../config/favoris.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Favoris</title>
    <script defer src="../scripts/app.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</head>

<body class="bg-[#fdf6ec] min-h-screen flex flex-col items-center p-6">

    <?php include '../component/header.php'; ?>

    <div class="mt-12 bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl text-center">
        <h1 class="text-2xl font-bold text-[#9b4d1f]">Mes Favoris</h1>
    </div>

    <div class="mt-6 w-full max-w-6xl mx-auto">
        <?php if (empty($favorites)): ?>
            <p class="text-center text-red-700 font-bold col-span-full text-2xl">Aucun favori pour l'instant !</p>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full">
                <?php foreach ($favorites as $fav): ?>
                    <div
                        class="bg-white shadow-lg rounded-xl p-4 flex flex-col items-center border border-gray-300 text-center min-h-[350px] w-64">
                        <img src="<?= htmlspecialchars($fav['image_url']) ?>" class="w-40 h-56 object-cover rounded-lg shadow">
                        <h2 class="font-bold mt-3 px-2 break-words"><?= htmlspecialchars($fav['title']) ?></h2>
                        <p class="text-gray-600"><?= htmlspecialchars($fav['author']) ?></p>

                        <div class="flex-grow"></div>

                        <form action="../config/favoris.php" method="POST">
                            <input type="hidden" name="delete_book_id" value="<?= $fav['book_id'] ?>">
                            <button type="submit"
                                class="mt-4 px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition w-full">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    
</body>

</html>