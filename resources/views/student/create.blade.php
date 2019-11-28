@extends('template.master')
@section('breadcumbs')
    <h1>
        Mahasiswa
    </h1>
    <ol class="breadcrumb">
        <li class="active">Mahasiswa</li>
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
                <h3 class="box-title">Tambah Mahasiswa</h3>
                 </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Mahasiswa</label>
                            <input type="text" id="name" class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Masukkan Nama Mahasiswa">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM Mahasiswa</label>
                            <input type="text" id="nim" class="form-control @error('nim')is-invalid @enderror" value="{{ old('nim') }}" name="nim" placeholder="Masukkan nim Mahasiswa">
                            @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Mahasiswa</label>
                            <input type="email" id="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Masukkan email Mahasiswa">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">password Mahasiswa</label>
                            <input type="password" id="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="Masukkan password Mahasiswa">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">avatar Mahasiswa</label>
                            <input type="file" id="avatar" class="form-control @error('avatar')is-invalid @enderror" name="avatar" placeholder="Masukkan avatar Mahasiswa">
                            @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <label for="avatar">Kelas Mahasiswa</label>
                                <select class="form-control" name="classroom_id">
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                    @endforeach
                                </select>
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
