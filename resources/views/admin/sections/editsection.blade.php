@extends('layouts.admin_layout.admin_layout')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{$title}}</li>
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
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form name="sectionForm" id="sectionForm" 
      
      @if (empty($sectionData['id']))
         action="{{url('admin/add-edit-section')}}"  
      @else
          action="{{url('admin/add-edit-section/'.$sectionData['id'])}}"
      @endif
      method="post"
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
                      <label for="section_name">Section name</label>
                      <input type="text" class="form-control" placeholder="Section name" name="name"
                      @if (!empty($sectionData['name']))
                          value="{{$sectionData['name']}}"
                      @else
                  value="{{old('name')}}"
                      @endif
                      >
                  </div>

                  
              

                 
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="category_image">Category image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="section_image" name="section_image">
                        <label class="custom-file-label" for="section_image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                     
                    </div>
                     @if (!empty($sectionData['section_image']))
                      <div>
                    <img style="width: 100px;margin-top:5px;" 
                    src="{{asset('images/admin_images/section_images/'.$sectionData['section_image'])}}">
                    &nbsp; <a href="{{url('admin/delete-section-image/'.$sectionData['id'])}}" class="confirmDelete"
                    name="image">Delete</a>
                      </div>
                      @endif
                  </div>


                    
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              
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