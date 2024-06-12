@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Edit Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Courses</li>
        <li class="breadcrumb-item active">Edit Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
            <form action="/admin/courses/update/{{ $course->id}}" method="post">
                @csrf
                @method ('PUT')
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" category="form-control" value="{{ $course->name ?? ''}}">
                </div>
                
                <div class="mb-2">
                  <label for="category" class="form-label">Category</label>
                  <select name="category" id="category" class="form-select">
                      <option value="">Pilih Jurusan</option>
                      <option value="Teknik Informatika" {{ $course->category == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                      <option value="Sistem Informasi" {{ $course->category == 'Sistem Informasi' ? 'selected' : '' }} >Sistem Informasi</option>
                      <option value="Bisnis Digital" {{ $course->category == 'Bisnis digital' ? 'selected' : '' }} >Bisnis Digital</option>
                  </select>

              </div>

                <div class="mb-2">
                    <label for=desc class="form-label">Desc</label>
                    <input type="text" name=desc id=desc category="form-control" value="{{ $course->desc ?? ''}}">
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection