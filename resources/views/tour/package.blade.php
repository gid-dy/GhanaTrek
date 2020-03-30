@extends('layouts.frontLayout.userdesign')
    @section('content')

@include('layouts.frontLayout.user_topbar')

@include('layouts.frontLayout.user_header')
  <section>
      <div class="carousel-inner">
          <img src="{{ asset('images/frontend_images/86.jpg') }}" class="" alt="..." width="1400px" height="960px">
          <div class="carousel-caption">
              <div class="d-flex text-center h-100">
                <div class="my-auto w-100 text-white">
                  <h1 class="display-3">Video Header</h1>
                  <h2>With HTML5 Video and Bootstrap 4</h2>
                </div>
              </div>
          </div>
      </div>
  </section>


  <!--cat badges-->
    <section class="cat_badge">
      <div class="container">
          <div class="row label-bagdes">
              <!--Category buttons-->
              <div class="col-md-12">

                      <div align="center">
                      @foreach($tourpackagecategory as $cat)
                        @if($cat->CategoryStatus=="1")
                        <a href="{{ $cat->CategoryName }}"><button class="btn btn-default filter-button" data-filter="hdpe">{{ $cat->CategoryName }}

                        </button></a>
                        @endif
                        @endforeach
                    </div>
              </div>
                    <!--cat badges end-->
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
                    </h4>
                  </div>
            </div>
        <div>
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

          </div><!--/.row-->
        </div><!--/.packages-content-->
      </div><!--/.container-->

    </section><!--/.packages-->
    @include('layouts.frontLayout.user_subscription')

@include('layouts.frontLayout.user_footer')
@endsection





  <script>
    const elem = document.querySelector('figure')
const duration = window.innerHeight

let scrollTarget = 0
let scrollCurrent = 0

const ease = 0.15

const tl = new TimelineLite({ paused: true })
tl.fromTo(elem, 1, { alpha: 1, scale: 1, yPercent: 0 }, { alpha: 0, scale: 0.5, yPercent: -50 })

window.addEventListener('scroll', () => {
  scrollTarget = window.scrollY
})

function normalize(val, max, min) {
  return (val - min) / (max - min)
}

function render() {
  scrollCurrent += (scrollTarget - scrollCurrent) * ease

  const progress = normalize(scrollCurrent, duration, 0)
  tl.progress(progress)

  requestAnimationFrame(render)
}

requestAnimationFrame(render)
</script>


