@extends('layouts.admin_layout.admin_layout')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         @if (Session::has('success_message'))
       <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:10px;">
       <strong>{{Session::get('success_message')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
       </div>

   @endif
      <form name="categoryForm" id="categoryForm" action="{{url('admin/add-edit-category')}}" method="post"
      enctype="multipart/form-data">
      @csrf
        <div class="card card-default">

          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="category_name">Category name</label>
                      <input type="text" class="form-control" placeholder="Category name" name="category_name">
                  </div>
                <div class="form-group">
                  <label>Select Section</label>
                  <select class="form-control select2" style="width: 100%;" name="section_id" id="section_id">
                    
                    @foreach ($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                    
                   
                  </select>
                </div>

                 
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="category_image">Category image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="category_image" name="category_image">
                        <label class="custom-file-label" for="category_image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Meta title</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_title"
                        id="meta_title"></textarea>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Meta keywords</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..."
                        name="meta_kwords" id="meta_kwords"></textarea>
                      </div>
                    </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Select category level</label>
                  <select class="form-control select2" style="width: 100%;" name="parent_id"  id="parent_id">
                    <option value="0">Main Category</option>
                   
                    
                   
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                      <label for="category_discount">Category discount</label>
                      <input type="text" class="form-control" placeholder="Category discount" name="category_discount"
                      id="category_discount">
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Category description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="category_desc"
                        id="category_desc"
                        ></textarea>
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="category_url">Category url</label>
                      <input type="text" class="form-control" placeholder="Category url" name="category_url" id="category_url">
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Meta description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_desc" id="meta_desc"></textarea>
                      </div>
                    </div>
                <!-- /.form-group -->
                  
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
              <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
          </div>
         
        </div>
        <!-- /.card -->
      </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection