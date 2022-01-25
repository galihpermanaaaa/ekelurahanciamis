@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')

<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-6 offset-md-3">
						
							<!-- Page Header -->
							<div class="page-header">
								<div class="row">
									<div class="col-sm-12">
										<h3 class="page-title">Ganti Password</h3>
									</div>
								</div>
							</div>
							<!-- /Page Header -->
                            @foreach ($user_list as $key => $item)
							<form action="{{ route('update_password') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password Lama</label>
  
                            <div class="col-md-6">
                            <input id="text" type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password Baru</label>
  
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Konfirmasi Password Baru</label>
    
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Update Password</button>
								</div>
                                @endforeach
							</form>
						</div>
					</div>
				</div>
				<!-- /Page Content -->
				
			</div>
			<!-- /Page Wrapper -->
			
        </div>

@include('layouts/footer')