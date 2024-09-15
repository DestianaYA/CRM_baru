
        $(document).ready(function(){
            $('#fetchMessages').click(function(){
                var user_id = $('#user_id').val();
                $.ajax({
                    url: '/messages/' + user_id,
                    method: 'GET',
                    success: function(response) {
                        if(response.length > 0) {
                            $('#messageContainer').show();
                            $('#message').val(response[0].message);
                        } else {
                            alert('No messages found for this user.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while fetching the messages.');
                    }
                });
            });
        });