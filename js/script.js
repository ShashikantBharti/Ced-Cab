$(document).ready(function() {

    // Validation in luggage to allow only numbers
    $('#luggage').on('blur', function(e) {
        let luggage = $(this).val();
        if(isNaN(luggage)){
            alert('Only Numbers Allowed!');
            $(this).val('');
        }
    });
 
    // hide location in drop field which is selected in pickup field
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

    // hide location in pickup field which is selected in drop field
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

    // hide luggage field if CedMicro Cab is selected.
    $('select[name="cab_type"]').on('change', function() {
        if ($(this).val() == 1) {
            $('.luggage').hide();
            $('.luggage input').val('');
        } else {
            $('.luggage').show();
        }
    });

    // Sorting
    $('#sort').on('change',function(){
        let field = $(this).val();
        let user_id = $('#user_id').val();
        let status = $('#status').val();
        data = {user_id:user_id, field: field, status:status, type: 1}
        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: showData,
        });
    });

    // Filter
    $('#filter').on('change', function(){
        let field = $(this).val();
        let user_id = $('#user_id').val();
        let status = $('#status').val();
        data = {field: field, user_id: user_id, status: status, type: 2}
        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: showData,
        });
    });

    function showData(res) {
        let html = '';
        $.each(res,function(index, item){
            html += `<tr>`;
            html += `<td>${++index}</td>`;
            html += `<td>${item.pickup_loc}</td>`;
            html += `<td>${item.drop_loc}</td>`;
            html += `<td>${item.total_distance} KM</td>`;
            html += `<td>${item.luggage} KG</td>`;
            html += `<td>Rs. ${item.total_fare}/-</td>`;
            html += `<td>${item.ride_date}</td>`;
            html += `<td>`;
            if(item.status == -1){
                html += `Cancelled`;
            } else if(item.status == 0) {
                html += `Inactive`;
            } else if(item.status == 1) {
                html += 'Approved';
            } else {
                html += 'Completed';
            }
            html += `</td>`;
            html += `<td>`;
            if(item.status == -1){
                html += `<a href="?action=delete&id=${user_id}" title="Delete"><i class="fas fa-trash-alt delete"></i></a>`;
            } else if(item.status == 0) {
                html += `<a href="?action=-1&id=${user_id}" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a>`;
            } else if(item.status == 1) {
                html += `<a href="?action=2&id=${user_id}" title="Completed"><i class="completed fas fa-thumbs-up"></i></a>`;
                html += `<a href="?action=-1&id=${user_id}" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a>`;
            } else {
                html += `<a href="?action=delete&id=${user_id}" title="Delete"><i class="fas fa-trash-alt delete"></i></a>`;
            }
            html += `</td>`;
            html += `</tr>`;
            $('#showData').html(html);
        });
    }

    // Calculate Fare
    $('#calFare').on('click',function(e){
        e.preventDefault();
        let pickup = $('#pickup').val();
        let drop = $('#drop').val();
        let cab_type = $('#cab_type').val();
        let luggage = $('#luggage').val();
        if(pickup == '' || drop == '' || cab_type == '') {
            alert('please choose options?');
        } else {
            data = {pickup:pickup, drop:drop, cab_type:cab_type, luggage:luggage}
            
            $.ajax({
                url: "calculate_fare.php",
                method: "POST",
                data: data,
                success: function(res){
                    $('#calFare').html(`Calculate Fare : <strong>Rs. ${res}/-</strong>`);
                },
            });
        }
    });

    
});