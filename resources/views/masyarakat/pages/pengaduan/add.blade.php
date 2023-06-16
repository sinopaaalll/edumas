@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengaduan</h1>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Form Add Pengaduan</h4>
                    </div>
                    <form action="{{ route('pengaduans.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                   
                                    <div class="form-group">
                                        <label>Tulis Pengaduan*</label>
                                        <textarea name="deskripsi" class="@error('deskripsi') ? is-invalid @enderror" rows="10" style="width: 100%" required></textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Lokasi*</label>
                                        <textarea name="lokasi" class="@error('lokasi') ? is-invalid @enderror" rows="3" style="width: 100%" required></textarea>
                                        @error('lokasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                             <div class="form-group">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                <label>Kategori Pengaduan*</label>
                                                <select name="kategori" class="form-control" required>
                                                    <option value="{{ null }}" disabled selected>-- PILIH --</option>
                                                    @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Image*</label>
                                                <input type="file" class="form-control" name="image" required>
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit">
                                        <span class="fa fa-paper-plane"></span>
                                        Kirim Pengaduan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>                
        </div>
    </section>

    <x-Admin.SweetAlert/>

@endsection