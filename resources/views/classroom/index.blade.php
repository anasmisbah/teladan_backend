@extends('template.master')
@section('breadcumbs')
    <h1>
        Kelas
    </h1>
    <ol class="breadcrumb">
        <li class="active">Kelas</li>

    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Kelas</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right" href="{{ route('classroom.create') }}"><i class="fa fa-plus"></i> Tambah Kelas</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="datatable-kategori" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($classrooms as $classroom)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $classroom->name }}</td>
                        <td>
                            <a data-toggle="modal"  href="{{route('classroom.edit',['classroom'=>$classroom])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <form style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')"
                                action="{{route('classroom.destroy', $classroom)}}"
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
