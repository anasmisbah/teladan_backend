@extends('template.master')
@section('breadcumbs')
    <h1>
        Jadwal
    </h1>
    <ol class="breadcrumb">
        <li class="active">Jadwal</li>

    </ol>
@endsection
@section('content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Jadwal</h3>
                <a id="btn-add" class="btn btn-info btn-sm pull-right" href="{{ route('schedule.create') }}"><i class="fa fa-plus"></i> Tambah Jadwal</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="datatable-kategori" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jam Mulai</th>
                    <th>Jam Berakhir</th>
                    <th>Hari</th>
                    <th>Ruangan</th>
                    <th>Kelas</th>
                    <th>Dosen</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $schedule->start }}</td>
                        <td>{{ $schedule->end }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->room->name }}</td>
                        <td>{{ $schedule->classroom->name }}</td>
                        <td>{{ $schedule->lecturer->user->name }}</td>
                        <td>
                            <a data-toggle="modal"  href="{{route('schedule.edit',['schedule'=>$schedule])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <form style="display:inline;"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')"
                                action="{{route('schedule.destroy', $schedule)}}"
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
