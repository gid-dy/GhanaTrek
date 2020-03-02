@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Tour Packages</a> <a href="#" class="current">Add Tourtype</a> </div>
    <h1>Tourtype</h1>
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
            <h5>Add Tour Attribute</h5>
          </div>
          
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-tourtype/'.$tourpackagesDetails->PackageId) }}" name="add_tourtype" id="add_tourtype">
                @csrf
                <input type="hidden" name="PackageId" value="{{ $tourpackagesDetails->PackageId }}" />
                <div class="control-group">
                    <label class="control-label">Package Name</label>
                    <label class="control-label"><strong>{{ $tourpackagesDetails->PackageName }}</strong></label>
                </div>
                <div class="control-group">
                    <label class="control-label">Package Code</label>
                    <label class="control-label"><strong>{{ $tourpackagesDetails->PackageCode }}</strong></label>
                </div>
                <div class="control-group">
                
                    <label class="control-label"></label>
                    <div class="widget-title" style="margin-top:20px;"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Attributes</h5>
                    </div>
                    <div class="field_wrapper">
                        <div>
                            <input type="text" name="SKU[]" id="SKU" placeholder="SKU" style="width:120px; margin-left:100px;" required/>
                            <input type="text" name="TourTypeSize[]" id="TourTypeSize" placeholder="TourTypeSize" style="width:120px;" required/>
                            <input type="text" name="TourTypeName[]" id="TourTypeName" placeholder="TourTypeName" style="width:120px;" required/>
                            <input type="text" name="PackagePrice[]" id="PackagePrice" placeholder="PackagePrice" style="width:120px;" required/>
                            <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                        </div>
                    </div>
                </div>

              
              <div class="form-actions">
                <input type="submit" value="Add Tour Attribute" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row-fluid">
      <div class="span12"> 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Tourtype</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    <th>Tourtype Id</th>
                    <th>SKU</th>
                    <th>TourType Name</th>
                    <th>TourType Size</th>
                    <th>Package Price</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourpackagesDetails['tourtypes'] as $tourtype)
                        <tr class="gradeX">
                            <td>{{ $tourtype->TourTypeID }}</td>
                            <td>{{ $tourtype->SKU }}</td>
                            <td>{{ $tourtype->TourTypeName }}</td>
                            <td>{{ $tourtype->TourTypeSize }}</td>
                            <td>{{ $tourtype->PackagePrice }}</td>
                            <td class="center">
                              <a rel="{{ $tourtype->TourTypeID }}" rel1="delete-tourtype" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach                   
                </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

<div id="content-header">
    <h1>Tour Transportation</h1>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Tour Transportation</h5>

          </div>
          
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-tourtransportation/'.$tourpackagesDetails->PackageId) }}" name="add_transportation" id="add_transportation" novalidate="novalidate">
                @csrf
                <div class="control-group">
                
                    <label class="control-label"></label>
                    <div class="widget-title" style="margin-top:20px;"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Transportation</h5>
                    </div>
                    <div class="field_wrapper_transport">
                        <div>
                        <input type="hidden" name="PackageId" value="{{ $tourpackagesDetails->PackageId }}" />
                            <input type="text" name="TransportName[]" id="TransportName" placeholder="TransportName" style="width:120px; margin-left:100px;" required/>
                            <input type="text" name="TransportCost[]" id="TransportCost" placeholder="TransportCost" style="width:120px;" required/>
                            <a href="javascript:void(0);" class="add_button_trans" title="Add field">Add</a>
                        </div>
                    </div>
                </div>

              
              <div class="form-actions">
                <input type="submit" value="Add Transport" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
   <div class="row-fluid">
      <div class="span12"> 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Tour transport</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    <th>Tour TransportationID</th>
                    <th>Transport Name</th>
                    <th>Transport Cost</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourpackagesDetails['tourtransports'] as $tourtransportation)
                        <tr class="gradeX">
                            <td>{{ $tourtransportation->TourTransportationID }}</td>
                            <td>{{ $tourtransportation->TransportName }}</td>
                            <td>{{ $tourtransportation->TransportCost }}</td>
                            <td class="center">
                              <a rel="{{ $tourtransportation->TourTransportationID }}" rel1="delete-transport" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach                   
                </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

