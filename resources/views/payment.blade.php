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
                <input id="card-holder-name" type="text">

                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>

                <button id="card-button">card-holder-name
                    Process Payment
                </button>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
        </form>
    </div>
</div>
@endsection