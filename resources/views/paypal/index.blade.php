@extends('layout.app')
@push('head')
<script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD&intent=capture">
</script>
@endpush
@section('content')

<div id="payment_options"></div>
<script>
    paypal.Buttons({
    createOrder: function() {
        return fetch('paypal/create/10')
        .then((response) => response.text())
        .then((id) => {return id;});
    },
    onApprove: function () {
      return fetch("/paypal/complete", {method: "post", headers: {"X-CSRF-Token": '{{csrf_token()}}'}})
        .then((response) => response.json())
        .then((order_details) => {
          console.log(order_details);
        })
        .catch((error) => {
          console.log(error);
        });
    },

    onCancel: function (data) {
      console.log(data);
    },

    onError: function (err) {
      console.log(err);
    }
}).render('#payment_options');
</script>
@endsection