<div id="content-header">
    <h1>Tour Include</h1>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Tour Include</h5>

          </div>
          
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-include/'.$tourpackagesDetails->PackageId) }}" name="add_include" id="add_include" novalidate="novalidate">
                @csrf
                <div class="control-group">
                
                    <label class="control-label"></label>
                    <div class="widget-title" style="margin-top:20px;"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Include</h5>
                    </div>
                    <div class="field_wrapper_include">
                        <div>
                        <input type="hidden" name="PackageId" value="{{ $tourpackagesDetails->PackageId }}" />
                            <input type="text" name="IncludeName[]" id="IncludeName" placeholder="IncludeName" style="width:120px; margin-left:100px;" required/>
                            <input type="text" name="TourIncludeInfo[]" id="TourIncludeInfo" placeholder="TourIncludeInfo" style="width:120px;" required/>
                            <input type="text" name="TourExcludeName[]" id="TourExcludeName" placeholder="TourExcludeName" style="width:120px;" required/>
                            <a href="javascript:void(0);" class="add_button_include" title="Add field">Add</a>
                        </div>
                    </div>
                </div>

              
              <div class="form-actions">
                <input type="submit" value="Add Include" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="row-fluid">
      <div class="span12"> 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Include</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    <th>Tour IncludeID</th>
                    <th>Include Name</th>
                    <th>TourIncludeInfo</th>
                    <th>Exclude Name</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourpackagesDetails['tourincludes'] as $tourinclude)
                        <tr class="gradeX">
                            <td>{{ $tourinclude->TourIncludeID }}</td>
                            <td>{{ $tourinclude->IncludeName }}</td>
                            <td>{{ $tourinclude->TourIncludeInfo }}</td>
                            <td>{{ $tourinclude->TourExcludeName }}</td>
                            
                            <td class="center">
                              <a rel="{{ $tourinclude->TourIncludeID }}" rel1="delete-tourinclude" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>
                    @endforeach                   
                </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>

<div id="content-header">
    <h1>Tour Accomodation</h1>
</div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Accomodation</h5>

          </div>
          
          <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ url('/admin/add-accommodation/'.$tourpackagesDetails->PackageId) }}" name="add_location" id="add_location" novalidate="novalidate">
                @csrf
                <input type="hidden" name="PackageId" value="{{ $tourpackagesDetails->PackageId }}" />
                
              <div class="control-group">
                  <label class="control-label">Accommodation Name</label>
                  <div class="controls">
                    <input type="text" name="AccommodationName" id="AccommodationName">
                  </div>
              </div>
              <div class="control-group">
                <label class="control-label">Accommodation Type</label>
                <div class="controls">
                  <input type="text" name="AccommodationType" id="AccommodationType">
                </div>
              </div>

             
              <div class="form-actions">
                <input type="submit" value="Add Accomodation" class="btn btn-success">
              </div>
            </form>
        </div>
      </div>
    </div>

  </div>

  <div class="row-fluid">
      <div class="span12"> 
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Tour Accommodation</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    <th>AccommodationID</th>
                    <th>Accommodation Name</th>
                    <th>Accommodation Type</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourpackagesDetails['accommodations'] as $accommodation)
                        <tr class="gradeX">
                            <td>{{ $accommodation->AccommodationID }}</td>
                            <td>{{ $accommodation->AccommodationName }}</td>
                            <td>{{ $accommodation->AccommodationType }}</td>
                            <td class="center">
                              <a rel="{{ $accommodation->AccommodationID }}" rel1="delete-accommodation" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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
@endsection
