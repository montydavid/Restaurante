@extends('layouts.app')

@section('title', 'Bill')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row p-3 mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detalles de la orden</h5>
                                <p class="card-text"><strong># de la orden:</strong> {{ $order->id }}</p>
                                <p class="card-text"><strong>Fecha:</strong> {{ $order->dateOrder }}</p>
                                <p class="card-text"><strong>Total:</strong> ${{ $order->total }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detalles del cliente</h5>
                                <p class="card-text"><strong>Cliente:</strong> {{ $customer->name }}</p>
                                <p class="card-text"><strong>Documento:</strong> {{ $customer->document }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Items de la orden</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($details as $detail)
                                    <tr>
                                        <td>{{ $detail->products->name }}</td>
                                        <td>${{ number_format($detail->products->price, 2) }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>${{ number_format($detail->subtotal, 2) }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer mt-4">
                                    <div class="row">
                                        <div class="mx-auto">
                                            <a href="{{ route('orders.index') }}"
                                                class="btn btn-danger btn-block btn-flat">Regresar</a>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection