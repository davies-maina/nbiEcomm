 @extends('layouts.admin_layout.admin_layout')
 @section('content')
 
 <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" method="post" action="{{url('/admin/update_password')}}" name="updatePasswordForm">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin name</label>
                  <input type="email" class="form-control"  value="{{$adminDetails->name}}" id="admin_name" name="admin_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin type</label>
                  <input type="email" class="form-control" readonly value="{{$adminDetails->type}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" readonly value="{{$adminDetails->email}}" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" placeholder="current Password" id="current_pwd" name="current_pwd">
                    <span id="checkCurrentPassword"></span>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="new Password" id="new_pwd" name="new_pwd">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="confirm new Password" id="confirm_pwd" name="confirm_pwd">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection