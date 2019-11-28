@extends('template.master')
@section('breadcumbs')
    <h1>
        Ruangan
    </h1>
    <ol class="breadcrumb">
        <li class="active">Ruangan</li>
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
                <h3 class="box-title">Tambah Ruangan</h3>
                 </div>
              <!-- /.box-header -->
              <div class="box-body">
                    <form method="POST" action="{{ route('schedule.update',['schedule'=>$schedule]) }}">
                        @method('PUT')
                        @csrf
                        <div class="bootstrap-timepicker">
                                <div class="form-group">
                                  <label>Jam Mulai:</label>

                                  <div class="input-group">
                                    <input name="start" value="{{$schedule->start}}" type="text" class="form-control timepicker">

                                    <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                    </div>
                                  </div>
                                  <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                              </div>
                              <div class="bootstrap-timepicker">
                                <div class="form-group">
                                  <label>Jam Berakhir:</label>

                                  <div class="input-group">
                                    <input name="end" value="{{$schedule->end}}" type="text" class="form-control timepicker">

                                    <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                    </div>
                                  </div>
                                  <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                              </div>
                              <div class="form-group">
                                <label for="avatar">Hari</label>
                                <select class="form-control" name="day">
                                    <option value="senin" {{ $schedule->day === "senin" ?'selected' :''}}>senin</option>
                                    <option value="selasa" {{ $schedule->day === "selasa" ?'selected' :''}}>selasa</option>
                                    <option value="rabu" {{ $schedule->day === "rabu" ?'selected' :''}}>rabu</option>
                                    <option value="kamis" {{ $schedule->day === "kamis" ?'selected' :''}}>kamis</option>
                                    <option value="jumat" {{ $schedule->day === "jumat" ?'selected' :''}}>jumat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Ruangan</label>
                                <select class="form-control" name="room_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{$room->id}}" {{ $schedule->room_id == $room->id ?'selected' :''}}>{{$room->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Kelas</label>
                                <select class="form-control" name="classroom_id">
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{$classroom->id}}" {{ $schedule->classroom_id == $classroom->id ?'selected' :''}}>{{$classroom->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Mata Kuliah</label>
                                <select class="form-control" name="subject_id">
                                    @foreach ($subjects as $subject)
                                        <option value="{{$subject->id}}" {{ $schedule->subject_id == $subject->id ?'selected' :''}}>{{$subject->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Dosen</label>
                                <select class="form-control" name="lecturer_id">
                                    @foreach ($lecturers as $lecturer)
                                        <option value="{{$lecturer->id}}" {{ $schedule->lecturer_id == $lecturer->id ?'selected' :''}}>{{$lecturer->user->name}}</option>
                                    @endforeach
                                </select>
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
@push('script')
<script>
//Timepicker
$('.timepicker').timepicker({
      showInputs: false,
      showMeridian: false,
      minuteStep: 5,
      defaultTim:false,
    })
</script>
@endpush
