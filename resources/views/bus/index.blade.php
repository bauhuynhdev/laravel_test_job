@extends('layouts.default')
@section('title', 'Admin')
@section('body', 'skin-blue sidebar-mini')
@section('content')
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="../../index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>LTE</span> </a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					<span class="icon-bar"></span> </a>
				
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="hidden-xs">Alexander Pierce</span> </a>
							<ul class="dropdown-menu">
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-right">
										<a href="{{ route('Auth.getLogout')  }}" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li>
						<a href="{{ route('Bus.getIndex') }}"> <i class="fa fa-calendar"></i> <span>Bus</span></a>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				{{--<h1>--}}
				{{--Simple Tables--}}
				{{--<small>preview of simple tables</small>--}}
				{{--</h1>--}}
				<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
					Launch Default Modal
				</button>
				{{--<ol class="breadcrumb">--}}
				{{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
				{{--<li><a href="#">Tables</a></li>--}}
				{{--<li class="active">Simple</li>--}}
				{{--</ol>--}}
			</section>
			
			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<form action="{{ route('Bus.postBus') }}" method="post">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
								{{--<h4 class="modal-title">Default Modal</h4>--}}
							</div>
							<div class="modal-body">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Fence name" name="fence_name">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Location" name="location">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Type" name="type">
								</div>
								{{--<p>One fine body&hellip;</p>--}}
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</form>
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			
			<!-- Main content -->
			<section class="content">
				<div class="row">
					@if(session()->has('success'))
						<div class="col-md-12">
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<span>{{ session('success') }}</span>
							</div>
						</div>
					@elseif(session()->has('danger'))
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<span>{{ session('danger') }}</span>
							</div>
						</div>
					@endif
					<div class="col-md-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Bordered Table</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table class="table table-bordered">
									<tr>
										<th>Plate num</th>
										<th>Gps num</th>
										<th>Location</th>
										<th>Date</th>
									</tr>
									@foreach($busList as $bus)
										<tr>
											<td>{{ $bus['plate_num'] }}</td>
											<td>{{ $bus['gps_num'] }}</td>
											<td>{{ $bus['location'] }}</td>
											<td>{{ $bus['date'] }}</td>
										</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
	</div>
@stop