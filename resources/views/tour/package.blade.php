
@extends('layouts.frontLayout.userdesign')
    @section('content')
    <?php
use App\Tourpackages;
?>
<div class="section" id="section-1">
    <ul class="rslides" id="slider4">
        <li>
            <img src="{{ asset('images/frontend_images/back.jpg') }}" class="" alt="..." width="" height="100px">
            <div class="caption">
                <div class="header-info">
                    <h2><a href="#">Get Away On This Weekend</a></h2>
                    <h4><a href="#">HEAVEN BEACH RESORT</a></h4>
                </div>
            </div>
        </li>
    </ul>
  <div class="clearfix"></div>
</div>


  <!--cat badges-->
    <section class="cat_badge">
        <div class="container">
            <div class="row label-bagdes">
                <div class="col-md-12">
                    <div align="center">
                        @foreach($tourpackagecategory as $cat)
                            <?php $tourpackagesCount = Tourpackages::tourpackagesCount($cat->id); ?>
                            @if($cat->CategoryStatus=="1")
                                <a href="{{ url('/tour/'.$cat->CategoryName) }}">
                                    <button class="btn btn-default filter-button" data-filter="hdpe">{{ $cat->CategoryName }} ({{ $tourpackagesCount }})</button>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>   
            </div>
        </div><!--/.container-->
    </section>
    <section id="pack" class="packages">
        <div class="container">
            <div class="col-xl-6 mx-auto text-center">
                <div class="section-title mb-100">
                    <h4>
                        @if(!empty($search_tour))
                            {{ $search_tour }}
                        @else
                            {{ $categoryDetails->CategoryName }}
                        @endif
                        ({{ count($tourpackagesAll)  }})
                    </h4>
                </div>
            </div>
            
            <div class="row">
                @foreach($tourpackagesAll as $tourpackages)
                    @if($tourpackages->Status=="1")
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ url('tours/'.$tourpackages->id) }}" class="block-5">
                                <img src="{{ asset('images/backend_images/tours/large/'.$tourpackages->Imageaddress) }}" alt="portfolio image" />
                                <div class="text">
                                    <h3 class="heading">{{ $tourpackages->PackageName}}<span class="price pull-right"> GHS {{ $tourpackages->PackagePrice}}</span></h3>
                                    <div class="post-meta">
                                        <p>
                                            <span class="price">
                                                <i class="fa fa-angle-right"></i> {{ $tourpackages->AccommodationName}}
                                            </span>
                                            <span class="price">
                                                <i class="fa fa-angle-right"></i>  {{ $tourpackages->Description}}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="about-btn">
                                        <button  class="about-view packages-btn price pull-right">
                                            book now
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div><!--/.col-->
                    @endif
                @endforeach
                @if(empty($search_tour))
                    <div align="center">{{ $tourpackagesAll->links() }}</div>
                @endif
            </div><!--/.row-->
        </div>
    </section><!--/.packages-->

@endsection



