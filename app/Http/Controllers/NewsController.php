<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    // Menampilkan daftar berita untuk pengunjung
    public function index()
    {
        $news = News::all();
        return view('index', compact('news'));
    }

    // Menampilkan form untuk membuat berita baru
    public function create()
    {
        return view('create-news');
    }

    // Menyimpan berita baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'release_date' => 'required|date',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;

            Log::info('Image path: ' . $imagePath);
        }

        $news->release_date = $request->release_date;
        $news->save();

        return redirect()->route('news.index')->with('success', 'Berita berhasil diunggah!');
    }

    // menampilkan daftar untuk admin
    public function adminIndex()
    {
        // Ambil daftar berita dari database
        $news = News::all();

        // Return view admin-news.blade.php dengan data berita
        return view('admin-news', compact('news'));
    }

    // Method untuk menampilkan form edit berita
    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('edit-news', compact('newsItem'));
    }

    // Method untuk memperbarui berita
    public function update(Request $request, $id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->update($request->all());
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    // Method untuk menghapus berita
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
