let apiKey = "AIzaSyBobxsZgP3GYV5-2R-Dp_ogII2q6Dlygkg";

const input = document.querySelector(".search");
const results = document.querySelector(".resultats");
const submit = document.querySelector(".searchBtn");
const favorites = document.querySelector(".favBtn");
const filtersMenu = document.querySelector(".filter-menu");

submit.addEventListener("click", () => {
    results.innerHTML = "";
    fetch(`https://www.googleapis.com/books/v1/volumes?q=intitle:${input.value}&key=${apiKey}`)
        .then(res => res.json())
        .then(data => {
            displayBook(data.items);
        })
        .catch(error => console.log(error));
});

function displayBook(books) {
    books.forEach(book => {
        let container = document.createElement("div");
        container.className = "bg-white shadow-md rounded-xl p-4 border border-gray-300 transform hover:scale-105 transition duration-300 w-64 flex flex-col items-center text-center";

        let title = document.createElement("h2");
        title.className = "text-lg font-bold mt-3 px-2";

        let image = document.createElement("img");
        image.className = "w-40 h-56 object-cover rounded-lg shadow";

        let auteur = document.createElement("p");
        auteur.className = "text-sm text-gray-600 mt-1";

        let favBtn = document.createElement("button");
        favBtn.className = "mt-4 px-4 py-2 bg-[#d97941] text-white rounded-full hover:bg-[#b55f30] transition w-full";
        favBtn.textContent = "Ajouter aux favoris";
        favBtn.addEventListener("click", () => {
            let bookData = {
                book_id: book.id,
                title: book.volumeInfo.title,
                author: book.volumeInfo.authors?.join(", ") || "",
                image_url: book.volumeInfo.imageLinks?.thumbnail || ""
            };

            fetch("../config/favoris.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams(bookData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        favBtn.textContent = "Ajouté !";
                        favBtn.disabled = true;
                        favBtn.classList.replace("bg-[#d97941]", "bg-green-500");
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => console.log("Erreur :", error));
        });

        title.textContent = book.volumeInfo.title || "Titre non disponible";
        image.src = book.volumeInfo.imageLinks?.thumbnail || "../assets/imagenotfound.jpg";
        auteur.textContent = book.volumeInfo.authors || "Auteur non disponible";

        container.append(image, title, auteur, favBtn);
        results.appendChild(container);
    });
}
