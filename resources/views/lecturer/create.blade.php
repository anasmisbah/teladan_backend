@extends('template.master')
@section('breadcumbs')
    <h1>
        Dosen
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dosen</li>
        <li>Tambah</li>
    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tambah Dosen</h3>
                 </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <form method="POST" action="{{ route('lecturer.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Dosen</label>
                            <input type="text" id="name" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Masukkan Nama Dosen">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="nip">NIP Dosen</label>
                            <input type="text" id="nip" class="form-control @error('nip')is-invalid @enderror" value="{{ old('nip') }}" name="nip" placeholder="Masukkan nip Dosen">
                            @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Dosen</label>
                            <input type="email" id="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Masukkan email Dosen">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">password Dosen</label>
                            <input type="password" id="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="Masukkan password Dosen">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">avatar Dosen</label>
                            <input type="file" id="avatar" class="form-control @error('avatar')is-invalid @enderror" name="avatar" placeholder="Masukkan avatar Dosen">
                            @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection
