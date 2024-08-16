<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
				<div class="header-body border-color-primary border-bottom-0 box-shadow-none" data-sticky-header-style="{'minResolution': 0}" data-sticky-header-style-active="{'background-color': '#f7f7f7'}" data-sticky-header-style-deactive="{'background-color': '#FFF'}">
					<div class="header-top header-top-borders">
						<div class="container h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
												<li class="nav-item nav-item-borders py-2">
													<span class="pl-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i> 1234 Street Name, City Name</span>
												</li>
												<li class="nav-item nav-item-borders py-2 d-none d-lg-inline-flex">
													<a href="tel:123-456-7890"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> 123-456-7890</a>
												</li>
												<li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
													<a href="mailto:mail@domain.com"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> mail@domain.com</a>
												</li>
											</ul>
										</nav>
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
                                                @guest
												<li class="nav-item nav-item-anim-icon d-none d-md-block">
													<a class="nav-link pl-0" href="{{route('login')}}"><i class="fas fa-angle-right"></i>Login</a>
												</li>
												<li class="nav-item nav-item-anim-icon d-none d-md-block">
													<a class="nav-link" href="{{route('register.index')}}"><i class="fas fa-angle-right"></i> Register</a>
												</li>
												@endguest
                                                @auth
                                                <li class="nav-item nav-item-anim-icon d-none d-md-block">
													<a class="nav-link" href="{{route('logout')}}"><i class="fas fa-angle-right"></i> LogOut</a>
												</li>
                                                @endauth
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					
                    @auth
					<div class="container">
						<div class="header-nav-bar bg-color-light-scale-1 mb-3 px-3 px-lg-0">
							<div class="header-row">
								<div class="header-column">
									<div class="header-row justify-content-end">
										<div class="header-nav header-nav-links justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '150px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
											<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-dropdown-arrow header-nav-main-effect-3 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
													<ul class="nav nav-pills" id="mainNav">
                                                        <li class="">
                                                            <a class=" {{ request()->is("customers*") ? 'text-info' : "" }}" href="{{route('customers.index') }}">Customer</a>
                                                        </li>
                                                        <li>
                                                            <a class=" {{ request()->is("importers*") ? 'text-info' : "" }}" href="{{route('importers.index') }}">Importer</a>
                                                        </li>
                                                        <li>
                                                            <a class=" {{ request()->is("products*") ? 'text-info' : "" }}" href="{{route('products.index') }}">Warranty</a>
                                                        </li>
                                                        <li>
                                                            <a class=" {{ request()->is("invoices*") ? 'text-info' : "" }}" href="{{route('invoices.index') }}">Invoices</a>
                                                        </li>
                                                    </ul>
                                            </nav>
                                            
											</div>
											<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
												<i class="fas fa-bars"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endauth

				</div>
			</header>