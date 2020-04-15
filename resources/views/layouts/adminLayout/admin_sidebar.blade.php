<?php $url = url()->current(); ?>
{{-- sidebar-menu --}}
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/categor/i", $url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-category/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
        <li <?php if (preg_match("/view-categories/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-categories') }}">View Categories</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Tour Package</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/tourpackage/i", $url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-tour/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-tour') }}">Add Tour Package</a></li>
        <li <?php if (preg_match("/view_tourpackages/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view_tourpackages') }}">View Tour Package</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupon</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/coupon/i", $url)){ ?> style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/add-coupon/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-coupon') }}">Add Coupon</a></li>
        <li <?php if (preg_match("/view-coupons/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-coupons') }}">View Coupon</a></li>
      </ul>
    </li>
    <?php $base_booking_url = trim(basename($url)); ?>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Bookings</span> <span class="label label-important">1</span></a>
        <ul <?php if (preg_match("/booking/i", $url)){ ?> style="display:block;" <?php } ?>>
          <li <?php if ($base_booking_url == "view-bookings"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-bookings') }}">View Bookings</a></li>
          <li <?php if ($base_booking_url == "view-bookings-chart"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-bookings-chart') }}">View Booking Chart</a></li>
        </ul>
    </li>
    <?php $base_user_url = trim(basename($url)); ?>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">1</span></a>
        <ul <?php if (preg_match("/users/i", $url)){ ?> style="display:block;" <?php } ?>>
            <li <?php if ($base_user_url == "view-users"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-users') }}">View Users</a></li>
            <li <?php if ($base_user_url == "view-users-chart"){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-users-chart') }}">View Users Chart</a></li>
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Feedbacks</span> <span class="label label-important">1</span></a>
        <ul <?php if (preg_match("/feedback/i", $url)){ ?> style="display:block;" <?php } ?>>
            <li <?php if (preg_match("/view-feedbacks/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-feedbacks') }}">View Feedbacks</a></li>
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>CMS Pages</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/cms-page/i", $url)){ ?> style="display:block;" <?php } ?>>
          <li <?php if (preg_match("/add-cms-page/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-cms-page') }}">Add CMS Page</a></li>
          <li <?php if (preg_match("/view-cms-pages/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-cms-pages') }}">View CMS Pages</a></li>
        </ul>
      </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Enquiries</span> <span class="label label-important">1</span></a>
        <ul <?php if (preg_match("/enquiries/i", $url)){ ?> style="display:block;" <?php } ?>>
            <li <?php if (preg_match("/get-contact/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/get-contact') }}">View Enquiries</a></li>
        </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Currencies</span> <span class="label label-important">2</span></a>
        <ul <?php if (preg_match("/currencies/i", $url)){ ?> style="display:block;" <?php } ?>>
          <li <?php if (preg_match("/add-currency/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/add-currency') }}">Add Currency</a></li>
          <li <?php if (preg_match("/view-currencies/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-currencies') }}">View Currencies</a></li>
        </ul>
      </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Newsletter Subscribers</span> <span class="label label-important">1</span></a>
        <ul <?php if (preg_match("/newsletter/i", $url)){ ?> style="display:block;" <?php } ?>>
            <li <?php if (preg_match("/view-newsletter-subscribers/i", $url)){ ?> class="active" <?php } ?>><a href="{{ url('/admin/view-newsletter-subscribers') }}">View Newsletter</a></li>
        </ul>
    </li>

    {{--  <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
    <li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
    <li><a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="form-common.html">Basic Form</a></li>
        <li><a href="form-validation.html">Form with Validation</a></li>
        <li><a href="form-wizard.html">Form with Wizard</a></li>
      </ul>
    </li>
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>  --}}
</div>
{{-- sidebar-menu --}}
