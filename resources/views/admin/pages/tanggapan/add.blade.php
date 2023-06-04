<div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Beri Tanggapan</h4>
                    </div>
                    <form action="{{ route('tanggapans') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                   
                                    <div class="form-group">
                                        <label>Tulis Tanggapan*</label>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                                        <textarea name="deskripsi" class="@error('deskripsi') ? is-invalid @enderror" rows="10" style="width: 100%" required>{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" @checked(old('status') === 'proses') name="status" type="radio"  id="exampleRadios1" value="proses">
                                            <label class="form-check-label" for="exampleRadios1">
                                            Proses
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" @checked(old('status') === 'ditolak') name="status" type="radio"  id="exampleRadios2" value="ditolak">
                                            <label class="form-check-label"  for="exampleRadios2">
                                            Tolak
                                            </label>
                                        </div>
                                        @error('status')
                                            <div class="invalid-feedback d-inline">
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
                                    <button class="btn btn-primary" type="submit">
                                        <span class="fa fa-pen"></span>
                                        Tanggapi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>                
        </div>