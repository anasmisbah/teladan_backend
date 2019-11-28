@extends('template.master')
@section('breadcumbs')
    <h1>
        Mahasiswa
    </h1>
    <ol class="breadcrumb">
        <li class="active">Mahasiswa</li>

    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Mahasiswa</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right" href="{{ route('student.create') }}"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="datatable-kategori" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>nim</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td><img src="{{ asset('/storage/'. $student->user->avatar ) }}" alt="pict" width="50px"></td>
                        <td>
                            <a data-toggle="modal"  href="{{route('student.edit',['student'=>$student])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <form style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')"
                                action="{{route('student.destroy', $student)}}"
                                method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" value="Delete">
                                            <i class="fa fa-trash-o"></i></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                  </thead>
                </table>
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
