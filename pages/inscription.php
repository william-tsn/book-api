<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="../scripts/app.js"></script>
</head>

<body class="bg-gradient-to-r from-indigo-300 to-blue-500 flex items-center justify-center h-screen">

    <form action="../config/database.php" method="POST" class="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md space-y-6">

        <h2 class="text-3xl font-semibold text-center text-blue-700">Créer un compte</h2>

        <input type="text" name="pseudo" placeholder="Pseudo" required
            class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        <input type="text" name="nom" placeholder="Nom" required
            class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        <input type="text" name="prenom" placeholder="Prénom" required
            class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            
        <input type="email" name="email" placeholder="Email" required
            class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        <input type="password" name="password" placeholder="Mot de passe" required
            class="w-full border border-gray-300 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

        <button type="submit" name="ok"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg shadow-md transition duration-200">S'inscrire</button>
        <p class="text-center text-sm pt-4">Déjà un compte ? <a href="../pages/login.php" class="text-violet-500 hover:text-blue-600">Connectez-vous ici</a></p>
    </form>

</body>

</html>