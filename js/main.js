$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
    });
})

$(document).ready(function() {
    $('#example').DataTable();
} );

function loadSkillgraph() {
$(".skillData").each(function(index, element) {
    // element == this
    var mydata = $(element).data();
    var cnt = 0;

    //recursive call with a time delay so user can see graph draw.
    function go() {
        if (cnt++ < mydata['percent']) {
            setTimeout(go, 10);
        }
        $(element).css('width', cnt + '%');

    }

    go();

});

}

loadSkillgraph();