<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>

<body class="bg-gradient-to-r from-blue-300 to-indigo-500 flex items-center justify-center h-screen">

<?php
    require_once("../config/database.php");
    ?>

    <form method="POST" action="" class="max-w-sm mx-auto bg-white p-8 rounded-lg shadow-lg space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-center text-blue-700">Bienvenue, connectez-vous à votre compte</h1>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Votre Email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email..." required
                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Votre Mot de Passe</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe..." required
                class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div>
            <input type="submit" value="Se connecter" name="login"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-md transition duration-200">
        </div>
        <p class="text-center text-sm pt-4">Vous n'avez pas de compte ? <a href="../pages/inscription.php"
                class="text-violet-500 hover:text-blue-600">Créez-en un ici</a></p>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<p class='text-red-500 text-center'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }
        ?>
    </form>



</body>

</html>