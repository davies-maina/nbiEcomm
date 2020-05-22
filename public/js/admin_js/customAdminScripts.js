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

    $(".updateCategoryStatus").click(function() {

        let status = $(this).text();
        let category_id = $(this).attr("category_id");
        /*  alert(status);
         alert(section_id); */

        $.ajax({
            type: 'post',
            url: '/admin/update-category-status',
            data: { status: status, category_id: category_id },
            success: function(resp) {
                /*  alert(resp['status']);
                alert(resp['section_id']);
 */
                if (resp['status'] == 0) {
                    $("#category-" + category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Inactive</a>");
                } else if (resp['status'] == 1) {
                    $("#category-" + category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Active</a>");
                }


            },
            error: function() {

                /*  alert('error'); */
            }

        });


    });

    $(".updateProductStatus").click(function() {

        let status = $(this).text();
        let product_id = $(this).attr("product_id");
        /*  alert(status);
         alert(section_id); */

        $.ajax({
            type: 'post',
            url: '/admin/update-product-status',
            data: { status: status, product_id: product_id },
            success: function(resp) {
                /*  alert(resp['status']);
                alert(resp['section_id']);
 */
                if (resp['status'] == 0) {
                    $("#product-" + product_id).html("<a class='updateProductStatus' href='javascript:void(0)'>Inactive</a>");
                } else if (resp['status'] == 1) {
                    $("#product-" + product_id).html("<a class='updateProductStatus' href='javascript:void(0)'>Active</a>");
                }


            },
            error: function() {

                /*  alert('error'); */
            }

        });


    });
    $('#section_id').change(function() {
            let section_id = $(this).val();
            $.ajax({
                type: 'post',
                url: '/admin/append-categories-level',
                data: {
                    section_id: section_id
                },
                success: function(res) {
                    $('#appendCategoriesLevel').html(res);

                },
                error: function() {

                    alert('error')
                }
            });

        })
        /*   $('#section_id').change(function() {
              let section_id = $(this).val();
              $.ajax({
                  type: 'post',
                  url: '/admin/append-categories-level',
                  data: {
                      section_id: section_id
                  },
                  success: function(res) {
                      $('#appendCategoriesLevelProduct').html(res);

                  },
                  error: function() {

                      alert('error')
                  }
              });

          }) */

    //confirm delete
    $('.confirmDelete').click(function() {
        var name = $(this).attr('name');
        if (confirm('Are you sure you want to delete this ' + name + '?')) {
            return true
        }
        return false;
    });

    $(document).ready(function() {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML =
            '<div><input type="text" name="sku[]" id="sku" value=""/ class="form-control" placeholder="store keeping unit"><input type="text" name="size[]" id="size" value=""/ class="form-control" placeholder="size"><input type="text" name="price[]" id="price" value=""/ class="form-control" placeholder="price"><input type="text" name="stock[]" id="stock" value=""/ class="form-control" placeholder="stock"><a href="javascript:void(0);" class="remove_button">-Remove</a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
});