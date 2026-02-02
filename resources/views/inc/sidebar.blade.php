<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-nurse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">tobesthealth</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Offers -->
    <li class="nav-item {{ request()->is('admin/offers*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOffers"
            aria-expanded="true" aria-controls="collapseOffers">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Job Offers</span>
        </a>

        <div id="collapseOffers"
            class="collapse {{ request()->is('admin/offers*') ? 'show' : '' }}"
            data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.offer.create') }}">
                    Add Job Offer
                </a>

                <a class="collapse-item" href="{{ route('admin.offers.index') }}">
                    View Job Offers
                </a>
            </div>
        </div>
    </li>

    <!-- Staff -->
    <li class="nav-item {{ request()->is('admin/staff*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaff"
            aria-expanded="true" aria-controls="collapseStaff">
            <i class="fas fa-fw fa-user-nurse"></i>
            <span>Staff</span>
        </a>

        <div id="collapseStaff"
            class="collapse {{ request()->is('admin/staff*') ? 'show' : '' }}"
            data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.staff.create') }}">
                    Add Staff
                </a>

                <a class="collapse-item" href="{{ route('admin.staff.index') }}">
                    View Staff
                </a>
            </div>
        </div>
    </li>

    <!-- Applications -->
    <li class="nav-item {{ request()->is('admin/applications*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.applications.index') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Applications</span>
        </a>
    </li>

    <!-- Contact Enquiries -->
    <li class="nav-item {{ request()->is('admin/contacts*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.contacts.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Contact Enquiries</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
