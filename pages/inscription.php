<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <title>Inscription</title>
</head>

<body class="bg-orange-50 flex items-center justify-center min-h-screen p-6">

    <?php require_once("../config/database.php"); ?>

    <form method="POST" action="inscription.php"
        class="bg-white shadow-lg rounded-xl p-6 w-full max-w-lg border border-gray-200">
        <h2 class="text-2xl font-semibold text-center text-white bg-orange-500 p-4 rounded-xl">
            Créez votre compte
        </h2>

        <div class="mb-4 pt-4">
            <label for="pseudo" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-user text-orange-500 mr-2"></i> Votre Pseudo
            </label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo..." required
                class="w-full border border-gray-400 rounded-lg p-3 shadow-sm focus:ring-orange-500 focus:border-orange-500">
        </div>

        <div class="mb-4">
            <label for="nom" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-user text-orange-500 mr-2"></i> Votre Nom
            </label>
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom..." required
                class="w-full border border-gray-400 rounded-lg p-3 shadow-sm focus:ring-orange-500 focus:border-orange-500">
        </div>

        <div class="mb-4">
            <label for="prenom" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-user text-orange-500 mr-2"></i> Votre Prénom
            </label>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom..." required
                class="w-full border border-gray-400 rounded-lg p-3 shadow-sm focus:ring-orange-500 focus:border-orange-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-envelope text-orange-500 mr-2"></i> Votre Email
            </label>
            <input type="email" id="email" name="email" placeholder="Entrez votre email..." required
                class="w-full border border-gray-400 rounded-lg p-3 shadow-sm focus:ring-orange-500 focus:border-orange-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium mb-1 flex items-center">
                <i class="fas fa-lock text-orange-500 mr-2"></i> Votre Mot de Passe
            </label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe..." required
                class="w-full border border-gray-400 rounded-lg p-3 shadow-sm focus:ring-orange-500 focus:border-orange-500">
        </div>

        <div class="mt-6">
            <input type="submit" value="S'inscrire" name="inscription"
                class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition font-bold text-lg">
        </div>

        <p class="text-center text-sm pt-4">Vous avez déjà un compte ?
            <a href="../pages/login.php" class="text-orange-500 hover:text-orange-600 font-semibold">
                Connectez-vous ici
            </a>
        </p>

        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<p class='text-red-500 text-center mt-4'>" . $_SESSION['error_message'] . "</p>";
            unset($_SESSION['error_message']);
        }
        ?>
    </form>

</body>

</html>