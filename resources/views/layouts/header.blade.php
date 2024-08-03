@if(Auth::check() && Auth::user()->farm_id != null)
<nav class="sidebar ">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Farm <span>System</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a href="{{ route('dashboard.index')}}" class="nav-link">
          <i class="fas fa-tachometer-alt"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Farm Management</li>
      {{-- <li class="nav-item">
        <a href="{{ route('farms.index') }}" class="nav-link">
          <i class="fas fa-warehouse"></i>
          <span class="link-title">Farms</span>
        </a>
      </li> --}}
      <li class="nav-item">
        {{-- <a href="{{ route('farms.workers.index', ['farm' => $farm->id]) }}" class="nav-link"> --}}
        <a href="{{ route('workers.index') }}" class="nav-link">
          <i class="fas fa-user-friends"></i>
          <span class="link-title">Workers</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('fields.index') }}" class="nav-link">
          <i class="fas fa-leaf"></i>
          <span class="link-title">Fields and Crops</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a href="{{ route('fields.crops.index') }}" class="nav-link">
          <i class="fas fa-seedling"></i>
          <span class="link-title">Crops</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a href="{{ route('reports.index') }}" class="nav-link">
          <i class="fas fa-file-alt"></i>
          <span class="link-title">Reports</span>
        </a>
      </li>
      <li class="nav-item nav-category">Livestock Management</li>
      <li class="nav-item">
        <a href="{{ route('animals.index') }}" class="nav-link">
          <i class="fas fa-file-alt"></i>
          <span class="link-title">Animals</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('feed_ingredients.index') }}" class="nav-link">
          <i class="fas fa-file-alt"></i>
          <span class="link-title">Feeds</span>
        </a>
      </li>
      <li class="nav-item nav-category">Expenses and Income </li>
      <li class="nav-item">
        <a href="{{ route('expenses.index') }}" class="nav-link">
          <i class="fas fa-dollar-sign"></i>
          <span class="link-title">Expenses</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('incomes.index') }}" class="nav-link">
          <i class="fas fa-chart-line"></i>
          <span class="link-title">Incomes</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('profitability_analyses.index') }}" class="nav-link">
          <i class="fas fa-chart-line"></i>
          <span class="link-title">Profit Analysis</span>
        </a>
      </li>
      <li class="nav-item nav-category">User Management</li>
      <li class="nav-item">
        <a href="{{ route('managers.index') }}" class="nav-link">
          <i class="fas fa-users"></i>
          <span class="link-title">Users</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
@endif


<div class="page-wrapper">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar bg-light">
        <a href="#" class="sidebar-toggler">
            <i data-feather="menu"></i>
        </a>
        <div class="navbar-content">
            <form class="search-form">
                <div class="input-group">
        <div class="input-group-text">
        <i data-feather="search"></i>
        </div>
                    <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                </div>
            </form>

        <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
            <a href="/logout" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="log-out"></i>
                <span>Log Out</span>
            </a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="page-content bg-light">

