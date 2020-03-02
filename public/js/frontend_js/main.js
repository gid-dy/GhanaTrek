jQuery(document).ready(function($) {

    // Accordion Toggle
    var iconOpen = 'icon-minus',
        iconClose = 'icon-plus';

    $(document).on('show.bs.collapse hide.bs.collapse', '.accordion', function(e) {
        var $target = $(e.target)
        $target.siblings('.accordion-heading')
            .find('em').toggleClass(iconOpen + ' ' + iconClose);
        if (e.type == 'show')
            $target.prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        if (e.type == 'hide')
            $(this).find('.accordion-toggle').not($target).removeClass('active');
    });


    // setting
    $(function() {
        var $tabButtonItem = $('#tab-button li'),
            $tabSelect = $('#tab-select'),
            $tabContents = $('.tab-contents'),
            activeClass = 'is-active';

        $tabButtonItem.first().addClass(activeClass);
        $tabContents.not(':first').hide();

        $tabButtonItem.find('a').on('click', function(e) {
            var target = $(this).attr('href');

            $tabButtonItem.removeClass(activeClass);
            $(this).parent().addClass(activeClass);
            $tabSelect.val(target);
            $tabContents.hide();
            $(target).show();
            e.preventDefault();
        });

        $tabSelect.on('change', function() {
            var target = $(this).val(),
                targetSelectNum = $(this).prop('selectedIndex');

            $tabButtonItem.removeClass(activeClass);
            $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
            $tabContents.hide();
            $(target).show();
        });
    });


    //setting
    $(document).ready(function() {
        $(".btn-pref .btn").click(function() {
            $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).removeClass("btn-default").addClass("btn-primary");
        });
    });

    //password show

    $(document).ready(function() {
        $('.pass_show').append('<span class="ptxt">Show</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function() {

        $(this).text($(this).text() == "Show" ? "Hide" : "Show");

        $(this).prev().attr('type', function(index, attr) { return attr == 'password' ? 'text' : 'password'; });

    });

    // DM Top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.dmtop').css({
                bottom: "25px"
            });
        } else {
            $('.dmtop').css({
                bottom: "-100px"
            });
        }
    });

    $('.dmtop').click(function() {
        $('html, body').animate({
            scrollTop: '0px'
        }, 800);
        return false;
    });

    // DM Menu
    $('#nav').affix({
        offset: {
            top: $('#nav').offset().top
        }
    });

    // Menu
    $(".panel a").click(function(e) {
        e.preventDefault();
        var style = $(this).attr("class");
        $(".jetmenu").removeAttr("class").addClass("jetmenu").addClass(style);
    });
    $().jetmenu();

    // Facts
    function count($this) {
        var current = parseInt($this.html(), 10);
        current = current + 1; /* Where 50 is increment */

        $this.html(++current);
        if (current > $this.data('count')) {
            $this.html($this.data('count'));
        } else {
            setTimeout(function() {
                count($this)
            }, 50);
        }
    }

    $(".stat-count").each(function() {
        $(this).data('count', parseInt($(this).html(), 10));
        $(this).html('0');
        count($(this));
    });

    // Tooltip
    $('.social_buttons, .client').tooltip({
        selector: "a[data-toggle=tooltip]"
    })

    $('.social_buttons, .client').tooltip();

    // prettyPhoto
    $(document).ready(function() {
        $('a[data-gal]').each(function() {
            $(this).attr('rel', $(this).data('gal'));
        });
        $("a[data-rel^='prettyPhoto']").prettyPhoto({
            animationSpeed: 'slow',
            theme: 'light_square',
            slideshow: false,
            overlay_gallery: false,
            social_tools: false,
            deeplinking: false
        });
    });


    $().ready(function() {
        $('[rel="tooltip"]').tooltip();

        $('a.scroll-down').click(function(e) {
            e.preventDefault();
            scroll_target = $(this).data('href');
            $('html, body').animate({
                scrollTop: $(scroll_target).offset().top - 60
            }, 1000);
        });

    });

    function rotateCard(btn) {
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if ($card.hasClass('hover')) {
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }





    // $(function() {
    //     $(".date").datepicker({
    //         autoclose: true,
    //         todayHighlight: true
    //     });
    // });

    /*--- showlogin toggle function ----*/

    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });

    /*--- showlogin toggle function ----*/
    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });

    /*--- showlogin toggle function ----*/
    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    });

    //payment
    /* Create token */
    var $form = $('#payment-form');
    $form.find('.pay').on('click', payWithStripe);

    /* If you're using Stripe for payments */
    function payWithStripe(e) {
        e.preventDefault();

        /* Abort if invalid form data */
        if (!validator.form()) {
            return;
        }

        /* Visual feedback */
        $form.find('.pay').html('Validating <i class="fa fa-spinner fa-pulse"></i>').prop('disabled', true);

        var PublishableKey = 'pk_test_6pRNASCoBOKtIshFeQd4XMUh'; // Replace with your API publishable key
        Stripe.setPublishableKey(PublishableKey);

        /* Create token */
        var expiry = $form.find('[name=cardExpiry]').payment('cardExpiryVal');
        var ccData = {
            number: $form.find('[name=cardNumber]').val().replace(/\s/g, ''),
            cvc: $form.find('[name=cardCVC]').val(),
            exp_month: expiry.month,
            exp_year: expiry.year
        };

        Stripe.card.createToken(ccData, function stripeResponseHandler(status, response) {
            if (response.error) {
                /* Visual feedback */
                $form.find('.pay').html('Try again').prop('disabled', false);
                /* Show Stripe errors on the form */
                $form.find('.payment-errors').text(response.error.message);
                $form.find('.payment-errors').closest('.row').show();
            } else {
                /* Visual feedback */
                $form.find('.pay').html('Processing <i class="fa fa-spinner fa-pulse"></i>');
                /* Hide Stripe errors on the form */
                $form.find('.payment-errors').closest('.row').hide();
                $form.find('.payment-errors').text("");
                // response contains id and card, which contains additional card details            
                console.log(response.id);
                console.log(response.card);
                var token = response.id;
                // AJAX - you would send 'token' to your server here.
                $.post('/account/stripe_card_token', {
                        token: token
                    })
                    // Assign handlers immediately after making the request,
                    .done(function(data, textStatus, jqXHR) {
                        $form.find('.pay').html('Payment successful <i class="fa fa-check"></i>');
                    })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        $form.find('.pay').html('There was a problem').removeClass('success').addClass('error');
                        /* Show Stripe errors on the form */
                        $form.find('.payment-errors').text('Try refreshing the page and trying again.');
                        $form.find('.payment-errors').closest('.row').show();
                    });
            }
        });
    }
    /* Fancy restrictive input formatting via jQuery.payment library*/
    // $('input[name=cardNumber]').payment('formatCardNumber');
    // $('input[name=cardCVC]').payment('formatCardCVC');
    // $('input[name=cardExpiry').payment('formatCardExpiry');

    /* Form validation using Stripe client-side validation helpers */
    // jQuery.validator.addMethod("cardNumber", function(value, element) {
    //     return this.optional(element) || Stripe.card.validateCardNumber(value);
    // }, "Please specify a valid credit card number.");

    // jQuery.validator.addMethod("cardExpiry", function(value, element) {
    //     /* Parsing month/year uses jQuery.payment library */
    //     value = $.payment.cardExpiryVal(value);
    //     return this.optional(element) || Stripe.card.validateExpiry(value.month, value.year);
    // }, "Invalid expiration date.");

    // jQuery.validator.addMethod("cardCVC", function(value, element) {
    //     return this.optional(element) || Stripe.card.validateCVC(value);
    // }, "Invalid CVC.");

    // validator = $form.validate({
    //     rules: {
    //         cardNumber: {
    //             required: true,
    //             cardNumber: true
    //         },
    //         cardExpiry: {
    //             required: true,
    //             cardExpiry: true
    //         },
    //         cardCVC: {
    //             required: true,
    //             cardCVC: true
    //         }
    //     },
    //     highlight: function(element) {
    //         $(element).closest('.form-control').removeClass('success').addClass('error');
    //     },
    //     unhighlight: function(element) {
    //         $(element).closest('.form-control').removeClass('error').addClass('success');
    //     },
    //     errorPlacement: function(error, element) {
    //         $(element).closest('.form-group').append(error);
    //     }
    // });

    paymentFormReady = function() {
        if ($form.find('[name=cardNumber]').hasClass("success") &&
            $form.find('[name=cardExpiry]').hasClass("success") &&
            $form.find('[name=cardCVC]').val().length > 1) {
            return true;
        } else {
            return false;
        }
    }

    $form.find('.pay').prop('disabled', true);
    var readyInterval = setInterval(function() {
        if (paymentFormReady()) {
            $form.find('.pay').prop('disabled', false);
            clearInterval(readyInterval);
        }
    }, 250);


    // Hover and Carousel
    $('.owl-carousel > .item ').each(function() {
        $(this).hoverdir();
    });
    $("#owl-demo").owlCarousel({
        items: 5,
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        lazyLoad: true,
        transitionStyle: "fade",
        navigation: true,
        pagination: false,
    });

    // tooltip demo
    $("[data-toggle=tooltip]").tooltip();

    // popover demo
    $("[data-toggle=popover]").popover();

    // Chart Effects;
    $('.chart').easyPieChart({
        easing: 'easeOutBounce',
        size: 180,
        animate: 2000,
        lineWidth: 10,
        lineCap: 'square',
        lineWidth: 18,
        barColor: '#3498db',
        trackColor: '#f9f9f9',
        scaleColor: false,
        onStep: function(from, to, percent) {
            $(this.el).find('.percent').text(Math.round(percent) + '%');
        }
    });

    // if HTML DOM Element that contains the map is found...
    // if (document.getElementById('map-canvas')) {

    //     // Coordinates to center the map
    //     var myLatlng = new google.maps.LatLng(28.632681, 77.208162);

    //     // Other options for the map, pretty much selfexplanatory
    //     var mapOptions = {
    //         zoom: 14,
    //         center: myLatlng,
    //         mapTypeId: google.maps.MapTypeId.ROADMAP
    //     };

    //     // Attach a map to the DOM Element, with the defined settings
    //     var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    // }




    // i. #testimonial-carousel


    var owl = $('#testemonial-carousel');
    owl.owlCarousel({
        items: 3,
        margin: 0,

        loop: true,
        autoplay: true,
        smartSpeed: 1000,

        //nav:false,
        //navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],

        dots: true,
        autoplayHoverPause: true,

        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            640: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: 3
            }
        }


    });



    // Popular Items Carousel
    $(document).ready(function() {
        $("#popularitems").owlCarousel({
            items: 3,
            lazyLoad: true,
            navigation: false
        });
    });

    // Hover and Carousel on Home #1
    $('.owl-carousel > .item ').each(function() {
        $(this).hoverdir();
    });

    $("#owl-related").owlCarousel({
        items: 3,
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        stopOnHover: true,
        lazyLoad: true,
        transitionStyle: "fade",
        navigation: true,
        pagination: false,
    });
    $('#myTab a[href="#profile"]').tab('show')

    /*-------------------------
      product thumb img slider
    --------------------------*/
    $('.pro-thumb-img-slider').owlCarousel({
        loop: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 5,
        dots: false,
        margin: 25,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });




    // Portfolio
    var $container = $('.portfolio'),
        $items = $container.find('.market-item'),
        portfolioLayout = 'fitRows';

    if ($container.hasClass('portfolio-centered')) {
        portfolioLayout = 'masonry';
    }

    $container.isotope({
        filter: '*',
        animationEngine: 'best-available',
        layoutMode: portfolioLayout,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        },
        masonry: {}
    }, refreshWaypoints());

    function refreshWaypoints() {
        setTimeout(function() {}, 1000);
    }

    $('nav.portfolio-filter ul a').on('click', function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        }, refreshWaypoints());
        $('nav.portfolio-filter ul a').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    function getColumnNumber() {
        var winWidth = $(window).width(),
            columnNumber = 2;
    }

    function setColumns() {
        var winWidth = $(window).width(),
            columnNumber = getColumnNumber(),
            itemWidth = Math.floor(winWidth / columnNumber);

        $container.find('.market-item').each(function() {
            $(this).css({
                width: itemWidth + 'px'
            });
        });
    }

    function setPortfolio() {
        setColumns();
        $container.isotope('reLayout');
    }

    $container.imagesLoaded(function() {
        setPortfolio();
    });

    $(window).on('resize', function() {
        setPortfolio();
    });

    //tour price
    $(document).ready(function(){
        $("#SelType").change(function(){
            var idTourTypeName = $(this).val();
            if(idTourTypeName == ""){
                return false;
            }
            $.ajax({
                type:'get',
                url:'/get-tourpackage-Price',
                data:{idTourTypeName:idTourTypeName},
                success:function(resp){
                    // alert(resp);
                    $("#getPackagePrice").html("GHS " + resp);
                },error:function(){
                    alert("Error");
                }
            });
        });
    });

    //transport price
    $(document).ready(function(){
        $("#SelTran").change(function(){
            var idTransportName = $(this).val();
            if(idTransportName == ""){
                return false;
            }
            $.ajax({
                type:'get',
                url:'/get-tourport-Cost',
                data:{idTransportName:idTransportName},
                success:function(resp){
                    // alert(resp);
                    $("#getTransportCost").html("GHS " + resp);
                },error:function(){
                    alert("Error");
                }
            });
        });
    });

});