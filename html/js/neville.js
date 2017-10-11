$("form").submit(function(e) {
    var ref = $(this).find("[required]");

    $(ref).each(function() {
        if ( $(this).val() == '' ) {
            alert("Required fields should not be blank.");

            $(this).focus();

            e.preventDefault();
            return false;
        }
    });  return true;
});