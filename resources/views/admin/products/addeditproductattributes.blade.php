@extends('layouts.admin_layout.admin_layout')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>{{$title}} for {{$productAttributesData->product_name}}</h1>
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
      <form name="categoryForm" id="categoryForm" class="form-inline"
      
      @if (empty($productAttributesData->attributes['id']))
         action="{{url('admin/add-edit-attributes/'.$productAttributesData['id'])}}"  
      @else
          action="{{url('admin/add-edit-attributes/'.$productAttributesData['id'].'/'.$productAttributesData->attributes['id'])}}"
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
              <div class="col-md-3">
              <input type="hidden" name="product_id" value="{{$productAttributesData['id']}}">
                  <div class="form-group">
                      <label for="product_attributes">Product code</label>
                  <input type="text" class="form-control" readonly value="{{$productAttributesData->product_code}}">
                      
                     
                  </div>
                   
                  
                  <div class="form-group">
                      <label for="product_attributes">Product color</label>
                  <input type="text" class="form-control" readonly value="{{$productAttributesData->product_color}}">
                      
                     
                  </div>
                  <div class="form-group">
                      <label for="product_attributes">Product desc</label>
                  <textarea class="form-control" readonly
                        
                        >
                         {{$productAttributesData->product_description}}
                      </textarea>
                      
                     
                  </div>
                 

                  
                
                  
                <!-- /.form-group -->
                  
              </div>
              <!-- /.col -->
              <div class="col-md-8">
                  <div class="form-group">
                      <label for="product_attributes">Attributes</label>
                  <div class="field_wrapper">
    <div>
        <input type="text" name="sku[]" id="sku" value=""/ class="form-control" placeholder="store keeping unit" required>
        <input type="text" name="size[]" id="size" value=""/ class="form-control" placeholder="size" required>
        <input type="text" name="price[]" id="price" value=""/ class="form-control" placeholder="price" required>
        <input type="text" name="stock[]" id="stock" value=""/ class="form-control" placeholder="stock" required>
        <a href="javascript:void(0);" class="add_button" title="Add field">+Add</a>
    </div>
</div>
                      
                     
                  </div>
                   
                 

                  
                
                  
                <!-- /.form-group -->
                  
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
          <div class="card-footer">
              <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
          </div>
         
        </div>
        <!-- /.card -->
      </form>
       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All attributes for {{$productAttributesData->product_name}} </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="section" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($productAttributesData['attributes'] as $attribute)
                    <tr>
                    <td>{{$attribute->id}}</td>
                  <td>{{$attribute->sku}}
                  </td>
                  <td>{{$attribute->size}}</td>
                  <td>{{$attribute->price}}</td>
                  <td>{{$attribute->stock}}</td>
                   <td>
                  
                  
                            

                                    <a href="{{url('/admin/delete-product-attributes/'.$attribute->id)}}" class="confirmDelete"
                                      name="attribute">Delete</a>
                                    

                  </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

         
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection