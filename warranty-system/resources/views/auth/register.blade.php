<x:layout>


<div class="container">

					<div class="row">
						<div class="col">

							<div class="featured-boxes">
								<div class="row">
									
									<div class="col-md-6 mx-auto">
										<div class="featured-box featured-box-primary text-left mt-5">
											<div class="box-content">
												<h4 class="color-primary text-center font-weight-semibold text-4 text-uppercase mb-3">Register An Account</h4>
												<form action="{{route('register.store')}}" id="frmSignUp" method="post" class="needs-validation">
                                                    @csrf
													<div class="form-row">
														<div class="form-group col">
															<label class="font-weight-bold text-dark text-2">User Name</label>
															<input type="text" name='name' value="" class="form-control form-control-lg" required>
														</div>
													</div>
                                                    <div class="form-row">
														<div class="form-group col">
															<label class="font-weight-bold text-dark text-2">E-mail Address</label>
															<input type="text" value="" name="email" class="form-control form-control-lg" required>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-6">
															<label class="font-weight-bold text-dark text-2">Password</label>
															<input type="password" value=""  name='password' class="form-control form-control-lg" required>
														</div>
														<div class="form-group col-lg-6">
															<label class="font-weight-bold text-dark text-2">Re-enter Password</label>
															<input type="password" value="" name="password_confirmation" class="form-control form-control-lg" required>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-9">
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="terms">
																<label class="custom-control-label text-2" for="terms">I have read and agree to the <a href="#">terms of service</a></label>
															</div>
														</div>
														<div class="form-group col-lg-3">
															<input type="submit" value="Register" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>



</x:layout>