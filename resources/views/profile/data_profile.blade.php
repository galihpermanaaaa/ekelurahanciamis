@include('layouts.header')
@include('layouts.sidebar')

<main id="main" class="main">
{{-- message --}}
{!! Toastr::message() !!}

<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
        @foreach ($user_list as $key => $item)
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            
              <img src="{{ URL::to('assets/img/iconnn.jpg') }}" alt="Profile" class="rounded-circle">
              <h2>{{ $item->name }}</h2>
              <h3>{{ $item->email }}</h3>
              <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>
          @endforeach
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-profile">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Edit Password</button>
                </li>

                

              </ul>
              @foreach ($user_list as $key => $item)
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  
                  <h5 class="card-title">Detail Profile:</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{ $item->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $item->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Role Name Akun</div>
                    <div class="col-lg-9 col-md-8">{{ $item->role_name }}</div>
                  </div>
                  @endforeach
                </div>

               

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  @foreach ($user_list as $key => $item)
                  <form action="{{ route('update_password') }}" method="POST">
                  @csrf

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                      <input id="text" type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                      <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                      <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                      <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                  @endforeach

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-profile">
                  <!-- Change Password Form -->
                  @foreach ($user_list as $key => $item)
                  <form action="{{ route('update_profile') }}" method="POST">
                  @csrf

                  <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                      <input id="text" type="hidden" class="form-control" name="id" value="{{ $item->id }}">
                      <input id="name" type="text" class="form-control" name="name" value="{{ $item->name }}">
                      </div>
                    </div>

                  <div class="row mb-3">
                 
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                      <input id="email" type="email" class="form-control" name="email" value="{{ $item->email }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                  </form><!-- End Change Password Form -->
                  @endforeach

                </div>


              </div><!-- End Bordered Tabs -->

             
             

              

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @include('layouts.footer')

