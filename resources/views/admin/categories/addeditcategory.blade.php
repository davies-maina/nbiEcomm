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
      <form name="categoryForm" id="categoryForm" 
      
      @if (empty($categoryData['id']))
         action="{{url('admin/add-edit-category')}}"  
      @else
          action="{{url('admin/add-edit-category/'.$categoryData['id'])}}"
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
                      <label for="category_name">Category name</label>
                      <input type="text" class="form-control" placeholder="Category name" name="category_name"
                      @if (!empty($categoryData['category_name']))
                          value="{{$categoryData['category_name']}}"
                      @else
                  value="{{old('category_name')}}"
                      @endif
                      >
                  </div>

                  
                <div id="appendCategoriesLevel">
                  @include('admin.categories.append_categories_level')
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
                        <textarea class="form-control" rows="5" placeholder="Enter ..." name="meta_title"
                        id="meta_title"
                         
                        >
                         @if (!empty($categoryData['meta_title']))
                          {{$categoryData['meta_title']}}
                      @else
                  {{old('meta_title')}}
                      @endif
                      </textarea>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Meta keywords</label>
                        <textarea class="form-control" rows="5" placeholder="Enter ..."
                        name="meta_keywords">
                       @if (!empty($categoryData['meta_keywords']))
                          {{$categoryData['meta_keywords']}}
                      @else
                  {{old('meta_keywords')}}
                      @endif
                      </textarea>
                      </div>
                    </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                 <div class="form-group">
                  <label>Select Section</label>
                  <select class="form-control select2" style="width: 100%;" name="section_id" id="section_id">
                     <option selected disabled>Select</option>
                    @foreach ($sections as $section)
                        <option value="{{$section->id}}" @if (!empty($categoryData['section_id'])
                          && $categoryData['section_id']==$section->id) selected @endif>
                            {{$section->name}}</option>
                       
                            
                        
                    @endforeach
                    
                   
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                      <label for="category_discount">Category discount</label>
                      <input type="text" class="form-control" placeholder="Category discount" name="category_discount"
                      id="category_discount"
                       @if (!empty($categoryData['category_discount']))
                          value="{{$categoryData['category_discount']}}"
                      @else
                  value="{{old('category_discount')}}"
                      @endif
                      >
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Category description</label>
                        <textarea class="form-control" rows="5" placeholder="Enter ..." name="category_desc"
                        
                        >
                         @if (!empty($categoryData['description']))
                          {{$categoryData['description']}}
                      @else
                  {{old('description')}}
                      @endif
                      </textarea>
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="category_url">Category url</label>
                      <input type="text" class="form-control" placeholder="Category url" name="category_url" id="category_url"
                       @if (!empty($categoryData['url']))
                          value="{{$categoryData['url']}}"
                      @else
                  value="{{old('url')}}"
                      @endif
                      >
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Meta description</label>
                        <textarea class="form-control" rows="5" placeholder="Enter ..." name="meta_desc" id="meta_desc"
                        
                        >
                         @if (!empty($categoryData['meta_description']))
                          {{$categoryData['meta_description']}}
                      @else
                  {{old('meta_description')}}
                      @endif
                      </textarea>
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