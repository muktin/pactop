  <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}"> <img alt="image" src="{{ url('/assets/img/logo.png')}}" class="header-logo" /> <span              class="logo-name">Pactop</span>
            </a>
          </div>
          <ul class="sidebar-menu">
<
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Masters</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.card_type.view') }}">Card Types</a></li>
                <li><a class="nav-link" href="{{ route('admin.payment_type.view') }}">Payment Types</a></li>
                <li><a class="nav-link" href="{{ route('admin.institute_type.view') }}">Institute Type</a></li>
                <li><a class="nav-link" href="{{ route('admin.params.view') }}">Params</a></li>
                <li><a class="nav-link" href="{{ route('admin.card_status.view') }}">Card Status</a></li>
                <li><a class="nav-link" href="{{ route('admin.payment_status.view') }}">Payment Status</a></li>
                <li><a class="nav-link" href="{{ route('admin.delivery_status.view') }}">Delivery Status</a></li>
                <li><a class="nav-link" href="{{ route('admin.workflow_status.view') }}">Workflow Status</a></li>
                <li><a class="nav-link" href="{{ route('admin.order_status.view') }}">Order Status</a></li>
              </ul>
            </li>
			<li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.user.list')}}">User List</a></li>
                 <li><a class="nav-link" href="{{ route('admin.role.list')}}">Role List</a></li> <li><a class="nav-link" href="{{ route('admin.permission.list')}}"> Permission List</a></li>
              </ul>
            </li>
             
			<li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Institute</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.institute.list')}}">Institue List</a></li>
              </ul>
            </li>

          </ul>
        </aside>
      </div>