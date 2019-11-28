@extends('template.master')
@section('breadcumbs')
    <h1>
        Mata Kuliah
    </h1>
    <ol class="breadcrumb">
        <li class="active">Mata Kuliah</li>

    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Mata Kuliah</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right" href="{{ route('subject.create') }}"><i class="fa fa-plus"></i> Tambah Mata Kuliah</a>
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
                  @foreach ($subjects as $subject)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            <a data-toggle="modal"  href="{{route('subject.edit',['subject'=>$subject])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <form style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')"
                                action="{{route('subject.destroy', $subject)}}"
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
