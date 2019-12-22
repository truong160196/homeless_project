
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Set the date we're counting down to
    var endDate = $("#timer").data('time');

    if (endDate) {
        var countDownDate = new Date(endDate).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            loadTopAuction($("#auction_id").data('id'));

            // Get today's date and time
            var now = new Date().getTime();
                
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
                
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) + '';
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)) + '';
            var seconds = Math.floor((distance % (1000 * 60)) / 1000) + '';

            hours = hours.length == 2 ? hours : "0" + hours;
            minutes = minutes.length == 2 ? minutes : "0" + minutes;
            seconds = seconds.length == 2 ? seconds : "0" + seconds;
                
            // Output the result in an element with id="demo"
            document.getElementById("timer").innerHTML = "" +
                "<div class='time-box timer-hours'>" + hours + "</div>" +
                "<div class='time-box timer-minutes'>" + minutes + "</div>" +
                "<div class='time-box timer-seconds'>" + seconds + "</div>" +
                "";
            
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    }

    $("#auction-submit").on('click', function() {
        run_waitMe('.page-wrapper');

        var value = $("#auction-price").val();
        var value_current = $("#auction-price").data('current');

        if (value == "") {
            $(".auction-valid").empty().append('Price is required.');
            run_waitMe('.page-wrapper', true);
        } else if (value < value_current + 10) {
            $(".auction-valid").empty().append('The binding value must have a present value of more than 10$.');
            run_waitMe('.page-wrapper', true);
        } else {
            $(".auction-valid").empty();

            $.ajax({
                url : "/auction/binding",
                type : "post",
                data : {
                    id: $("#auction-submit").data('id'),
                    value: value,
                },
                success : function (result){
                    if (result == 'success') {
                        Swal.fire({
                            type: 'success',
                            title: result,
                        });
                        $("#auction-price").data('current', value);
                        $("#auction-price").val(Number(value) + 100);
                    } else {
                        Swal.fire({
                            type: 'warning',
                            title: 'Oops',
                            text: result,
                        });
                    }
                    run_waitMe('.page-wrapper', true);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops',
                        text: 'There was an error during processing'
                    });
                    run_waitMe('.page-wrapper', true);
                }
            });
        }
    });
});

var loadTopAuction = function(id) {
    $.ajax({
        url : "/auction/top-auction/" + id,
        type : "get",
        success : function (result){
            var el_root = $('.top-auction .posts');
            el_root.empty();

            $.each(result, function(idx, val) {
                el_root.append('<div class="post">' +
                    '<div class="details">' +
                        '<h4>' +
                            '<i class="fas fa-user"></i>' +
                            ' ' + val.name +
                        '</h4>' +
                        '<span class="date">' +
                            '<i class="fas fa-hand-holding-usd"></i>' +
                            ' ' + formatNumber(Number(val.value)) + ' $' +
                        '</span>' +
                    '</div>' +
                '</div>');
            })
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // no not thing
        }
    });
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}