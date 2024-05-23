@extends('layouts.app')
@section('tittle','Listado de productos')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        @include('layouts.partial.msg')
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title text-lg">@yield('tittle')</h3>
              
                  <a href="{{route('products.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus nav-icon"></i></a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="example1" class="table table-bordered mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th width="10px" scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Image</th>
                      <th scope="col">Price</th>
                      <th scope="col">Stock</th>
                      <th scope="col">State</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>@if ($product->image!=null)
											<center><p><img class="img-responsive img-thumbnail" src="{{ asset('uploads/products/'.$product->image) }}" style="height: 70px; width: 70px;" alt=""></p></center>
										@elseif ($product->image==null)
										@endif
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
										
						          <input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
						          data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $product->status ? 'checked' : '' }}>
										
					          </td>
                    <td>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-info btn-sm" tittle="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>  
                        <form class="d-inline delete-form" action="{{route('products.destroy',$product)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" tittle="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>    
                  </tr>
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
<!-- /.content -->
</div>
@endsection
@push('scripts')
<script type="text/javascript">
		$(function () {
			$("#example1").DataTable({
				"responsive": true, 
				"lengthChange": false, 
				"autoWidth": false
				//"buttons": ["excel", "pdf", "print", "colvis"],
				
			});//.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
</script>
<script>
	$('.delete-form').submit(function(e){
		e.preventDefault();
		Swal.fire({
			title: 'Estas seguro?',
			text: "Este registro se eliminara definitivamente",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aceptar',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.isConfirmed) {
				this.submit();
			}
		})
	});
</script>
	@if(session('eliminar') == 'ok')
		<script>
			Swal.fire(
				'Eliminado',
				'El registro ha sido eliminado exitosamente',
				'success'
			)
		</script>
	@endif
<script>
		$(document).ready(function(){
			$("example1").DataTable()
		});
		$(function() {
			$('.toggle-class').change(function() {
				var status = $(this).prop('checked') == true ? 1 : 0;
				var product_id = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'changestatusproduct',
					data: {'status': status, 'product_id': product_id},
					success: function(data){
					  console.log(data.success)
					}
				});
			})
		  })
	</script>
@endpush