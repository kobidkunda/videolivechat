@extends('admin.base')
@section('contents')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $user->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $user->name }}</h3>

          <div class="card-tools">

            </button>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4 ">
                  <div class="info-box bg-light">
                    <div class="info-box-content block-fixed-prof">
                      <span class="info-box-text text-center text-muted">Balance</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $user->balance }}</span>
                      <button class="btn btn-primary btn-xs">Recharge</button>
                      <br>
                      <button data-toggle="modal" data-target="#modal-password-change" class="btn btn-info btn-xs">Password Reset</button>
                      <br>
                      <button class="btn btn-danger btn-xs">Delete</button>
                      <br>
                      <button data-toggle="modal" data-target="#modal-asign-user"  class="btn btn-secondary btn-xs">Asign User</button>



                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4 ">
                  <div class="info-box bg-light">
                    <div class="info-box-content block-fixed-prof">
                        @if ($user->prof_pic = 'null')

                        <img class="image-center-prof" src="https://via.placeholder.com/150" width="100">

                        @else
                      <img class="image-center-prof" src="{{ $user->prof_pic }}" width="100">
                      @endif
                      <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-default" >Upload</button>

                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4 ">
                  <div class="info-box bg-light">
                    <div class="info-box-content block-fixed-prof">
                      <span class="info-box-text text-center text-muted">{{ $user->name }}</span>
                      <span class="info-box-text text-center text-muted">{{ $user->phone }}</span>
                      <span class="info-box-text text-center text-muted">{{ $user->email }}</span>

                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-12 col-md-12 col-lg-12 order-1 order-md-12">

                <div class="card-body">


                    <table class="table table-striped table-bordered table-responsive" id="product-table" style="width: 100%">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>UUID</th>
                            <th>USER </th>
                            <th>AGENT</th>
                            <th>SCHEDULE TIME</th>
                            <th>START TIME</th>

                            <th>END TIME</th>
                            <th>STATUS</th>
                            <th>CREDIT USED</th>
                            <th>TIME</th>
                            <th>ACTION</th>


                        </tr>
                        </thead>
                    </table>






                </div>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<style>
    .image-center-prof{
        width: 60%;
  margin: auto;
  display: block;
    }
    .block-fixed-prof{
        min-height: 250px;
    }
</style>



<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload Images</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form action="{{ route('admin.customer.add.profile.save') }}"
            method="post" enctype="multipart/form-data"
            class="dropzone"
            id="my-awesome-dropzone">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        </form>


        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>




<div class="modal fade" id="modal-password-change">
    <div class="modal-dialog modal-default">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Password Update</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form action="{{ route('admin.customer.password.update') }}"
            method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="form-group">
            <label for="exampleInputEmail1">New Password </label>
            <input type="text" name="password"
            class="form-control" id="exampleInputEmail1"
            placeholder="New Password">
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
        </form>


        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>

<div class="modal fade" id="modal-asign-user">
    <div class="modal-dialog modal-default">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Asign user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <form action="{{ route('admin.customer.chat.add.save') }}" method="post">

                @csrf
                <div class="form-group">

                    <div class="form-group">

                        <select name="agent_id" class="form-control">
                            @foreach ($agents as $agent)

                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>

                            @endforeach

                            <input type="hidden" value="{{ $user->id }}" name="user_id" id="">



                            <div class="form-group">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Time of chat</label>
                                    <input type="text" name="schedule_time"
                                    class="form-control" id="exampleInputEmail1"
                                    placeholder="Time of chat">
                                  </div>

                            </div>

                        </select>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>



        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>


  @endsection

  @section('footer')

  <link rel="stylesheet" href="{{ asset('admin/plugins/dropzone/min/dropzone.min.css') }}">


  <script src="{{ asset('admin/plugins/dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>

  <script>
      var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone",{
    maxFilesize: 3,  // 3 mb
    acceptedFiles: ".jpeg,.jpg,.png,.pdf",
});
myDropzone.on("sending", function(file, xhr, formData) {
   formData.append("_token", CSRF_TOKEN);
});
  </script>


@section('footer')

<script>
    $(function() {
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.customer.list.video.chat.list') }}',
            columns: [


                { data: 'id', name: 'id' },
                { data: 'uuid', name: 'uuid' },
                { data: 'user_id', name: 'user_id' },
                { data: 'agent_id', name: 'agent_id' },
                { data: 'schedule_time', name: 'schedule_time' },
                { data: 'start_time', name: 'start_time' },
                { data: 'end_time', name: 'end_time' },
                { data: 'status', name: 'status' },
                { data: 'credits', name: 'credits' },
                { data: 'created_at', name: 'created_at' },
                {data: 'action', name: 'action', orderable: false, searchable: false},



            ]
        });

    });
</script>




  @endsection
