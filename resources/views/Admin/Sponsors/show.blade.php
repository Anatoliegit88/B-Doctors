@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>{{ $sponsor->title }}</h2>
        <p>{{ $sponsor->description }}</p>
        <p> a soli {{ $sponsor->price }} €</p>

        <form action="{{ route('admin.sponsor.store', $sponsor) }}" method="POST" id="payment-form">
            @csrf
           
            <input class="d-none" type="integer" value="{{ $sponsor->id }}" id="id" name="id">

            <section>
                <label for="amount">
                    <span class="input-label">Amount</span>
                    <div class="input-wrapper amount-wrapper">
                        <input id="amount" name="amount" type="tel" min="1" placeholder="Amount"
                            value="10">
                    </div>
                </label>

                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button class="button" type="submit"><span>Test Transaction</span></button>

        </form>
    </div>
    <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = '{{ $token }}'

        braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',

            },

            function(createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }

                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
    </script>
@endsection
