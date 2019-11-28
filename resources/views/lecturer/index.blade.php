@extends('template.master')
@section('breadcumbs')
    <h1>
        Dosen
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dosen</li>

    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Dosen</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right" href="{{ route('lecturer.create') }}"><i class="fa fa-plus"></i> Tambah Dosen</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="datatable-kategori" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>nip</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($lecturers as $lecturer)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $lecturer->nip }}</td>
                        <td>{{ $lecturer->user->name }}</td>
                        <td>{{ $lecturer->user->email }}</td>
                        <td><img src="{{ asset('/storage/'. $lecturer->user->avatar ) }}" alt="pict" width="50px"></td>
                        <td>
                            <a data-toggle="modal"  href="{{route('lecturer.edit',['lecturer'=>$lecturer])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <form style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')"
                                action="{{route('lecturer.destroy', $lecturer)}}"
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
