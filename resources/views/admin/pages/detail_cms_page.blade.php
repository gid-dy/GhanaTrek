@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS Pages</a> <a href="#" class="current">Detail CMS Pages</a> </div>
    <h1>Detail CMS Page</h1>
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
  <div style="margin-left:20px;">
    <a href="{{ url('/admin/export-tourpackages') }}" class="btn btn-primary btn-mini">Export</a>
</div>
  <div class="container-fluid">
    <input type="hidden" name="id" value="{{ $cmspageDetails->id }}" />
    <hr>
                <header class="card-heading  btn-primary">
                    <h2 class="card-title">
                        {{ $cmspageDetails->Title }}
                    </h2>
                </header>
                <div class="card-body">
                    <form action="#" method="POST" enctype="multipart/form-data">

                        <div style="background: #fff; padding: 20px;">
                            <div>
                                <span>

                                        <p style="text-align:justify"><?php echo nl2br($cmspageDetails->Description); ?></p>
                                </span>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url('/admin/edit-cms/'.$cmspageDetails->id) }}" class="btn btn-warning">
                                    <span class="fa fa-edit"></span>
                                    Edit Profile
                                </a>

                                <a href="http://www.ghamsuknustlocal.org/bash_auth_admin/wings" class="btn btn-danger">
                                    <span class="fa fa-arrow-left"></span>
                                    Back
                                </a> <br> <br>
                            </div>
                        </div>
                    </form>
                </div>


  </div>
</div>
@endsection