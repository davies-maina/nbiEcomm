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

                  
               {{--  <div id="appendCategoriesLevel">
                  @include('admin.products.append_categories_levelProduct')
                </div> --}}

                 
                <!-- /.form-group -->
                <div class="form-group">
                    <label for="product_image">Product image</label>
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

                  <div class="form-group">
                  <label>Select fabric</label>
                  <select class="form-control select2" style="width: 100%;" name="product_fabric" id="product_fabric">
                     <option value="">Select</option>
                   @foreach ($fabricArray as $fabric)
                  <option value="{{$fabric}}">{{$fabric}}</option>
                   @endforeach
                    
                   
                  </select>
                </div>

                <div class="form-group">
                  <label>Select Sleeve</label>
                  <select class="form-control select2" style="width: 100%;" name="product_sleeve" id="product_sleeve">
                     <option value="">Select</option>
                   @foreach ($sleeveArray as $sleeve)
                  <option value="{{$sleeve}}">{{$sleeve}}</option>
                   @endforeach
                    
                   
                  </select>
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
                  <div class="form-group">
                  <label>Select Occassion</label>
                  <select class="form-control select2" style="width: 100%;" name="product_occassion" id="product_occassion">
                     <option value="">Select</option>
                   @foreach ($occassionArray as $occassion)
                  <option value="{{$occassion}}">{{$occassion}}</option>
                   @endforeach
                    
                   
                  </select>
                </div>
                  <div class="form-group">
                      <label for="product_weight">Product weight</label>
                      <input type="text" class="form-control" placeholder="Product weight" name="product_weight"
                      id="product_weight"
                       @if (!empty($productData['product_weight']))
                          value="{{$productData['product_weight']}}"
                      @else
                  value="{{old('product_weight')}}"
                      @endif
                      >
                  </div>
                  <div class="form-group">
                        <label>Product washcare</label>
                        <textarea class="form-control" rows="5" placeholder="Enter ..." name="product_washcare"
                        
                        >
                         @if (!empty($productData['product_washcare']))
                          {{$productData['product_washcare']}}
                      @else
                  {{old('product_washcare')}}
                      @endif
                      </textarea>
                      </div>
                    </div>

                    
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                
                 <div class="form-group">
                  <label>Select category</label>
                  <select class="form-control select2" style="width: 100%;" name="category_id" id="category_id">
                     <option value="">Select</option>
                   @foreach ($categories as $section)
                  <optgroup label="{{$section['name']}}"></optgroup>
                  @foreach ($section['categories'] as $category)
                  <option value="{{$category['id']}}"
                  @if (!empty(old('category_id')) && $category['id']==old('category_id'))
                    selected=""    
                  @endif
                  >{{$category['category_name']}}</option>
                  @foreach ($category['subcategories'] as $subcategory)
                      <option value="{{$subcategory['id']}}"
                      @if (!empty(old('category_id')) && $subcategory['id']==old('category_id'))
                    selected=""    
                  @endif
                      >
                        &nbsp;&nbsp;&nbsp;&nbsp;->{{$subcategory['category_name']}}</option>
                  @endforeach
                  @endforeach
                   @endforeach
                    
                   
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                      <label for="product_code">Product code</label>
                      <input type="text" class="form-control" placeholder="Product code" name="product_code"
                      id="product_code"
                       @if (!empty($productData['product_code']))
                          value="{{$productData['product_code']}}"
                      @else
                  value="{{old('product_code')}}"
                      @endif
                      >
                  </div>
                  <div class="form-group">
                    <label for="product_video">Product video</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="product_video" name="product_video">
                        <label class="custom-file-label" for="product_video">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                     {{-- @if (!empty($productData['product_image']))
                      <div>
                    <img style="width: 100px;margin-top:5px;" 
                    src="{{asset('images/admin_images/product_images/'.$productData['product_image'])}}">
                      &nbsp; <a href="{{url('admin/delete-product-image/' .$productData['id'])}}" class="confirmDelete">Delete</a>
                      </div>
                      @endif --}}
                  </div>
                  <div class="form-group">
                  <label>Select Pattern</label>
                  <select class="form-control select2" style="width: 100%;" name="product_pattern" id="product_pattern">
                     <option value="">Select</option>
                   @foreach ($patternArray as $pattern)
                  <option value="{{$pattern}}">{{$pattern}}</option>
                   @endforeach
                    
                   
                  </select>
                </div>
                <div class="form-group">
                  <label>Select fit</label>
                  <select class="form-control select2" style="width: 100%;" name="product_fit" id="product_fit">
                     <option value="">Select</option>
                   @foreach ($fitArray as $fit)
                  <option value="{{$fit}}">{{$fit}}</option>
                   @endforeach
                    
                   
                  </select>
                </div>
                  <div class="form-group">
                      <label for="product_discount">Product discount %</label>
                      <input type="text" class="form-control" placeholder="Product discount" name="product_discount"
                      id="product_discount"
                       @if (!empty($productData['product_discount']))
                          value="{{$productData['product_discount']}}"
                      @else
                  value="{{old('product_discount')}}"
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
                      <input type="text" class="form-control" placeholder="Product color" name="product_color" id="product_color"
                       @if (!empty($productData['product_color']))
                          value="{{$productData['product_color']}}"
                      @else
                  value="{{old('product_color')}}"
                      @endif
                      >
                  </div>

                  <div class="form-group">
                      <label for="is_featured">Featured item</label>
                      <input type="checkbox" class="form-control" placeholder="Featured" name="is_featured" id="is_featured"
                       
                  value="1"
                      
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