@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS Pages</a> <a href="#" class="current">View CMS Pages</a> </div>
    <h1>CMS Pages</h1>
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
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View CMS Pages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>CSM URL</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cmspage as $cms)
                        <tr class="gradeX">
                            <td>{{ $cms->id }}</td>
                            <td>{{ $cms->URL }}</td>
                            <td>{{ $cms->Title }}</td>
                            <td>
                                @if($cms->Status==1)
                                <span class="btn btn-success btn-mini">Active</span>
                                @else
                                    <span class="btn btn-danger btn-mini">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/admin/detail-cms/'.$cms->id) }}" class="btn btn-primary btn-mini">DETAILS</a>
                                <a  href="{{ url('/admin/delete-cms-page/'.$cms->id) }}" class="btn btn-danger btn-mini">Delete</a>
                            </td>
                        </tr>
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
