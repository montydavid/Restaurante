@extends('layouts.app')
@section('tittle','Editar productos')

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
                            <h3>@yield('tittle')</h3>

                        </div>
                        <form method="POST" action="{{route('products.update',$products)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre" autocomplete="off" value="{{$products->name}}">

                                        </div>
                    
                                    </div>

                                </div>
                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Descripcion <strong style="color:red;">(*)</strong></label>
                                            <textarea name="description" id="" cols="120" rows="4">{{$products->description}}</textarea>
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Cantidad <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="stock" placeholder="Ingrese la cantidad del producto" autocomplete="off" value="{{$products->stock}}">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Precio<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price" placeholder="Ingrese el precio del producto" autocomplete="off" value="{{$products->price}}">
										</div>
									</div>
								</div>

                                <div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Imagen</label>
											<input type="file" class="form-control-file" name="image" id="image">
										</div>
									</div>
								</div>

								

								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="registerby" value="{{ Auth::user()->id }}">
                                <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-2 col-xs-4">
                                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>

                                                </div>
                                                <div class="col-lg-2 col-xs-4">
                                                    <a href="{{route('products.index')}}" class="btn btn-danger btn-block btn-flat">Atras</a>

                                                </div>

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