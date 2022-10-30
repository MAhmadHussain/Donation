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

        <div class="row">
            <div class="col-lg-7">
                <div class="donate-now__payment-info">
                    <h3 class="donate-now__title">Payment info</h3>
                    <form action="{{ url('payment') }}" method="post" id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="donate-now__payment-info-input">
                                    <input type="text" placeholder="Card number" name="number">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="donate-now__payment-info-input">
                                    <input type="text" placeholder="MM / YY" name="date" id="datepicker" class="hasDatepicker">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="donate-now__payment-info-input">
                                    <input type="text" placeholder="Card code ( CVC )" name="code">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="donate-now__payment-info-input">
                                    <input type="text" placeholder="Card Holder Name" name="cardholder-name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="donate-now__payment-info-input">
                                    <input type="text" placeholder="Billing address" name="Billing">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="donate-now__payment-info-input">
                                    <input type="text" placeholder="City" name="City">
                                </div>
                            </div>
                        </div>
                        <div class="donate-now__payment-info-btn-box">
                            <button type="submit" class="thm-btn donate-now__payment-info-btn">Donate
                                now</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5"></div>
        </div>
    </div>
</div>
@endsection