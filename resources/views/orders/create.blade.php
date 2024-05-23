@extends('layouts.app')

@section('title', 'Agregar orden')

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
                                                    <option value="-1">Seleccione el cliente</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}
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
                                            <select id="product" class="form-control select2" name="product_id[]">
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
                                            <input type="number" name="quantity[]">
                                        </div>
                                        <div class="col-2">
                                            <label for="price">Precio</label>
                                            <input type="number" name="price" readonly
                                                value="{{ $products[0]->price }}">
                                        </div>
                                        <div class="col-2">
                                            <label for="subtotal">Subtotal</label>
                                            <input type="number" name="subtotal" value="subtotal" readonly>
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
                                                        <th scope="col">Action</th>
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
        function generateHTML(name, quantity, price) {
            const subtotal = quantity * price;
            return $.parseHTML(`
                <tr>
                    <td>${name}</td>
                    <td>${quantity}</td>
                    <td>$${price}</td>
                    <td>$${subtotal}</td>
                    <td>TODO</td>
                </tr>
                `)
        }

        $(document).ready(function() {
            let listProducts = $('#list-products')
            let addButton = $('#add-btn')

            let productSelect = $('#product')
            productSelect.select2();

            let productPrice = $('[name="price"]')
            let productQuantity = $('[name="quantity"]')
            let productSubtotal = $('[name="subtotal"]')

            let total = 0;

            let totalText = $('#total-text')
            let totalInput = $('[name="total"]')

            addButton.on("click", (e) => {
                e.preventDefault()

                quantity = parseInt(productQuantity.val())
                price = parseInt(productPrice.val())

                total += price * quantity

                totalText.text(Total: ${total})
                totalInput.val(total)

                listProducts.append(generateHTML(
                    productSelect.find(':selected').data('name'),
                    quantity,
                    price,
                ))
            })

            function updateSubtotal() {
                productSubtotal.val(parseInt(productPrice.val()) * parseInt(productQuantity.val()))
            }

            productSelect.on('select2:select', function(e) {
                let price = productSelect.find(':selected').data('price');
                console.log(price)

                productPrice.val(price)

                updateSubtotal()
            });

            productQuantity.on('input', function(e) {
                updateSubtotal()
            })


            updateSubtotal()
        });
    </script>

<script>
 $(document).ready(function() {
    $('.select2').select2();
   
})

</script>
@endpush

