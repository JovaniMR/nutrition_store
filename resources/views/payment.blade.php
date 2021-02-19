<!-- Modal -->
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Pago <span class="material-icons icon icon-success" style="vertical-align: middle">credit_card</span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-0">
                {{-- Payment --}}
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4" style="font-size: 16px">
                            <i class="material-icons" style="vertical-align: middle; font-size:17px">shopping_cart</i>
                            <strong>Resumen del
                                pedido</strong>
                        </div>
                        {{-- Order summary --}}
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th class="text-center" scope="col">Cantidad</th>
                                    <th class="text-center" scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::session(auth()->user()->id)->getContent() as $product)
                                <tr>
                                    <td class="align-middle">
                                        <p><strong>{{ $product->name }}</strong></p>
                                    </td>
                                    <td class="align-middle text-center">{{ $product->quantity }}</td>
                                    <td class="align-middle text-center">$
                                        {{ $product->price * $product->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-right pt-0 pb-0">
                        <h4 class="mr-5">
                            <strong> Total: $ {{ Cart::getSubTotal() }}</strong>
                        </h4>
                    </div>
                </div>
            </div>
            <hr class="w-75 text-center mt-0 mb-0">
            {{-- Botton paypal --}}
            <div class="modal-footer justify-content-center">
                <form action="{{ route('paypal.pay') }}">
                    <input type="hidden" value="{{ Cart::session(auth()->user()->id)->getSubTotal() }}" name="total">
                    <button type="submit" class="myButton0a">
                        <span class="paypal3">¡Pagar Ahora! </span>
                        <span class="paypal1">Pay</span>
                        <span class="paypal2">Pal</span></button>
                </form>
            </div>
        </div>
    </div>
</div>