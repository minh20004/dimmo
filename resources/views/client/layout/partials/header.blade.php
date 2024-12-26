<div class="header-top" id="backToTop">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="index.html" style="width: 100px;">
                <img src="client/img/logo-text-blue.svg" alt="Logo">
            </a>
            
            <!-- Mobile Buttons -->
            <div class="d-flex">
                <button class="btn-pink p-1 me-2 search-toggle serch-mobi" id="searchToggle">
                    <svg width="32" height="26" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6957 2.8335C19.9607 2.8335 25.0567 7.9295 25.0567 14.1945C25.0567 17.1503 23.9223 19.8462 22.0661 21.8694L25.7186 25.5143C26.0605 25.8561 26.0616 26.4091 25.7198 26.751C25.5495 26.9236 25.3243 27.0088 25.1003 27.0088C24.8775 27.0088 24.6535 26.9236 24.482 26.7533L20.7853 23.067C18.8407 24.6243 16.3751 25.5567 13.6957 25.5567C7.43066 25.5567 2.3335 20.4595 2.3335 14.1945C2.3335 7.9295 7.43066 2.8335 13.6957 2.8335ZM13.6957 4.5835C8.3955 4.5835 4.0835 8.89433 4.0835 14.1945C4.0835 19.4947 8.3955 23.8067 13.6957 23.8067C18.9947 23.8067 23.3067 19.4947 23.3067 14.1945C23.3067 8.89433 18.9947 4.5835 13.6957 4.5835Z" fill="#0B2462"></path>
                    </svg>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
    
            <!-- Offcanvas Menu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <img class="offcanvas-title" id="offcanvasNavbarLabel" src="client/img/logo-text-blue.svg" alt="" style="width: 80px;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="category.html">Categories</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <a href="#">Sales</a>
                                    <!-- Menu con của Category 1 -->
                                    <ul class="sub-menu">
                                        <li><a href="#">Sales marketing 1</a></li>
                                        <li><a href="#">Sales 2</a></li>
                                        <li><a href="#">Sales 3</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-item"><a href="#">Sales 2</a></li>
                                <li class="dropdown-item"><a href="#">Sales 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="prising.html">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Dimmo AI</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#">Resources</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-item">
                                    <a href="blog.html">blog</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                    
                    <!-- Desktop Buttons -->
                    <button class="btn-pink p-1 me-2 search-toggle search-toggle-destop" id="searchToggleDesktop">
                        <svg width="32" height="26" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6957 2.8335C19.9607 2.8335 25.0567 7.9295 25.0567 14.1945C25.0567 17.1503 23.9223 19.8462 22.0661 21.8694L25.7186 25.5143C26.0605 25.8561 26.0616 26.4091 25.7198 26.751C25.5495 26.9236 25.3243 27.0088 25.1003 27.0088C24.8775 27.0088 24.6535 26.9236 24.482 26.7533L20.7853 23.067C18.8407 24.6243 16.3751 25.5567 13.6957 25.5567C7.43066 25.5567 2.3335 20.4595 2.3335 14.1945C2.3335 7.9295 7.43066 2.8335 13.6957 2.8335ZM13.6957 4.5835C8.3955 4.5835 4.0835 8.89433 4.0835 14.1945C4.0835 19.4947 8.3955 23.8067 13.6957 23.8067C18.9947 23.8067 23.3067 19.4947 23.3067 14.1945C23.3067 8.89433 18.9947 4.5835 13.6957 4.5835Z" fill="#0B2462"></path>
                        </svg>
                    </button>
                    <button class="btn btn-outline-pink me-2 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Your Company</button>
                    <button class="btn btn-pink btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModalSignIn">Sign In/Up</button>
                </div>
            </div>
        </div>
        
    </nav><!-- Search Form -->
    <form id="searchForm" class="search-form d-none">
        <div class="search-form-head d-flex align-items-center justify-content-between container">
            <input type="text" class="form-control me-2 btn-outline-pink" placeholder="Search...">
            <button type="submit" class="btn btn-pink me-3">Search</button>
            <span class="text-end mt-2 cancel-search" style="cursor: pointer; color: #333;" id="cancelSearch">Cancel</span>
        </div>
    </form>
</div>