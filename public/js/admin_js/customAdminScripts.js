$(document).ready(function() {

    $("#current_pwd").keyup(function() {

        let current_pwd = $("#current_pwd").val();
        $.ajax({
            type: 'post',
            url: '/admin/check-current-password',
            data: { current_pwd: current_pwd },
            success: function(resp) {

                if (resp == 'true') {

                    $('#checkCurrentPassword').html("<font color=lime>Current password is correct</font>");
                } else if (resp == 'false') {
                    $('#checkCurrentPassword').html("<font color=red>Current password is incorrect</font>")
                }
            },
            error: function() {

                /* alert('error') */
            }


        })

    });

    $(".updateSectionStatus").click(function() {

        let status = $(this).text();
        let section_id = $(this).attr("section_id");
        /*  alert(status);
         alert(section_id); */

        $.ajax({
            type: 'post',
            url: '/admin/update-section-status',
            data: { status: status, section_id: section_id },
            success: function(resp) {
                /*  alert(resp['status']);
                alert(resp['section_id']);
 */
                if (resp['status'] == 0) {
                    $("#section-" + section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
                } else if (resp['status'] == 1) {
                    $("#section-" + section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>");
                }


            },
            error: function() {

                /*  alert('error'); */
            }

        });
    });
});