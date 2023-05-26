@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Petugas</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Form Add Petugas</h4>
                        <div class="card-header-action">
                            <a href="{{ route('users.index') }}" class="btn btn-warning">
                               <i class="fa fa-undo"></i> Go Back
                            </a>
                        </div>
                    </div>
                    <form action="">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" class="form-control {{-- is-valid --}}" value="" required="" autofocus>
                                        {{-- <div class="valid-feedback">Good job!</div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control {{-- is-valid --}}" value="" required="">
                                        {{-- <div class="valid-feedback">Good job!</div> --}}
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password*</label>
                                                <input type="password" class="form-control {{-- is-valid --}}" value="" required="">
                                                {{-- <div class="valid-feedback">Good job!</div> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password*</label>
                                                <input type="password" class="form-control {{-- is-valid --}}" value="" required="">
                                                {{-- <div class="valid-feedback">Good job!</div> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="d-block">Role*</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" >
                                                    <label class="form-check-label" for="exampleRadios1">
                                                    Admin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" >
                                                    <label class="form-check-label" for="exampleRadios2">
                                                    Petugas
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>                
        </div>
    </section>
@endsection