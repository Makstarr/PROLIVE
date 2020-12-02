import "./main.scss"
import "magnific-popup"
import "./colorThemeChanger.js"


/* COPY YEAR */
$('.this-year').text(new Date().getFullYear())

/*INFORMATION SHOW BUTTON*/
$('.open-info-button').each(function () {
    $(this).on("click", function (e) {
        e.preventDefault();
        $(".information").toggleClass("slide-from")
        $("body").toggleClass("hidden-body")
        window.setTimeout(function () {
            $(".information").toggleClass("display-none")

        }, 0);
        window.setTimeout(function () {
            $(".information").toggleClass("slide-from")
        }, 1000)
    })
});

/*INFORMATION HIDE BUTTON*/
$('.information-hide').each(function () {
    $(this).on("click", function (e) {
        e.preventDefault();
        $("body").toggleClass("hidden-body")
        $(".information").toggleClass("slide-away")
        window.setTimeout(function () {
            $(".information").toggleClass("display-none")
            $(".information").toggleClass("slide-away")
        }, 1000);
    })
});





/* MAGNIFIC POPUP GALLERY FUNCTION*/
$('.popup-gallery').each(function () { 
    // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', 
        // the selector for gallery item
        type: 'image',
        gallery: {
            enabled: true
        }
    });
});

