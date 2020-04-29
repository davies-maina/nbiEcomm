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

                alert('error')
            }


        })

    });
});