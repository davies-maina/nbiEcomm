@extends('layouts.admin_layout.admin_layout');

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <category class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </category>

    <!-- Main content -->
    <category class="content">
      <div class="row">
        <div class="col-12">
         

          <div class="card">
             @if (Session::has('success_message'))
       <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:10px;">
       <strong>{{Session::get('success_message')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
       </div>

   @endif
            <div class="card-header">
              <h3 class="card-title">Products</h3>
              <a href="{{url('/admin/add-edit-product')}}" class="btn btn-block btn-success" style="max-width:150px;float:right;display:inline-block">Add Product</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="product" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Section</th>
                  <th>Category</th>
                  <th>Code</th>
                   <th>Color</th>
                   <th>Price</th>
                    <th>Status</th>
                   <th>Actions</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  {{--  --}}
                  
                      <tr>
                      <td>{{$product->id}}</td>
                  <td>{{$product->product_name}}
                  </td>
                  <td>{{$product->section->name}}</td>
                  <td>{{$product->category->category_name}}</td>
                <td>{{$product->product_code}}</td>
                <td>{{$product->product_color}}</td>
                
                  <td>{{$product->product_price}}</td>
                  
                  <td>
                    @if ($product->status==1)
                  <a href="javascript:void(0)" 
                  class="updateProductStatus" 
                  id="product-{{$product->id}}" 
                  product_id="{{$product->id}}">Active</a>

                        @else
                       <a href="javascript:void(0)" 
                  class="updateProductStatus" 
                  id="product-{{$product->id}}" 
                  product_id="{{$product->id}}">Inactive</a>
                    @endif
                  </td>
                  
                  
                <td><a href="{{url('/admin/add-edit-product/'.$product->id)}}">Edit</a> &nbsp;/
                  <a href="{{url('/admin/delete-product/'.$product->id)}}" class="confirmDelete" name="product">Delete</a>
                  </td>
                  
                  
                </tr>
                  @endforeach
              
                </tbody>
                <tfoot>
                <tr>
                
                  <th>id</th>
                  <th>Name</th>
                  <th>Section</th>
                  <th>Category</th>
                  <th>Code</th>
                   <th>Color</th>
                   <th>Price</th>
                    <th>Status</th>
                   <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </category>
    <!-- /.content -->
 </div>

@endsection