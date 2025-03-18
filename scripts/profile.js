// pour le changement de mon nom d'utilisateur
let usernameInput = document.getElementById("usernameInput");
document.getElementById("usernameSubmit").addEventListener("click", () => {
    const newUsername = usernameInput.value.trim();

    fetch("../config/update_profile.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ username: newUsername }),
        credentials: "same-origin",
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Nom d'utilisateur mis à jour !");
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Erreur:", error));
});

// pour le changement de mon mot de passe
let passwordInput = document.getElementById("passwordInput");
document.getElementById("passwordSubmit").addEventListener("click", () => {
    const newPassword = passwordInput.value.trim();

    fetch("../config/update_profile.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ password: newPassword }),
        credentials: "same-origin",
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Mot de passe mis à jour !");
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Erreur:", error));
});

// pour le changement de ma photo de profil
let pdpInput = document.getElementById("pdpInput");
document.getElementById("pdpSubmit").addEventListener("click", () => {
    const newPdpUrl = pdpInput.value.trim();

    fetch("../config/update_profile.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ pdp: newPdpUrl }),
        credentials: "same-origin",
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Photo de profil mise à jour !");
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Erreur:", error));
});

