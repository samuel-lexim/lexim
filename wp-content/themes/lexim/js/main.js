(function ($) {

    let six_items_slick_args = {
        dots: false,
        slidesPerRow: 1,
        rows: 3,
        mobileFirst: true,
        adaptiveHeight: true,
        prevArrow: "<button type='button' class='slick-prev'><img class='svg' src='/wp-content/themes/lexim/assets/arrow-left.svg' /></button>",
        nextArrow: "<button type='button' class='slick-next'><img class='svg' src='/wp-content/themes/lexim/assets/arrow-right.svg' /></button>",
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesPerRow: 2
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
    };

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

    function setCloudHeight() {
        //let win = jQuery(window); //this = window
        let smoke = jQuery('.timeline_section ._smoke');
        let css = '.timeline_section ._smoke:before {' +
            '  border-bottom-width: ' + smoke.height() + 'px;' +
            '}';
        jQuery('#customCSS').html(css);
    }

    /**
     * Filter Posts by type and taxonomy
     * @param sectionSelector
     * @param type
     * @param cat
     * @param taxonomy
     */
    function loadPostByTaxonomy(sectionSelector = '', type = '', cat = '', taxonomy = '') {
        if (!type || type === '') {
            return;
        }

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'post',
            data: {
                'action': 'load_posts_by_type_and_taxonomy',
                'type': type,
                'taxonomy': taxonomy, // {type}_cat
                'cat': cat
            },
            cache: false,
            dataType: "json",
            beforeSend: function () {
                $(sectionSelector).addClass('disabled');
            },
            success: function (result) {
                unSlickAndAssignData(sectionSelector + ' .six_items_slick', result.html, six_items_slick_args);
            },
            complete: function () {
                $(sectionSelector).removeClass('disabled');
            }
        })
    }

    /**
     *
     * @param slickSelector
     * @param data
     * @param args
     */
    function unSlickAndAssignData(slickSelector, data, args) {
        $(slickSelector).slick('unslick');
        $(slickSelector).html(data);
        $(slickSelector).slick(args);
    }

    $(document).ready(function () {
        // Convert Images
        convertSvg();

        // Header
        let mobileMenu = $('.site-header ._desktop');
        $('#ClickToOpenMenu').click(function () {
            mobileMenu.addClass('open');
        });

        $('#ClickToCloseMenu').click(function () {
            mobileMenu.removeClass('open');
        });

        $(document).keyup(function (e) {
            // press esc
            if (e.keyCode === 27) {
                mobileMenu.removeClass('open');
            }
        });

        $('.header-menu .menu-item-has-children > a').click(function () {
            let parent = $(this).parent();
            if (parent.hasClass('open')) {
                parent.removeClass('open current-menu-ancestor');
            } else {
                parent.addClass('open');
            }
        });

        // End - Header


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
        }).slick(six_items_slick_args);

        $('.filter-item').click(function () {
            let _this = $(this);
            let sectionId = _this.attr('data-id');
            sectionId = sectionId.charAt(0) !== '#' ? '#' + sectionId : sectionId;
            let type = _this.attr('data-type');
            let taxonomy = _this.attr('data-taxonomy');
            let slug = _this.attr('data-slug');
            // Switch filter values
            $(sectionId + ' .filter-item').removeClass('selected');
            _this.addClass('selected');
            // Load ajax data
            loadPostByTaxonomy(sectionId, type, slug, taxonomy);
        });


        // 3 items - Slick
        $('.three_items_slick').on('init', function () {
            convertSvg();
        }).slick({
            dots: false,
            arrows: false,
            slidesPerRow: 1,
            rows: 6,
            mobileFirst: true,
            prevArrow: "<button type='button' class='slick-prev'><img class='svg' src='/wp-content/themes/lexim/assets/arrow-left.svg' /></button>",
            nextArrow: "<button type='button' class='slick-next'><img class='svg' src='/wp-content/themes/lexim/assets/arrow-right.svg' /></button>",
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesPerRow: 2,
                        rows: 3,
                    }
                },
                {
                    breakpoint: 1440,
                    settings: {
                        slidesToShow: 2,
                        rows: 1,
                        variableWidth: true
                    }
                }
            ]
        });


        // TimeLine
        let timeLine = jQuery('.timeline_section');
        if (timeLine.length > 0) {
            setCloudHeight();
            jQuery(window).resize(function () {
                setCloudHeight();
            });
        }


    });

}(jQuery));