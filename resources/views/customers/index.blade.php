@extends('layouts.app')
@section('tittle','Listado de clientes')

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
              
                  <a href="{{route('customers.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus nav-icon"></i></a>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead class="thead-light">
                  <tr>
                    <th width="10px">ID</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($customers as $customer)
                  <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>@if ($customer->photo!=null)
											<center><p><img class="img-responsive img-thumbnail" src="{{ asset('uploads/customers/'.$customer->photo) }}" style="height: 70px; width: 70px;" alt=""></p></center>
										@elseif ($customer->photo==null)
										@endif
                    </td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                    <td>
										
						          <input data-id="{{$customer->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" 
						          data-toggle="toggle" data-on="Activo" data-off="Inactivo" {{ $customer->status ? 'checked' : '' }}>
										
					          </td>
                    <td>
                        <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-info btn-sm" tittle="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>  
                        <form class="d-inline delete-form" action="{{route('customers.destroy',$customer)}}" method="POST">
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
				var customer_id = $(this).data('id');
				$.ajax({
					type: "GET",
					dataType: "json",
					url: 'changestatuscustomer',
					data: {'status': status, 'customer_id': customer_id},
					success: function(data){
					  console.log(data.success)
					}
				});
			})
		  })
	</script>
@endpush