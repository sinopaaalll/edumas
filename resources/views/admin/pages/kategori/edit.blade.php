@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kategori Pengaduan</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Form Edit Kategori Pengaduan</h4>
                        <div class="card-header-action">
                            <a href="{{ route('kategoris.index') }}" class="btn btn-warning">
                               <i class="fa fa-undo"></i> Go Back
                            </a>
                        </div>
                    </div>
                    <form action="{{ route('kategoris.update', $kategori->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name*</label>

                                        <input type="text" name="name" class="form-control @error('name') ? is-invalid @enderror" required="" autofocus value="{{ $kategori->name }}">
                                        @error('name')

                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>                
        </div>
    </section>
@endsection