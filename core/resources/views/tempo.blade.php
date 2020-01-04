<script type="text/javascript">

    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(".reset-time-limit-buy").click(function(e){

            e.preventDefault(); // otherwise, it won't wait for the ajax response
            $link = $(this); // because '$(this)' will be out of scope in your callback

            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route("reset.time.limit.buy") }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN},
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                    window.location.href = $link.attr('href');
                }
            });

        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(".reset-time-limit-user").click(function(e){

            e.preventDefault(); // otherwise, it won't wait for the ajax response
            $link = $(this); // because '$(this)' will be out of scope in your callback

            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route("reset.time.limit.user") }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN},
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                    window.location.href = $link.attr('href');
                }
            });

        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(".reset-time-limit-exchange").click(function(e){

            e.preventDefault(); // otherwise, it won't wait for the ajax response
            $link = $(this); // because '$(this)' will be out of scope in your callback

            $.ajax({
                /* the route pointing to the post function */
                url: '{{ route("reset.time.limit.exchange") }}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN},
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) { 
                    window.location.href = $link.attr('href');
                }
            });

        });
    });

</script>