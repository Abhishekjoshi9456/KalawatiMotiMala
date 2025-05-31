    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
               <img src="{{ asset("asset/images/logo.png") }}" alt="Kalawati Moti Mala" class="img-fluid" width="160" height="60">
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#dashboard">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#orders">
                            <i class="fas fa-shopping-cart me-1"></i>Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">
                            <i class="fas fa-box me-1"></i>Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#customers">
                            <i class="fas fa-users me-1"></i>Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#analytics">
                            <i class="fas fa-chart-bar me-1"></i>Analytics
                        </a>
                    </li>
                </ul>

                <!-- Right Side Navigation -->
                <ul class="navbar-nav">
                    <!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-cart me-2"></i>New order
                                    received</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>New customer
                                    registered</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-exclamation-triangle me-2"></i>Low
                                    stock alert</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center" href="#">View All</a></li>
                        </ul>
                    </li>

                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-envelope"></i>
                            <span class="notification-badge">2</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <h6 class="dropdown-header">Messages</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Customer inquiry about wedding mala</a></li>
                            <li><a class="dropdown-item" href="#">Bulk order request received</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center" href="#">View All Messages</a></li>
                        </ul>
                    </li>

                    <!-- User Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i>Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i>Help</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>