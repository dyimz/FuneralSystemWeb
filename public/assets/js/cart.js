
    function addToCart() {
        var form = document.getElementById('addToCartForm');
        var formData = new FormData(form);

        // Send an AJAX request to your backend
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server
            console.log(data);

            // You can update the UI here if needed

        })
        .catch(error => console.error('Error:', error));
    }

