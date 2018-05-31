@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Register') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf

					<!--	<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('昵称') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>
						-->			
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('邮箱地址') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

								@if ($errors->has('email'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('密码') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

								@if ($errors->has('password'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif
							</div>
						</div>
							<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('验证密码') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
							</div>
						</div>
						
						<label for="identy" class="col-md-4 col-form-label text-md-right">
							 <input type="radio" name="identy" id="optionsRadios1" value="1" checked>
								{{	__('学生')}}
						</label>
						<label for="identy" class="col-md-4 col-form-label text-md-right">
								<input type="radio" name="identy" id="optionsRadios2" value="0">
									{{	__('老师')}}
						</label>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('立即注册') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
