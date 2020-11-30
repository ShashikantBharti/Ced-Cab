$(document).ready(function(){

    $('#sort').on('change',function(){
        let field = $(this).val();
        let status = $('#status').val();
        data = {field:field, status:status, table:1}
        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: showData,
        });
    });
 
    // Sort User. 
    $('#sort_user').on('change',function(){

        let field = $(this).val();
        let is_block = $('#is_block').val();
        data = {field:field, is_block:is_block, table: 2}

        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: function(res) {
                let html = '';
                $.each(res, function(index, item){
                    html += `<tr>`;
                    html += `<td>${++index}</td>`
                    html += `<td>${item.name}</td>`
                    html += `<td>${item.user_name}</td>`
                    html += `<td>${item.mobile}</td>`
                    html += `<td>${item.date_of_signup}</td>`
                    html += `<td>`;
                    if(item.is_block) {
                        html += "Active";
                    } else {
                        html += "Inactive";
                    }   
                    html += `</td>`;
                    html += `<td>`;
                    if(!item.is_block) {
                        html += `<a href="?action=active&id=${item.user_id}" title="Active"><i class="inactive fas fa-toggle-off"></i></a> `;
                    } else {
                        html += ` <a href="?action=inactive&id=${item.user_id}" title="Inactive"><i class="active fas fa-toggle-on"></i></a>  `;
                    }
                    html += ` <a href="details.php?id=${item.user_id}" title="Details"><i class="fas fa-eye details"></i></a>  `;
                    html += ` <a href="?action=delete&id=${item.user_id}" title="Delete"><i class="fas fa-trash-alt delete"></i></a> `;
                    html += `</td>`;
                    html += `</tr>`;
                });
                $('#showData').html(html);
            },
        });
    });

    // Sort Location.
    $('#sort_location').on('change',function(){

        let field = $(this).val();
        let is_available = $('#is_available').val();
        data = {field: field, is_available:is_available, table:3}

        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: function(res){
                let html = '';
                $.each(res, function(index, item){
                    html += `<tr>`;
                    html += `<td>${++index}</td>`;
                    html += `<td>${item.name}</td>`;
                    html += `<td>${item.distance}</td>`;
                    html += `<td>`;
                    if(item.is_available == 1) {
                        html += "Yes";
                    } else {
                        html += "No";
                    }
                    html += `</td>`;
                    html += `<td>`;
                    if(item.is_available == 1) {
                        html += ` <a href="?action=inactive&id=${item.id}"><i class="active fas fa-toggle-on"></i></a> `;
                    } else {
                        html += ` <a href="?action=active&id=${item.id}"><i class="inactive fas fa-toggle-off"></i></a> `;
                    }
                    html += ` <a href="add_location.php?id=${item.id}"><i class="fas fa-edit edit"></i></a> `;
                    html += ` <a href="?action=delete&id=${item.id}"><i class="fas fa-trash-alt delete"></i></a> `;
                    html += `</td>`;
                    html += `</tr>`;
                });

                $('#showData').html(html);
            },
        });
        
    });

    // Filter Data.
    $('#filter').on('change',function(){
        let duration = $(this).val();
        let status = $('#status').val();
        data = {duration: duration, status:status, table: 4}
        
        $.ajax({
            url: "sort_data.php",
            method: "POST",
            data: data,
            dataType: "json",
            success: showData,
        });

    });

    // Function to show data in ride table.
    function showData(res) {
        let html = '';
        let i = 0;
        $.each(res[0], function(index, item) {
            html += `<tr>`;
            html += `<td>${++index}</td>`;
            html += `<td>${item.pickup_loc}</td>`;
            html += `<td>${item.drop_loc}</td>`;
            html += `<td>${item.total_distance}</td>`;
            html += `<td>${item.luggage}</td>`;
            html += `<td>${item.total_fare}</td>`;
            html += `<td>${item.ride_date}</td>`;
            html += `<td>${res[1][i]}</td>`;
            html += `<td>`;
            if(item.status == -1) {
                html += 'Cancelled';
            } else if(item.status == 0) {
                html += 'Pending';
            } else if(item.status == 1) {
                html += 'Approved';
            } else {
                html += 'Completed';
            }
            html += `</td>`;
            html += '<td>';
            if(item.status == -1) {
                html += `<a href="?action=0&id=${item.ride_id}" title="Approve"><i class="inactive fas fa-toggle-off"></i> </a>`;
                html += `<a href="?action=delete&id=${item.ride_id}" title="Delete"><i class="fas fa-trash-alt delete"></i></a>`;
            } else if(item.status == 0) {
                html += `<a href="?action=0&id=${item.ride_id}" title="Approve"><i class="inactive fas fa-toggle-off"></i> </a>`;
                html += `<a href="?action=-1&id=${item.ride_id}" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a>`;
            } else if(item.status == 1) {
                html += `<a href="?action=2&id=${item.ride_id}" title="Complete"><i class="completed fas fa-thumbs-up"></i></a>`;
                html += `<a href="?action=-1&id=${item.ride_id}" title="Cancel"><i class="cancelled fas fa-thumbs-down"></i></a>`;
            } else {
                html += `<a href="?action=delete&id=${item.ride_id}" title="Delete"><i class="fas fa-trash-alt delete"></i></a>`;
            }
            html += '</td>';
            html += '</tr>';
            i++;
        });
        $('#showData').html(html);
        console.log(res);
    }
});