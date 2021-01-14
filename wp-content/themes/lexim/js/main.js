(function ($) {

    function convertSvg() {
        // Convert img to svg
        $('img.svg').each(function () {
            let $img = $(this);
            let imgID = $img.attr('id');
            let imgClass = $img.attr('class');
            let imgURL = $img.attr('src');
            $.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                let $svg = $(data).find('svg');
                // Get Class name
                let $svgClass = $svg.attr('class') ? $svg.attr('class') : '';
                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' ' + $svgClass + ' replaced-svg');
                }
                // Remove any invalid XML tags as per http://validator.w3.org
                $svg.removeAttr('xmlns:a');
                // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'));
                }
                // Replace image with new SVG
                $img.replaceWith($svg);
            }, 'xml');
        });
    }

    $(document).ready(function () {

        $(document).keyup(function (e) {
            // press esc
            if (e.keyCode === 27) {
            }
        });

        // Banner Slick
        $('.banner_slick_wrap').slick({
            arrows: false,
            dots: true,
            adaptiveHeight: true
        });

        // Default slick slide
        $('.default_slick_slider').slick({
            arrows: false,
            dots: true,
            adaptiveHeight: true
        });


        // 6 items - Slick
        $('.six_items_slick').on('init', function () {
            convertSvg();
        }).slick({
            dots: false,
            slidesPerRow: 1,
            rows: 1,
            mobileFirst: true,
            adaptiveHeight: true,
            prevArrow: "<button type='button' class='slick-prev'><img class='svg' src='/wp-content/themes/lexim/assets/arrow-left.svg' /></button>",
            nextArrow: "<button type='button' class='slick-next'><img class='svg' src='/wp-content/themes/lexim/assets/arrow-right.svg' /></button>",

            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesPerRow: 2,
                        rows: 2,
                    }
                },
                {
                    breakpoint: 1440,
                    settings: {
                        slidesPerRow: 3,
                        rows: 2,
                    }
                }
            ]
        });


        convertSvg();
    });

}(jQuery));