@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Tour Package</a> <a href="#" class="current">Add Location</a> </div>
    <h1>Location</h1>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Location</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/admin/add-location/'.$tourpackagesDetails->id) }}" name="add_location" id="add_location" novalidate="novalidate">
                @csrf
                <input type="hidden" name="Package_id" value="{{ $tourpackagesDetails->id }}" />
              <div class="control-group">
                <label class="control-label">Location Name</label>
                <div class="controls">
                  <input type="text" name="LocationName" id="LocationName">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Weather</label>
                <div class="controls">
                  <input type="text" name="Weather" id="Weather">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Longitude</label>
                <div class="controls">
                  <input type="text" name="Longitude" id="Longitude">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Latitude</label>
                <div class="controls">
                  <input type="text" name="Latitude" id="Latitude">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">GhanaPost Address</label>
                <div class="controls">
                  <input type="text" name="GhanaPostAddress" id="GhanaPostAddress">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Other Address</label>
                <div class="controls">
                  <input type="text" name="OtherAddress" id="OtherAddress">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Add location" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
