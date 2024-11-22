<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('auth.login');

    Route::get('/create', function () {
        return view('auth.create');
    })->name('auth.create');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/toko', function () {
    return view('toko.index');
})->name('toko.index');

Route::prefix('produk')->group(function () {
    Route::get('/show', function () {
        return view('produk.show');
    })->name('produk.show');

    Route::get('/create', function () {
        return view('produk.create');
    })->name('produk.create');

    Route::get('/list', function () {
        return view('produk.list');
    })->name('produk.list');
});

// Route untuk halaman edit produk berdasarkan ID
Route::get('/produk/edit/{id}', function ($id) {
    return view('produk.edit', ['id' => $id]);
})->name('produk.edit');

Route::get('/produk/export', function () {
    return Excel::download(new ProdukExport, 'produk.xlsx');
});

Route::get('/pesanan/show', function () {
    return view('pesanan.show');
})->name('pesanan.show');


Route::get('/articles', function () {
    $filePath = resource_path('articles.json');

    if (!File::exists($filePath)) {
        File::put($filePath, json_encode([], JSON_PRETTY_PRINT));
    }

    $articles = json_decode(File::get($filePath), true);

    $categories = collect($articles)->groupBy('category_content')->keys();

    return view('articles.categories', compact('categories'));
})->name('articles.index');

// Penambahan Route untuk artikel per kategori
Route::get('/articles/category/{category}', function ($category) {
    $filePath = resource_path('articles.json');

    // Ambil artikel dari file JSON
    $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];

    // Filter artikel berdasarkan kategori
    $filteredArticles = collect($articles)->filter(function ($article) use ($category) { // DITAMBAHKAN
        return strtolower($article['category_content']) === strtolower($category); // DITAMBAHKAN
    });

    return view('articles.index', ['articles' => $filteredArticles, 'category' => $category]); // DITAMBAHKAN
})->name('articles.byCategory');


Route::get('/articles/create', function () {
    return view('articles.create');
})->name('articles.create');

Route::post('/articles', function (Request $request) {
    $filePath = resource_path('articles.json');

    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'category_content' => 'required|string|max:100',
        'content' => 'required|min:10',
    ]);

    $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];

    $articles[] = [
        'id' => uniqid(),
        'title' => $validatedData['title'],
        'category_content' => $validatedData['category_content'],
        'content' => $validatedData['content'],
        'author' => session()->get('user_id', 'guest'),
        'created_at' => now()->toDateTimeString(),
    ];

    File::put($filePath, json_encode($articles, JSON_PRETTY_PRINT));

    return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
})->name('articles.store');

Route::get('/articles/{id}/edit', function ($id) {
    $filePath = resource_path('articles.json');

    $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];
    $article = collect($articles)->firstWhere('id', $id);

    if (!$article) {
        return redirect()->route('articles.index')->with('error', 'Artikel tidak ditemukan!');
    }

    return view('articles.edit', compact('article', 'id'));
})->name('articles.edit');

Route::post('/articles/{id}/update', function (Request $request, $id) {
    $filePath = resource_path('articles.json');

    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'category_content' => 'required|string|max:100',
        'content' => 'required|min:10',
    ]);

    $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];

    foreach ($articles as &$article) {
        if ($article['id'] == $id) {
            $article['title'] = $validatedData['title'];
            $article['category_content'] = $validatedData['category_content'];
            $article['content'] = $validatedData['content'];
            $article['updated_at'] = now()->toDateTimeString();
            break;
        }
    }

    File::put($filePath, json_encode($articles, JSON_PRETTY_PRINT));

    return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
})->name('articles.update');

Route::get('/articles/{id}/delete', function ($id) {
    $filePath = resource_path('articles.json');

    $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];

    $articles = array_filter($articles, fn($article) => $article['id'] != $id);

    File::put($filePath, json_encode($articles, JSON_PRETTY_PRINT));

    return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
})->name('articles.delete');
