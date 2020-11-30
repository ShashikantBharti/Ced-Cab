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


    // Sorting
    $('#sort').on('change',function(){
        let field = $(this).val();
        let user_id = $('#user_id').val();
        let status = $('#status').val();
        data = {user_id:user_id, field: field, status:status}
        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: function(res){
                let html = '';
                let sr = 1;
                $.each(res,function(index, item){
                    html += `<tr>`;
                    html += `<td>${sr}</td>`;
                    html += `<td>${item.pickup_loc}</td>`;
                    html += `<td>${item.drop_loc}</td>`;
                    html += `<td>${item.total_distance} KM</td>`;
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
                    sr++;
                    $('#showData').html(html);

                });
            },

        });
    });

    
});