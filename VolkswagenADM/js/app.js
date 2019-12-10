
    // smooth scroll
    $("[data-scroll]").on("click", function (event) {

        event.preventDefault();

        let blockId = $(this).data('scroll');
        let elementOffset = $(blockId).offset().top;
      

        $("html, body").animate({
            scrollTop: elementOffset
        }, 500)





    });