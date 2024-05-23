(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.nav-item .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);

    });


    $(document).ready(function() {
        // Inicializar el carrusel
        const carousel = new bootstrap.Carousel(document.getElementById('blog-carousel'), {
            interval: 3000 // Cambia de imagen cada 3 segundos
        });
        
        // Activar el carrusel automáticamente
        $('#blog-carousel').carousel('cycle');
        
        // Reiniciar el carrusel al hacer scroll
        $(window).scroll(function() {
            $('#blog-carousel').carousel('cycle');
        });
    });


    // Verificar +18    
    $(document).ready(function() {
        var $ageVerificationPopup = $("#ageVerificationPopup");
        var $yesButton = $("#yesButton");

        // Verificar si ya se ha verificado la edad
        var ageVerified = localStorage.getItem("ageVerified");
        if (ageVerified) {
            // Si se ha verificado la edad, ocultar el popup
            $ageVerificationPopup.hide();
        }

        $yesButton.on("click", function() {
            // Al hacer clic en "Sí", ocultar el popup y guardar en el almacenamiento local
            $ageVerificationPopup.hide();
            localStorage.setItem("ageVerified", true);
        });
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });

    //Config calendario
    new tempusDominus.TempusDominus(document.getElementById("date"), {
        display: {
            viewMode: "calendar",
            components: {
                decades: true,
                year: true,
                month: true,
                date: true,
                hours: false,
                minutes: false,
                seconds: false,
                clock: false
            },
        },
        localization: {
            startOfTheWeek: 1,
            format: 'dd/MM/yyyy'
        }
    });

})(jQuery);




