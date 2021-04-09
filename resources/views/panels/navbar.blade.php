@if($configData["mainLayoutType"] === 'horizontal' && isset($configData["mainLayoutType"]))
<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}" data-nav="brand-center">
  <div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="{{url('/')}}">
          <h2 class="brand-text mb-0">XYZ</h2>
        </a>
      </li>
    </ul>
  </div>
  @else
  <nav class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
    @endif
    <div class="navbar-container d-flex content">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav">
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link nav-link-style">
              <i class="ficon" data-feather="{{($configData['theme'] === 'dark') ? 'sun' : 'moon' }}"></i>
            </a>
          </li>
        </ul>
      </div>
      <ul class="nav navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown dropdown-language">
          <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="flag-icon flag-icon-us"></i>
            <span class="selected-language">English</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
            <a class="dropdown-item" href="{{url('lang/en')}}" data-language="en">
              <i class="flag-icon flag-icon-us"></i> English
            </a>
            <a class="dropdown-item" href="{{url('lang/fr')}}" data-language="fr">
              <i class="flag-icon flag-icon-fr"></i> French
            </a>
            <a class="dropdown-item" href="{{url('lang/de')}}" data-language="de">
              <i class="flag-icon flag-icon-de"></i> German
            </a>
            <a class="dropdown-item" href="{{url('lang/pt')}}" data-language="pt">
              <i class="flag-icon flag-icon-pt"></i> Portuguese
            </a>
          </div>
        </li>
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
              <span class="user-name font-weight-bolder">{{ Auth::user()->name }}</span>
            </div>
            <span class="avatar">
              <img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40">
              <span class="avatar-status-online"></span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a class="dropdown-item" :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                 <i class="mr-50" data-feather="power"></i> Logout
                </a>
          </form>
          
          </div>
        </li>
      </ul>
    </div>
  </nav>


  {{-- if main search not found! --}}
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between">
      <a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start">
          <span class="mr-75" data-feather="alert-circle"></span>
          <span>No results found.</span>
        </div>
      </a>
    </li>
  </ul>
  {{-- Search Ends --}}
  
  <!-- END: Header-->
