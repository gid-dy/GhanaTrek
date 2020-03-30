@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Bookings</a> <a href="#" class="current">View Bookings</a> </div>
    <h1>Bookings</h1>
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
            <h5>Bookings</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    <th>Booking Id</th>
                    <th>Booking Date</th>
                    <th>Client SurName</th>
                    <th>Client OtherNames</th>
                    <th>Client Email</th>
                    <th>Booked Tour</th>
                    <th>Booking Amount</th>
                    <th>Booking Status</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="gradeX">
                            <td class="center">{{ $booking->id }}</td>
                            <td class="center">{{ $booking->created_at }}</td>
                            <td class="center">{{ $booking->SurName }}</td>
                            <td class="center">{{ $booking->OtherNames }}</td>
                            <td class="center">{{ $booking->UserEmail }}</td>
                            <td class="center">
                                @foreach($booking->bookings as $pro)
                                    {{ $pro->PackageCode }}
                                    ({{ $pro->Travellers }})
                                    <br>
                                @endforeach
                            </td>
                            <td class="center">{{ $booking->Grand_total }}</td>
                            <td class="center">{{ $booking->Status }}</td>
                            <td class="center">{{ $booking->Payment_method }}</td>
                            <td class="center">
                              <a target="_blank" href="{{ url('admin/view-bookings/'.$booking->id) }}"  class="btn btn-success btn-mini">view booking details</a><br><br>
                              <a target="_blank" href="{{ url('admin/view-invoice/'.$booking->id) }}"  class="btn btn-success btn-mini">view booking invoice</a>
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
