<!-- Antelope.io - Sign-in Component -->
<div class="sign-in-from">

	<h1 class="mb-0">Sign in</h1>
	<p>Please enter your username and password.</p>

	@if($errors->first())
		<x-elements.alert type="danger" message="The username or password that you have entered is incorrect."/>
	@endif

	@if(\Session::has('warning'))
		<x-elements.alert type="warning" message="Your account may be deactivated or there was an error, attempt a re-login or contact an Administrator for more information."/>
	@endif

	<form method="POST" action="{{ route('login') }}" class="mt-4">
		@csrf

		<div class="form-group">
			<label for="username">Username</label>
			<input type="username" class="form-control mb-0 @error('email') is-invalid @enderror" name="username" id="username" @if(env('APP_ENV', 'production') == 'local') value="demouser1" @else value="{{ old('email') }}" @endif placeholder="Username" required>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required @if(env('APP_ENV', 'production') == 'local') value="password" @endif>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="d-inline-block w-100">

			<div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
				<input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
				<label class="custom-control-label" for="remember">Remember Me</label>
			</div>

			<button type="submit" class="btn btn-primary float-right">Sign in</button>

		</div>

	</form>

</div>
<!-- #END - Sign-in Component -->
