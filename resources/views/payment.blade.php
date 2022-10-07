@extends('index')

@section('content')
<div class="payment-div">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="success">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="error">
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <form action="{{ url('payment') }}" method="post" id="payment-form">
            @csrf
            <div class="form-row">
                <p><input type="text" class="form-controll" name="amount" placeholder="Enter Amount" /></p>
                <label for="card-element">
                    Credit or debit card
                </label>
                <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            <p><button>Submit Payment</button></p>
        </form>
    </div>
</div>
@endsection