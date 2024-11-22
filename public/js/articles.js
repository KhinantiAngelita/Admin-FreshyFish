let allArticles = []; // Variabel untuk menyimpan semua artikel yang diambil dari API

function loadArticles() {
    const token = localStorage.getItem('token');
    if (!token) {
        Swal.fire({
            icon: 'error',
            title: 'Autentikasi Gagal',
            text: 'User tidak terautentikasi!',
        });
        console.error('Autentikasi gagal: Token tidak ditemukan di localStorage');
        return;
    }

    fetch('https://freshyfishapi.ydns.eu/api/articles', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json',
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Gagal memuat artikel.');
        }
        return response.json();
    })
    .then(data => {
        allArticles = data.articles;  // Simpan semua artikel ke dalam variabel global
        renderArticles(allArticles);  // Render artikel pertama kali
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: 'Gagal memuat artikel.',
        });
    });
}

function renderArticles(articles) {
    const articlesContainer = document.getElementById('articlesList');
    articlesContainer.innerHTML = '';  // Kosongkan kontainer artikel terlebih dahulu

    articles.forEach(article => {
        const articleElement = document.createElement('div');
        articleElement.classList.add('article-card');
        articleElement.dataset.title = article.title.toLowerCase();
        articleElement.innerHTML = `
            <div>
                <h5>${article.title}</h5>
                <p><strong>Kategori:</strong> ${article.category_content}</p>
                <p>${article.content.substring(0, 100)}...</p>
            </div>
            <div class="actions">
                <a href="/articles/edit/${article.id}" class="btn-edit">Edit</a>
                <a href="/articles/delete/${article.id}" class="btn-delete">Hapus</a>
            </div>
        `;
        articlesContainer.appendChild(articleElement);
    });
}

loadArticles(); // Panggil fungsi saat halaman dimuat
