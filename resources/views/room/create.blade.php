@extends('template.master')
@section('breadcumbs')
    <h1>
        Ruangan
    </h1>
    <ol class="breadcrumb">
        <li class="active">Ruangan</li>
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
                <h3 class="box-title">Tambah Ruangan</h3>
                 </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <form method="POST" action="{{ route('room.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Ruangan</label>
                            <input type="text" id="name" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Masukkan nama Ruangan">
                            @error('name')
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
