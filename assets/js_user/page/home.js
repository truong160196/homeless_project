$(document).ready(function() {
    // loadTopDonate();

    // loadTopAuction();
});

function loadTopDonate() {
    $.ajax({
        type: "GET",
        url: '/donate/top-donate',
        success: function(response){
            console.log(response);
        },
        error: function (request, status, error) {
            //
        }
   });
}

function loadTopAuction() {
    $.ajax({
        type: "GET",
        url: '/auction/top-auction',
        success: function(response){
            console.log(response);
        },
        error: function (request, status, error) {
            //
        }
   });
}