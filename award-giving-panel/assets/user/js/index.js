/* Window on load */
$('#application_type').show(500, 'easeOutBounce');
$('.lead_videographer').hide(500, 'easeOutBounce');
$('.media-and-link').show(500, 'easeOutBounce');
$('.media-only').hide(500, 'easeOutBounce');
$('.media-link-only').hide(500, 'easeOutBounce');


$(window).on('load', function(){
    var category = $('#category').val();
    if(category == 1){
        $('#application_type').show(500, 'easeOutBounce');
        $('.lead_videographer').hide(500, 'easeOutBounce');
        $('.media-and-link').show(500, 'easeOutBounce');
        $('.media-only').hide(500, 'easeOutBounce');
        $('.media-link-only').hide(500, 'easeOutBounce');

    }
});


/* Application Type by Selecting Category */
$('#category').on('change', function() {
    function removeAppend(){
        if ($(".mediaDiv")[1]){
            swal({
                title: "Dear applicant",
                text: "Since you're changing category, your extra submissions will be removed",
                icon: "error",
                button: "Ok",
              });
              $(".mediaDiv").slice(1, 3).remove();
        }
    }
    var $item = this.value;
    if($item == 1){
        $('#application_type').show(500, 'easeOutBounce');
        $('.lead_videographer').hide(500, 'easeOutBounce');
        $('.media-and-link').show(500, 'easeOutBounce');
        $('.media-only').hide(500, 'easeOutBounce');
        $('.media-link-only').hide(500, 'easeOutBounce');
        removeAppend();
    }
    if($item == 2){
        $('#application_type').show(500, 'easeOutBounce');
        $('.lead_videographer').show(500, 'easeOutBounce');
        $('.media-and-link').hide(500, 'easeOutBounce');
        $('.media-only').hide(500, 'easeOutBounce');
        $('.media-link-only').show(500, 'easeOutBounce');
        removeAppend();
    }
    if($item == 3){
        $('#application_type').show(500, 'easeOutBounce');
        $('.lead_videographer').hide(500, 'easeOutBounce');
        $('.media-and-link').hide(500, 'easeOutBounce');
        $('.media-only').hide(500, 'easeOutBounce');
        $('.media-link-only').show(500, 'easeOutBounce');
        removeAppend();
    }
    if($item == 4){
        $('#application_type').hide(500, 'easeOutBounce');
        $('.lead_videographer').hide(500, 'easeOutBounce');
        $('.media-and-link').hide(500, 'easeOutBounce');
        $('.media-only').show(500, 'easeOutBounce');
        $('.media-link-only').hide(500, 'easeOutBounce');
        removeAppend();
    }
});






/* Add More Submission Alert and Clone */
var i =0;
$('#addMoreSubmission').click(
    function(){
        i++;
        if ($(".mediaDiv")[2]){
            swal({
                title: "Dear applicant",
                text: "You can't submit more than 3",
                icon: "error",
                button: "Ok",
              });
        } else {
            $(".mediaDiv:last()").clone().insertAfter(".mediaDiv:last");
			
			$(".mediaDiv:last()").find('span').html('Submission details '+i);
            $(".mediaDiv:last()").find("#collapse-card").attr("data-target","#collapse"+i);
            $(".mediaDiv:last()").find("#collapse").addClass("show");
            $(".mediaDiv:last()").find("#collapse").attr("id","#collapse"+i);

            $(".uploaded-image-div:last()").each("img").attr("src", "img/placeholder.png");
        }
});

/* Type Checkbox select only one */
$('.submission-type').on('change', function() {
    $('.submission-type').not(this).prop('checked', false);  
});