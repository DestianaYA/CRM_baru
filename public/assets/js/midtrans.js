<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    function payWithMidtrans() {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                console.log('success');
                // Handle success result here
            },
            onPending: function(result) {
                console.log('pending');
                // Handle pending result here
            },
            onError: function(result) {
                console.log('error');
                // Handle error result here
            }
        });
    }
