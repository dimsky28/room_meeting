<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Category;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // Menampilkan daftar semua ruangan
    public function index()
    {
        $rooms = Room::all();
        return view('room', ['rooms' => $rooms]);
    }

    // Menampilkan halaman tambah ruangan
    public function add()
    {
        $categories = Category::all();
        return view('room-add', ['categories' => $categories]);
    }

    // Menyimpan ruangan baru ke dalam penyimpanan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_name'     => 'required|unique:rooms|max:255',
            'capacity'      => 'required|max:255',
            'description'   => 'required|max:1000',
            'address'       => 'required|max:255',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $newName = '';
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->room_name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('public/cover', $newName);
        }

        $request['cover'] = $newName;

        $room = Room::create($request->all());
        $room->categories()->sync($request->categories);

        return redirect('rooms')->with('status', 'Tambah Ruangan Berhasil');
    }

    // Menampilkan halaman edit ruangan
    public function edit($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $categories = Category::all();

        return view('room-edit', ['categories' => $categories, 'room' => $room]);
    }

    // Memperbarui informasi ruangan di penyimpanan
    public function update(Request $request, $slug)
    {
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->room_name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('public/cover', $newName);
            $request['cover'] = $newName;
        }

        $room = Room::where('slug', $slug)->first();
        $room->update($request->all());

        if($request->categories) {
            $room->categories()->sync($request->categories);
        }

        return redirect('rooms')->with('status', 'Edit Ruangan Berhasil');
    }

    // Menampilkan halaman konfirmasi hapus ruangan
    public function delete($slug)
    {
        $room = Room::where('slug', $slug)->first();
        return view('room-delete', ['room' => $room]);
    }

    // Menghapus ruangan dari penyimpanan
    public function destroy($slug)
    {
        $room = Room::where('slug', $slug)->first();
        $room->delete();
        return redirect('rooms')->with('status', 'Hapus Ruangan Berhasil');
    }

    // Menampilkan daftar ruangan yang telah dihapus
    public function deletedRoom()
    {
        $deletedRooms = Room::onlyTrashed()->get();
        return view('room-deleted-list', ['deletedRooms' => $deletedRooms]);
    }

    // Mengembalikan ruangan yang telah dihapus ke status aktif
    public function restore($slug)
    {
        $room = Room::withTrashed()->where('slug', $slug)->first();
        $room->restore();
        return redirect('rooms')->with('status', 'Kembalikan Ruangan Berhasil');
    }

    // Menampilkan daftar ruangan berdasarkan kategori
    public function list(Request $request)
    {
        $categories = Category::all();

        if ($request->title) {
            $rooms = Room::where('room_name', 'like', '%'.$request->title.'%')->get();
        } else {
            $rooms = Room::all();
        }

        return view('room-list', ['rooms' => $rooms, 'categories' => $categories]);
    }

}
