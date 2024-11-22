// let allArticles = []; // Variabel untuk menyimpan semua artikel yang diambil dari API

// function loadArticles() {
//     const token = localStorage.getItem('token');
//     if (!token) {
//         Swal.fire({
//             icon: 'error',
//             title: 'Autentikasi Gagal',
//             text: 'User tidak terautentikasi!',
//         });
//         console.error('Autentikasi gagal: Token tidak ditemukan di localStorage');
//         return;
//     }

//     fetch('https://freshyfishapi.ydns.eu/api/articles', {
//         method: 'GET',
//         headers: {
//             'Authorization': 'Bearer ' + token,
//             'Accept': 'application/json',
//         },
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Gagal memuat artikel.');
//         }
//         return response.json();
//     })
//     .then(data => {
//         allArticles = data.articles;  // Simpan semua artikel ke dalam variabel global
//         renderArticles(allArticles);  // Render artikel pertama kali
//     })
//     .catch(error => {
//         console.error('Error:', error);
//         Swal.fire({
//             icon: 'error',
//             title: 'Terjadi Kesalahan',
//             text: 'Gagal memuat artikel.',
//         });
//     });
// }

// function renderArticles(articles) {
//     const articlesContainer = document.getElementById('articlesList');
//     articlesContainer.innerHTML = '';  // Kosongkan kontainer artikel terlebih dahulu

//     articles.forEach(article => {
//         const articleElement = document.createElement('div');
//         articleElement.classList.add('article-card');
//         articleElement.dataset.title = article.title.toLowerCase();
//         articleElement.innerHTML = `
//             <div>
//                 <h5>${article.title}</h5>
//                 <p><strong>Kategori:</strong> ${article.category_content}</p>
//                 <p>${article.content.substring(0, 100)}...</p>
//             </div>
//             <div class="actions">
//                 <a href="/articles/edit/${article.id}" class="btn-edit" data-id="${article.id}">Edit</a>
//                 <a href="/articles/delete/${article.id}" class="btn-delete" data-id="${article.id}">Hapus</a>
//             </div>
//         `;
//         articlesContainer.appendChild(articleElement);
//     });

//     // Tambahkan event listener untuk tombol edit dan delete
//     document.querySelectorAll('.btn-edit').forEach(button => {
//         button.addEventListener('click', handleEdit);
//     });
//     document.querySelectorAll('.btn-delete').forEach(button => {
//         button.addEventListener('click', handleDelete);
//     });
// }

// // Fungsi untuk menangani klik tombol edit
// function handleEdit(event) {
//     event.preventDefault(); // Mencegah perilaku default
//     const articleId = event.target.dataset.id;
//     window.location.href = `/articles/edit/${articleId}`; // Redirect ke halaman edit artikel dengan ID
// }

// // Fungsi untuk menangani klik tombol delete
// function handleDelete(event) {
//     const articleId = event.target.dataset.id;
//     const token = localStorage.getItem('token');
//     if (!token) {
//         Swal.fire({
//             icon: 'error',
//             title: 'Autentikasi Gagal',
//             text: 'User tidak terautentikasi!',
//         });
//         console.error('Autentikasi gagal: Token tidak ditemukan di localStorage');
//         return;
//     }

//     Swal.fire({
//         title: 'Yakin ingin menghapus?',
//         text: 'Artikel ini akan dihapus secara permanen.',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#d33',
//         cancelButtonColor: '#3085d6',
//         confirmButtonText: 'Ya, hapus!',
//     }).then(result => {
//         if (result.isConfirmed) {
//             fetch(`https://freshyfishapi.ydns.eu/api/articles/${articleId}`, {
//                 method: 'DELETE',
//                 headers: {
//                     'Authorization': 'Bearer ' + token,
//                 },
//             })
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error('Gagal menghapus artikel.');
//                 }
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Berhasil!',
//                     text: 'Artikel berhasil dihapus.',
//                 });
//                 loadArticles(); // Refresh daftar artikel
//             })
//             .catch(error => {
//                 console.error('Error:', error);
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Gagal!',
//                     text: 'Terjadi kesalahan saat menghapus artikel.',
//                 });
//             });
//         }
//     });
// }

// // Panggil fungsi loadArticles saat halaman dimuat
// loadArticles();
