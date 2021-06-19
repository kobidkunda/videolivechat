@extends('admin.base')
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Customer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Customer</h3>


          </div>

          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


          <form action="{{ route('admin.customer.add.save') }}" method="post">

            @csrf
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Full Name">
                      </div>

                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email address">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">User Type</label>
                    <select name="type" class="form-control" id="">
                        <option value="0">User</option>
                        <option value="1">Agent</option>
                    </select>
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="tel" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Phone">
                  </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="card-body">
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>



            <!-- /.row -->
          </div>
          <!-- /.card-body -->

        </div>

    </form>

      </div>
    </section>
  </div>



  @endsection
