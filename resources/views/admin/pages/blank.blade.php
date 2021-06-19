@extends('admin.base')
@section('contents')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Customer</li>
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
          <h3 class="card-title">All Customer</h3>

          <div class="card-tools">


          </div>
        </div>
        <div class="card-body">


            <table class="table table-striped table-bordered table-responsive" id="product-table" style="width: 100%">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>TYPE</th>
                    <th>PIC</th>

                    <th>IP</th>
                    <th>ACTIVE</th>
                    <th>BALANCE</th>
                    <th>ACTION</th>
                    

                </tr>
                </thead>
            </table>






        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a href="{{ route('admin.customer.add') }}" class="btn btn-primary btn-primary">Add User</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection


@section('footer')

<script>
    $(function() {
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('admin.customer.list.all') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'phone', name: 'phone' },
                { data: 'type', name: 'type' },
                { data: 'prof_pic', name: 'prof_pic' },
                { data: 'ip', name: 'ip' },
                { data: 'active', name: 'active' },
                { data: 'balance', name: 'balance' },
                {data: 'action', name: 'action', orderable: false, searchable: false},





            ]
        });

    });
</script>


@endsection
