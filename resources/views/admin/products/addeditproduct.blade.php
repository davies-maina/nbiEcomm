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
      
      @if (empty($productData['id']))
         action="{{url('admin/add-edit-product')}}"  
      @else
          action="{{url('admin/add-edit-product/'.$productData['id'])}}"
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
                      <label for="category_name">Product name</label>
                      <input type="text" class="form-control" placeholder="Product name" name="product_name"
                      @if (!empty($productData['product_name']))
                          value="{{$productData['product_name']}}"
                      @else
                  value="{{old('product_name')}}"
                      @endif
                      >
                  </div>

                  
                <div id="appendCategoriesLevel">
                  @include('admin.products.append_categories_levelProduct')
                </div>

                 
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="category_image">Product image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="product_image" name="product_image">
                        <label class="custom-file-label" for="product_image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                     @if (!empty($productData['product_image']))
                      <div>
                    <img style="width: 100px;margin-top:5px;" 
                    src="{{asset('images/admin_images/product_images/'.$productData['product_image'])}}">
                      &nbsp; <a href="{{url('admin/delete-product-image/' .$productData['id'])}}" class="confirmDelete">Delete</a>
                      </div>
                      @endif
                  </div>

                  <div class="col-sm-6">
                       <div class="form-group">
                      <label for="product_price">Product price</label>
                      <input type="number" class="form-control" placeholder="Product price" name="product_price" id="product_price"
                       @if (!empty($productData['product_price']))
                          value="{{$productData['product_price']}}"
                      @else
                  value="{{old('product_price')}}"
                      @endif
                      >
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
                        <option value="{{$section->id}}" @if (!empty($productData['section_id'])
                          && $productData['section_id']==$section->id) selected @endif>
                            {{$section->name}}</option>
                       
                            
                        
                    @endforeach
                    
                   
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                      <label for="category_discount">Product code</label>
                      <input type="text" class="form-control" placeholder="Product code" name="product_code"
                      id="product_code"
                       @if (!empty($productData['product_code']))
                          value="{{$productData['product_code']}}"
                      @else
                  value="{{old('product_code')}}"
                      @endif
                      >
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Product description</label>
                        <textarea class="form-control" rows="5" placeholder="Enter ..." name="product_description"
                        
                        >
                         @if (!empty($productData['product_description']))
                          {{$productData['product_description']}}
                      @else
                  {{old('product_description')}}
                      @endif
                      </textarea>
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="category_url">Product color</label>
                      <input type="text" class="form-control" placeholder="Product color" name="product color" id="product_color"
                       @if (!empty($productData['product_color']))
                          value="{{$productData['product_color']}}"
                      @else
                  value="{{old('product_color')}}"
                      @endif
                      >
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