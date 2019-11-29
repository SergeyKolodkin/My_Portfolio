$(function(){
    // console.log("Hi");
    let header= $("#header");// выбор элемента по id, если по классу то .header
    let intro= $("#intro");
    let introH= intro.innerHeight();
    let scrollPos=$(window).scrollTop();

    $(window).on("scroll load resize", function()
    {
        introH= intro.innerHeight();
        scrollPos= $(this).scrollTop();

        if( scrollPos>0){
            header.addClass("fixed");
        }
        else
        {
            header.removeClass("fixed")

        }

  

    });

    console.log(introH);
    console.log(scrollPos);
  

})