@extends('template.master')
@section('breadcumbs')
    <h1>
        Mata Kuliah
    </h1>
    <ol class="breadcrumb">
        <li class="active">Mata Kuliah</li>
        <li>Edit</li>
    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tambah Mata Kuliah</h3>
                 </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <form method="POST" action="{{ route('subject.update',['subject'=>$subject]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Mata Kuliah</label>
                            <input type="text" id="name" value="{{ $subject->name }}" class="form-control @error('name')is-invalid @enderror" name="name" placeholder="Masukkan nama Mata Kuliah">
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
