@extends('layouts.app')

@section('title','Crear clientes')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del cliente" autocomplete="off" value="{{ old('nombre') }}">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Foto</label>
											<input type="file" class="form-control-file" name="photo" id="photo" >
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Direccion</label>
                                            <input type="text" class="form-control" name="address" placeholder="Ingrese la direccion del cliente" autocomplete="off" value="{{ old('nombre') }}">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Telefono</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Ingrese el telefono del cliente" autocomplete="off" value="{{ old('nombre') }}">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email" placeholder="Ingrese el correo del cliente" autocomplete="off" value="{{ old('nombre') }}">
										</div>
									</div>
								</div>

								

								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="registerby" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection