@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Tours</a> <a href="#" class="current">View Tours</a> </div>
    <h1>Tours</h1>
    @if (Session::has('flash_message_error'))    
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif 
        @if (Session::has('flash_message_success'))    
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss='alert'></button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif 
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12"> 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Tours</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    <th>Package Id</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Package Name</th>
                    <th>Package Code</th>
                    <th>Package Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourpackages as $tourpackages)
                        <tr class="gradeX">
                            <td>{{ $tourpackages->PackageId }}</td>
                            <td>{{ $tourpackages->categoryId }}</td>
                            <td>{{ $tourpackages->CategoryName }}</td>
                            <td>{{ $tourpackages->PackageName }}</td>
                            <td>{{ $tourpackages->PackageCode }}</td>
                            <td>{{ $tourpackages->PackagePrice }}</td>
                            <td>
                                @if(!empty($tourpackages->Imageaddress))
                                    <img src="{{ asset ('/images/backend_images/tours/large/'.$tourpackages->Imageaddress) }}" style= "width:70px;">
                                @endif
                            </td>
                            <td class="center">
                              <a href="#myModal{{ $tourpackages->PackageId }}" data-toggle="modal" class="btn btn-success btn-mini">view</a> 
                              <a href="{{ url('/admin/edit-tour/'.$tourpackages->PackageId) }}" class="btn btn-primary btn-mini">Edit</a>
                              <a href="{{ url('/admin/add-tourtype/'.$tourpackages->PackageId) }}" class="btn btn-dark btn-mini">Add</a>
                              <a href="{{ url('/admin/add-image/'.$tourpackages->PackageId) }}" class="btn btn-info btn-mini">Image</a>
                              <a href="{{ url('/admin/add-location/'.$tourpackages->PackageId) }}" class="btn btn-warning btn-mini">location</a>
                              <a rel="{{ $tourpackages->PackageId }}" rel1="delete-tour" <?php /*href="{{ url('/admin/delete-tour/'.$tour->id) }}" */?> href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr> 

                        <div id="myModal{{ $tourpackages->PackageId }}" class="modal hide">
                            <div class="modal-header">
                              <button data-dismiss="modal" class="close" type="button">×</button>
                              <h3>{{ $tourpackages->PackageName }} Full Details</h3>
                            </div>
                            <div class="modal-body">
                              <p>Tour ID:{{ $tourpackages->PackageId }} </p>
                              <p>Category ID:{{ $tourpackages->categoryId }} </p>
                              <p>Package Name:{{ $tourpackages->PackageName }} </p>
                              <p>Package Code:{{ $tourpackages->PackageCode }} </p>
                              <p>Description:{{ $tourpackages->Description }} </p>
                              <p>Package Price:{{ $tourpackages->PackagePrice }} </p>
                            </div>
                        </div>
                    @endforeach                   
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
