<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">

        <ul class="nav flex-column pt-3 pt-md-0">

            <!-- Brand -->
            <li class="nav-item">
                <a href="/dashboard" aria-disabled="true" class="nav-link d-flex align-items-center disabled">
                    <span class="sidebar-icon me-3">
                        <img src="/assets/img/brand/server.svg" height="20" width="20">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">Data Warehouse</span>
                </a>
            </li>

            <li role="separator" class="dropdown-divider mt-3 mb-3 border-gray-700"></li>

            <!-- Purchasing Trend (Dashboard) -->
            <li class="nav-item {{ Request::segment(1) == 'purchasing-trend' ? 'active' : '' }}">
                <a href="/purchasing-trend" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8l-4-4l-6 6" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Purchasing Trend</span>
                </a>
            </li>

            <!-- Cost by Category (Transactions) -->
            <li class="nav-item {{ Request::segment(1) == 'cost-by-category' ? 'active' : '' }}">
                <a href="/cost-by-category" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 7h.01M7 3h5a1.99 1.99 0 0 1 1.414.586l7 7a2 2 0 0 1 0 2.828l-7 7a2 2 0 0 1-2.828 0l-7-7A1.994 1.994 0 0 1 3 12V7a4 4 0 0 1 4-4" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Cost by Category</span>
                </a>
            </li>

            <!-- Sales Trend -->
            <li class="nav-item {{ Request::segment(1) == 'sales-trend' ? 'active' : '' }}">
                <a href="/sales-trend" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2s3 .895 3 2s-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Sales Trend</span>
                </a>
            </li>

            <!-- Top Sales Breakdown -->
            <li class="nav-item {{ Request::segment(1) == 'top-sales-breakdown' ? 'active' : '' }}">
                <a href="/top-sales-breakdown" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Top Sales Breakdown</span>
                </a>
            </li>

            <!-- Cost vs Sales -->
            <li class="nav-item {{ Request::segment(1) == 'cost-sales-comparison' ? 'active' : '' }}">
                <a href="/cost-sales-comparison" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 19v-6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V9a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v10m-6 0a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2m0 0V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Cost vs Sales</span>
                </a>
            </li>

            <li role="separator" class="dropdown-divider mt-3 mb-3 border-gray-700"></li>

            <!-- Dashboard Global -->
            <li class="nav-item {{ Request::segment(1) == 'mondrian' ? 'active' : '' }}">
                <a href="/mondrian" class="nav-link">
                    <span class="sidebar-icon">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm10 0a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2zM4 16a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm10 0a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2z" />
                        </svg>
                    </span>
                    <span class="sidebar-text">Mondrian</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
