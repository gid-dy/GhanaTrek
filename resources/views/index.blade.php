<?php
use App\Tourpackages;
?>
@extends('layouts.frontLayout.userdesign')
    @section('content')

    {{-- <section id="slider" ><!--slider-->
			<div class="row">
				<div class="col-md-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="images/frontend_images/banners/slide.jpg" width="100%">
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>

    </section> --}}

    {{-- <div class="flexslider left">
        <ul class="slides">
            <li>
                <img src="images/frontend_images/banners/slide.jpg">
                <div class="meta">
                <h2>Lorem ipsum dolor sit amet, consectetur.</h2>
                <h4>Lorem ipsum dolor sit.</h4>
                </div>
            </li>
            <li>
                <img src="images/frontend_images/banners/slide2.jpg">
                <div class="meta">
                <h2>Lorem ipsum dolor sit amet, consectetur.</h2>
                <h4>Lorem ipsum dolor sit.</h4>
                </div>
            </li>
            <li>
                <img src="images/frontend_images/banners/tour.jpg">
                <div class="meta">
                <h2>Lorem ipsum dolor sit amet, consectetur.</h2>
                <h4>Lorem ipsum dolor sit.</h4>
                </div>
            </li>
        </ul>
    </div> --}}

  <div class="video_banner">
	  <div class="overlay"></div>
	  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
	    <source src="{{ asset('images/frontend_images/tour.mp4') }}" type="video/mp4">
	  </video>
	  <div class="container h-100">
	    <div class="d-flex text-center h-100">
	      <div class="my-auto w-100 text-white">
	        <h1 class="display-3">Great Offers</h1>
	        <h2>Experience the best from us</h2>
	      </div>
	    </div>
	  </div>
	</div>


    <section class="section1">
        <div class="container clearfix">
            <div class="gallery-box">
                <div class="gallery-content">
                    <div class="filtr-container">
                    <div class="content pull-right col-lg-8 col-md-8 col-sm-8 col-xs-12 clearfix">
                        <h2 class="text-center">top destination</h2>
                        <h4 class="text-center"> Where do you wanna go? How much you wanna explore? </h4>
                        @foreach($tourpackagesAll as $tourpackages)
                            @if($tourpackages->Status=="1")
                            <div class="col-md-6 col-xs-6">
                                <div class="filtr-item">
                                    <a href="{{ url('/tours/'.$tourpackages->id) }}">
                                        <img src="{{ asset('images/backend_images/tours/large/'.$tourpackages->Imageaddress) }}" alt="portfolio image" />
                                        <div class="item-title">
                                            <h4 class="heading">{{ $tourpackages->PackageName}}</h4>
                                            <p class="price">GHS {{ $tourpackages->PackagePrice}}</p>
                                        </div> <!-- /.item-title-->
                                    </a>
                                </div><!-- /.filtr-item -->
                            </div><!-- /.col -->
                            @endif
                        @endforeach
                        {{-- <div align="center">{{ $tourpackagesAll->links() }}</div> --}}
                    </div>

                    <!-- SIDEBAR -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 panel-group" id="sidebar">
                        <form action="{{ url('/tour-filter') }}" method="post">
                            @csrf
                            @if(!empty($CategoryName))
                            <input name="CategoryName" value={{ $CategoryName }} type="hidden">
                                @endif
                            <div class="widget">
                                    <h4 class="title"><span>Categories</span></h4>
                                    <ul class="categories">
                                        @foreach($tourpackagecategory  as $cat)
                                            <li>
                                                <?php $tourpackagesCount = Tourpackages::tourpackagesCount($cat->id); ?>
                                                @if($cat->CategoryStatus=="1")
                                                    <a href="{{ url('/tour/'.$cat->CategoryName) }}" class="">
                                                        {{-- <img src="{{ asset('images/backend_images/categories/large/'.$cat->Imageaddress) }}" alt="portfolio image" /> --}}
                                                        <div class="text">
                                                            <h4 class="mt-0">{{ $cat->CategoryName }}<span class="pull-right"> ({{ $tourpackagesCount }})</span></h4>
                                                            {{-- <p>{{ $cat->CategoryDescription }}</p> --}}
                                                        </div>
                                                    </a>
                                                    <hr>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @if(!empty($CategoryName))
                                    <div class="widget">
                                        <h4 class="title"><span>Tour Type Name</span></h4>
                                        @foreach($TourTypeNameArray as $TourTypeName)
                                            @if(!empty($_GET['TourTypeName']))
                                                <?php $TourTypeNameArr = explode('-',$_GET['TourTypeName']) ?>
                                                    @if(in_array($TourTypeName, $TourTypeNameArr))
                                                        <?php $TourTypeNamecheck = "checked"; ?>
                                                    @else
                                                        <?php $TourTypeNamecheck=""; ?>
                                                    @endif
                                                @else
                                                    <?php $TourTypeNamecheck=""; ?>
                                                @endif

                                                <ul class="categories">
                                                    <li>
                                                        <div class="text">
                                                            <input name="TourTypeNameFilter[]" onchange="javascript:this.form.submit();" id="{{ $TourTypeName }}" value="{{ $TourTypeName }}" type="checkbox">&nbsp;&nbsp;<span>{{ $TourTypeName }}</span
                                                        </div>
                                                        <hr>
                                                    </li>
                                                </ul>
                                        @endforeach

                                    </div>
                                @endif
                        </form>
                    </div>
                    <!-- end sidebar -->
                </div>
            </div>
        </div>
    </div><!-- end container -->
</section>

   @endsection






