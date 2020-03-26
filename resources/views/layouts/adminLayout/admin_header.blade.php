{{-- Header-part --}}
<div id="header">
  <h1><a href="{{ url('/admin/dashboard') }}">Ghana Trek</a></h1>
</div>
{{-- close-Header-part --}}


{{-- top-Header-menu --}}
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    {{-- <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li> --}}
    {{-- <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li> --}}
    <li class=""><a title="" href="{{ url('/admin/settings') }}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    @if(empty(Auth::check()))
        				    <li><a href="{{ url('admin/login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a></li>
                @else
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->SurName }} <span class="caret"></span>
                                    
                                </a>
                                <div class=" user-side dropdown-menu " aria-labelledby="navbarDropdown">
                                <!-- <div>
                                  <a href="{{ url('account') }}"><i class="fa fa-user"></i> {{ __('Account') }}</a>
                                </div> -->

                                    <a class="dropdown-item" href="{{ url('admin/logout') }}"><i class="fa fa-sign-out"></i>
                                       
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                @endif
    
  </ul>
</div>
{{-- close-top-Header-menu --}}
{{-- start-top-serch --}}

<div id="search">

  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>