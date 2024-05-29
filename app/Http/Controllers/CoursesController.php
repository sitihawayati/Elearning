<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // method untuk menampilkan data courses
    public function index(){
        // tarik data courses dari db
        $courses = Courses::all();

        // panggil view dan kirim data courses
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }

    // method untuk menampilkan form tambah courses
    public function create(){
        return view('admin.contents.courses.create');
    }

    // method untuk menyimpan data courses baru
    public function store(Request $request)
    {
        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        // simpan ke database 
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil menambahkan Courses');
    }

    // method untuk menampilkan form edit courses
    public function edit($id){
        // cari data courses berdasarkan id
        $course = Courses::find($id);

        // panggil view dan kirim data course
        return view('admin.contents.courses.edit', compact('course'));
    }

    // method untuk menyimpan hasil update 
    public function update($id, Request $request){
        // cari data courses berdasarkan id
        $course = Courses::find($id);

        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        // simpan perubahan
        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil mengupdate Courses');
    }

    // method untuk menghapus courses 
    public function destroy($id){
        // cari data course berdasarkan id
        $course = Courses::find($id);

        // hapus course
        $course->delete();

        // kembalikan ke halaman courses
        return redirect('/admin/courses')->with('message', 'Berhasil menghapus Courses');
    }
}
