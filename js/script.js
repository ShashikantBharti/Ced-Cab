$(document).ready(function() {
    $('#luggage').on('keyup', function(e) {
        if (!($(this).val().charCodeAt(0) >= 48 && $(this).val().charCodeAt(0) <= 57) && e.keyCode !== 8) {
            $(this).val('');
            alert('Only Numbers Allowed !!');
        }
    });

    $('select[name="pickup"]').on('change', function() {
        let location = $(this).val();
        let option = $('select[name="drop"]').children();
        $.each(option, function(index, item) {
            if (item.innerText == location) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });

    $('select[name="drop"]').on('change', function() {
        let location = $(this).val();
        let option = $('select[name="pickup"]').children();
        $.each(option, function(index, item) {
            if (item.innerText == location) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });



    
    $('select[name="cab_type"]').on('change', function() {
        if ($(this).val() == 1) {
            $('.luggage').hide();
            $('.luggage input').val('');
        } else {
            $('.luggage').show();
        }
    });
/*
    function calculateFare(e) {
        e.preventDefault();
        let data = new FormData(this);
        let html = '';
        $.ajax({
            url: "fare.php",
            method: "POST",
            data: data,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(res) {
                html += `<div class="d-flex justify-content-between">Pickup Point : <strong>${res.pickup}</strong></div>`;
                html += `<div class="d-flex justify-content-between">Drop Point : <strong>${res.drop}</strong></div>`;
                html += `<div class="d-flex justify-content-between">Total Distance : <strong>${res.distance} Km</strong></div>`;
                if(res.luggage != ''){
                    html += `<div class="d-flex justify-content-between">Total Weight : <strong>${res.luggage} Kg</strong></div>`;
                }
                html += `<div class="d-flex justify-content-between">Total Fare : <strong>Rs. ${res.fare}/-</strong></div>`;
                $('#result').html(html);
            }
        });
    }

    */
});