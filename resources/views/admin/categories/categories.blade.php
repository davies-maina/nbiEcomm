@extends('layouts.admin_layout.admin_layout');

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <category class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">categories</li>
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
              <h3 class="card-title">categories</h3>
              <a href="{{url('/admin/add-edit-category')}}" class="btn btn-block btn-success" style="max-width:150px;float:right;display:inline-block">Add Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="category" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Section</th>
                  <th>Parent category</th>
                  <th>Url</th>
                   <th>Status</th>
                   <th>Actions</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  @if (!isset($category->parentcategory->category_name))
                      <?php 
                      $parent_category="Root";
                      ?> 

                      @else
                      <?php
                      $parent_category=$category->parentcategory->category_name;
                      ?>
                  @endif
                      <tr>
                      <td>{{$category->id}}</td>
                  <td>{{$category->category_name}}
                  </td>
                  <td>{{$category->section->name}}</td>
                  <td>{{$parent_category}}</td>
                <td>{{$category->url}}</td>
                  <td>
                    @if ($category->status==1)
                  <a href="javascript:void(0)" 
                  class="updateCategoryStatus" 
                  id="category-{{$category->id}}" 
                  category_id="{{$category->id}}">Active</a>

                        @else
                       <a href="javascript:void(0)" 
                  class="updateCategoryStatus" 
                  id="category-{{$category->id}}" 
                  category_id="{{$category->id}}">Inactive</a>
                    @endif
                  </td>
                <td><a href="{{url('/admin/add-edit-category/'.$category->id)}}">Edit</a> &nbsp;/
                  <a href="{{url('/admin/delete-category/'.$category->id)}}" class="confirmDelete"
                    name="category">Delete</a>
                  </td>
                  
                  
                </tr>
                  @endforeach
              
                </tbody>
                <tfoot>
                <tr>
                <th>id</th>
                  <th>Name</th>
                  <th>url</th>
                   <th>status</th>
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