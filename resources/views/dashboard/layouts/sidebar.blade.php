<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/product*') ? 'active' : '' }}" href="/dashboard/product">
          <span data-feather="package"></span>
          Product
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/feedback*') ? 'active' : '' }}" href="/dashboard/feedback">
          <span data-feather="message-square"></span>
          Feedback
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  {{ Request::is('dashboard/faq*') ? 'active' : '' }}" href="/dashboard/faq">
          <span data-feather="help-circle"></span>
          FAQ
        </a>
      </li>
    </ul>

    {{-- @can('admin') 
    <h6 class="sidebar-headingd d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>ADMINISTRATOR</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Post Categories
        </a>
      </li>
    </ul>
    @endcan --}}

  </div>
</nav>