<x-layouts.master>
  @slot('title')
   User List
  @endslot
<div class="card mb-4">
<div class="card-header " style="background-color: #defffe">
      <i class="fas fa-table me-1"></i>
      User-register
      {{-- <a href="{{ route('users.create') }}"> <button class="btn btn-outline-info btn-sm text-black">Add New User</button></a> --}}

  </div>

 {{-- <x-backend.alertmessage.alertmessage type="success"/> --}}
 <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
            <div class="col-lg-6 mx-auto">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Register User</h1>
                    </div>
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                        </div>
                        <div class="form-group">
                            @if (auth()->user()->role_id==1)
                            <select id="role" class="form-control" name="role">
                                <option selected>User Type</option>
                              
                                <option value="1">Admin</option>
                                <option value="2">Staff</option>
                                <option value="3">Doctor</option>
                                <option value="4">User</option>
                                 
                            </select>
                            @else
                            <select id="role1" class="form-control" name="role">
                                <option selected>User Type</option>
                              
                                 
                                <option value="3">Doctor</option>
                              
                                <option value="4">User</option>
                            </select>
                            @endif
                                
                        </div>
                        {{-- <input type="hidden" name="status" value="inactive"> --}}
                        <button class="btn btn-primary btn-user btn-block">
                            Register
                        </button>
                        {{-- <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a> --}}
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 
</x-layouts.master>