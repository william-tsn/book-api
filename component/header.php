<div class="bg-orange-600 text-white shadow-md p-4 w-full flex items-center justify-between rounded-xl">
    <div class="flex items-center space-x-6 pl-4">
        <a href="home.php" class="text-white font-semibold hover:text-gray-200 transition">Accueil</a>
        <a href="favorite.php" class="text-white font-semibold hover:text-gray-200 transition">Favoris</a>
    </div>
    <div class="text-xl font-bold flex items-center space-x-2">
        <span>BOOK'ING API</span>
    </div>
    <div class="relative">
        <button id="profileBtn" class="p-2 rounded-full hover:bg-orange-500 transition cursor-pointer">
            <img id="profilePicture" 
                class="w-12 h-12 rounded-full object-cover border-2 border-white" 
                src="<?= !empty($_SESSION['pdp']) ? $_SESSION['pdp'] : '../assets/default-avatar.jpg'; ?>" 
                alt="Photo de profil">
        </button>
        <div id="profileMenu"
            class="hidden absolute right-0 mt-2 w-48 rounded-md bg-white shadow-lg ring-1 ring-black/5 text-gray-700">
            <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
                <a href="profile.php" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-100">Déconnexion</a>
            <?php else: ?>
                <a href="login.php" class="block px-4 py-2 hover:bg-gray-100">Connexion</a>
                <a href="inscription.php" class="block px-4 py-2 text-blue-600 hover:bg-blue-100">Inscription</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    document.getElementById('profileBtn').addEventListener('click', function () {
        document.getElementById('profileMenu').classList.toggle('hidden');
    });
</script>
