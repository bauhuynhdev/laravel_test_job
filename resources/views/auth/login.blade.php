@extends('layouts.default')
@section('title', 'Login')
@section('body', 'login-page')
@section('content')
	<div class="login-box">
		@if(session()->has('danger'))
			<div class="col-md-12">
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<span>{{ session('danger') }}</span>
				</div>
			</div>
	@endif
	<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			
			<form action="{{ route('Auth.postLogin') }}" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="userid" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="pass" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-4 col-xs-offset-8">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->
@stop