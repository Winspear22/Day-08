document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('login-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Empêche le reload
            let formData = new FormData(form);

            fetch('/login', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.json())
            .then(data => {
                const messageDiv = document.getElementById('message');
                if (data.success) 
				{
                    form.style.display = "none";
                    // Ajoute dynamiquement un message ou un bouton vers la page principale
                    let msgDiv = document.createElement('div');
                    msgDiv.innerHTML = `<h2>Bienvenue ${formData.get('username')} !</h2>
                    <a href="/post" class="btn">Accéder aux posts</a>`;
                    form.parentNode.appendChild(msgDiv);
                } 
				else 
				{
                    let msgDiv = document.getElementById('message');
                    msgDiv.innerHTML = data.error || "Erreur inconnue";
                }
            });
        });
    }
});
