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
        var $noButton = $("#noButton");

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

        $noButton.on("click", function() {
            // Al hacer clic en "No", redirigir a Google
            window.location.href = 'https://www.google.com';
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const beerOptions = document.querySelectorAll(".beer");
        const pack = document.querySelector(".pack");
        const addToCartButton = document.querySelector(".add-to-cart");
    
        let selectedBeers = [];
    
        beerOptions.forEach(option => {
            option.addEventListener("click", handleClick);
        });
    
        function handleClick() {
            const beerSrc = this.getAttribute("data-src");
            const maxBeers = window.location.pathname.includes('product-pack24') ? 24 : (window.location.pathname.includes('product-pack12') ? 12 : 6); // Verifica la URL actual
            if (selectedBeers.length < maxBeers) {
                const beerImg = document.createElement("img");
                beerImg.src = beerSrc;
                beerImg.alt = "Cerveza";
                beerImg.style.width = "115px"; // Ajusta el ancho de la imagen aquí
                beerImg.style.height = "200px"; // Ajusta la altura de la imagen aquí
                pack.appendChild(beerImg);
                selectedBeers.push(beerSrc);
    
                addToCartButton.disabled = false;
            }
        }
    
        pack.addEventListener("click", function(event) {
            if (event.target.tagName === "IMG") {
                const beerSrc = event.target.getAttribute("src");
                const index = selectedBeers.indexOf(beerSrc);
                if (index !== -1) {
                    selectedBeers.splice(index, 1);
                    event.target.remove();
                    if (selectedBeers.length === 0) {
                        addToCartButton.disabled = true;
                    }
                }
    
                const maxBeers = window.location.pathname.includes('product-pack24') ? 24 : (window.location.pathname.includes('product-pack12') ? 12 : 6); // Verifica la URL actual
                if (selectedBeers.length < maxBeers) {
                    beerOptions.forEach(option => {
                        option.addEventListener("click", handleClick);
                    });
                }
            }
        });
    
        addToCartButton.addEventListener("click", function() {
            // Aquí deberías agregar el código para agregar el pack al carrito
            // Por ejemplo, podrías enviar los datos al servidor para procesar la compra
            alert("¡Pack agregado al carrito!");
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




