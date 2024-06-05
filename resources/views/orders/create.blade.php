@extends('layouts.app')

@section('title', 'Add order')

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
                            <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body" id="form-fields">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Cliente<strong
                                                        style="color:red;">(*)</strong></label>
                                                <select type="text" class="form-control select2" name="customer"
                                                    value="{{ old('customer') }}">
                                                    <option value="-1">Ingrese el cliente</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}
                                                            ({{ $customer->document }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <input type="hidden" class="form-control" name="status" value="1">
                                            <input type="hidden" class="form-control" name="registerby"
                                                value="{{ Auth::user()->id }}">
                                        </div>
                                    </div>

                                    <div class="row mt-2" data-details-field=true>
                                        <div class="col-3 mt-4">
                                            <select id="product" class="form-control select2">
                                                <option value="-">Seleccione un producto</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                                                        data-name="{{ $product->name }}">
                                                        {{ $product->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <label for="quantity">Cantidad</label>
                                            <input type="number" name="quantity">
                                        </div>
                                        <div class="col-2">
                                            <label for="price">Precio</label>
                                            <input type="number" name="price" readonly value="">
                                        </div>
                                        <div class="col-2">
                                            <label for="subtotal">Subtotal</label>
                                            <input type="number" name="subtotal" readonly>
                                        </div>
                                        <div class="col-2 ml-5 mt-3">
                                            <button class="btn btn-primary" id="add-btn">
                                                Agregar
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-11 m-5">
                                            <table class="table border">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Producto</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Precio</th>
                                                        <th scope="col">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tbody id="list-products">
                                                </tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-4">
                                            <span class="h3 d-block text-center m-1" id="total-text">
                                                Total: $0
                                            </span>
                                        </div>
                                        <input name="total" hidden>
                                        <div class="col-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-block btn-flat">Registrar</button>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{ route('orders.index') }}"
                                                class="btn btn-danger btn-block btn-flat">Regresar</a>
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

    <style>
        .select2 [role="textbox"] {
            margin-top: -8px !important;
            margin-left: -8px !important;
        }
    </style>
@endsection

@push('scripts')
    <script>
        class Order {
            constructor(id, name, quantity, price) {
                this.id = id;
                this.name = name;
                this.price = price;
                this.quantity = quantity;
            }

            get subtotal() {
                return this.price * this.quantity;
            }

            generateHTML() {
                return `
                <tr>
                    <td>${this.name}</td>
                    <td>${this.quantity}</td>
                    <td>$${this.price}</td>
                    <td>$${this.subtotal}</td>
                    <input hidden name="product_id[]" value="${this.id}">
                    <input hidden name="quantity[]" value="${this.quantity}">
                </tr>
                `
            }
        }

        // Nodes (DOM).
        let nodeInputPrice = document.querySelector('[name="price"]')
        let nodeInputQuantity = document.querySelector('[name="quantity"]')
        let nodeInputSubtotal = document.querySelector('[name="subtotal"]')
        let nodeInputTotal = document.querySelector('[name="total"]')
        let nodeListProducts = document.querySelector('#list-products')

        function clearInputFields() {
            nodeInputPrice.value = ''
            nodeInputQuantity.value = ''
            nodeInputSubtotal.value = ''
        }

        const orders = []

        function pushOrder(order) {
            orders.push(Object.assign(Object.create(Object.getPrototypeOf(order)), order))

            let total = 0;
            for (let order of orders) {
                total += order.subtotal
            }

            document.querySelector('#total-text').innerText = `Total: $${total}`
            document.querySelector('[name="total"]').value = total
            nodeInputTotal.value = total

            nodeListProducts.innerHTML += order.generateHTML()
        }

        let currentOrder = new Order("", "", 0, 0)

        function updateCurrentOrder() {
            nodeInputPrice.value = currentOrder.price
            nodeInputQuantity.value = currentOrder.quantity
            nodeInputSubtotal.value = currentOrder.subtotal
        }

        $(document).ready(function() {
            $('.select2').select2()

            let productSelect = $('#product')
            productSelect.select2();

            $('#add-btn').on("click", (e) => {
                e.preventDefault()

                pushOrder(currentOrder)

                clearInputFields()
                productSelect.val('-')
                productSelect.trigger('change');
            })

            productSelect.on('select2:select', function(e) {
                currentOrder.id = parseInt(productSelect.find(':selected').val())
                currentOrder.name = productSelect.find(':selected').data('name')
                currentOrder.price = parseInt(productSelect.find(':selected').data('price'))
                currentOrder.quantity = 0

                updateCurrentOrder()
            });
        });

        nodeInputQuantity.addEventListener('input', () => {
            currentOrder.quantity = parseInt(nodeInputQuantity.value)
            updateCurrentOrder()
        })
    </script>
    <script>
        $(document).ready(function() {
        $('.select2').select2();
   
        })

    </script>
@endpush









