(function ($) {
    "use strict"; // Start of use strict

    /* ---------------------------------------------
     Scripts ready
     --------------------------------------------- */
//    $(document).ready(function () {
//        $("#selectAll").click(function () {
//            $(this).closest('ul').find(':checkbox').attr('checked', this.checked);
//        })
//
//    });
    $(document).ready(function () {
        $("#selectAll").click(function () {
            if ($(this).hasClass('allChecked')) {
                $(this).closest('ul').find(':checkbox').prop('checked', false);
            } else {
                $(this).closest('ul').find(':checkbox').prop('checked', true);
            }
            $(this).toggleClass('allChecked');
        })
        $('#category_filter_form').submit(function (e) {
            var atLeastOneIsChecked = false;
            $('input:checkbox').each(function () {
                if ($(this).is(':checked')) {
                    atLeastOneIsChecked = true;
                    // Stop .each from processing any more items
                    return false;
                }
            });
            if(!atLeastOneIsChecked){
                $('input:checkbox').prop('checked', true);
                return true;
            }
            return true;
            // Do something with atLeastOneIsChecked
        });

    });




})(jQuery); // End of use strict