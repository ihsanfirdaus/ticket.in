$(document).ready(function() {
    "use strict";

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".fullscreen").css("height", window_height);
    $(".fitscreen").css("height", fitscreen);

    //-------- Active Sticky Js ----------//
    $(".default-header").sticky({ topSpacing: 0 });

    // -------   Active Mobile Menu-----//

    $(".menu-bar").on("click", function(e) {
        e.preventDefault();
        $("nav").toggleClass("hide");
        $("span", this).toggleClass("lnr-menu lnr-cross");
        $(".main-menu").addClass("mobile-menu");
    });

    $(".nav-item a:first").tab("show");

    // Select all links with hashes
    $('.main-menubar a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, "") ==
                    this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length
                    ? target
                    : $("[name=" + this.hash.slice(1) + "]");
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $("html, body").animate(
                        {
                            scrollTop: target.offset().top
                        },
                        1000,
                        function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) {
                                // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            }
                        }
                    );
                }
            }
        });

    // -------   Mail Send ajax

    $(document).ready(function() {
        var form = $("#myForm"); // contact form
        var submit = $(".submit-btn"); // submit button
        var alert = $(".alert-msg"); // alert div for show alert message

        // form submit event
        form.on("submit", function(e) {
            e.preventDefault(); // prevent default form submit

            $.ajax({
                url: "mail.php", // form action url
                type: "POST", // form submit method get/post
                dataType: "html", // request type html/json/xml
                data: form.serialize(), // serialize form data
                beforeSend: function() {
                    alert.fadeOut();
                    submit.html("Sending...."); // change submit button text
                },
                success: function(data) {
                    alert.html(data).fadeIn(); // fade in response data
                    form.trigger("reset"); // reset form
                    submit.attr("style", "display: none !important"); // reset submit button text
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
    });

    // $(function() {
    //     $("#datepicker").datepicker();
    //     $("#datepicker2").datepicker();
    // });
    $("input:radio").click(function() {
        if ($(this).attr("id") == "sekali_jalan") {
            $("#tanggal_pulang").val('').prop("disabled", true);
        } else {
            $("#tanggal_pulang").prop("disabled", false);
        }
    });

    $(document).ready(function(){
        // document.getElementById('without_child').onchange = function(){
        //     document.getElementById('anak').disabled = this.checked;
        // }
        $("#without_child").change(function() {
            if($("#without_child").is(':checked') == true){
                $("#anak").val('').prop('disabled',true);
            }else{
                $("#anak").prop('disabled', false);
            }
        })
    });

    // var myUpload = new FileUploadWithPreview('myUploader', {
    //     showDeleteButtonOnImages: true,
    //     text: {
    //         chooseFile: 'Choose File ...',
    //         browse: 'Browse',
    //         selectedCount: 'files selected'
    //     },
    //     maxFileCount: 0,
    //     images: {
    //         baseImage: '',
    //         backgroundImage: '',
    //         successFileAltImage: '',
    //         successPdfImage: '',
    //         successVideoImage: ''
    //     },
    //     presetFiles: []
    // });


    

    // -------   Mail Send ajax

    // $(document).ready(function() {
    //     var form = $("#booking"); // contact form
    //     var submit = $(".submit-btn"); // submit button
    //     var alert = $(".alert-msg"); // alert div for show alert message

    //     // form submit event
    //     form.on("submit", function(e) {
    //         e.preventDefault(); // prevent default form submit

    //         $.ajax({
    //             url: "booking.php", // form action url
    //             type: "POST", // form submit method get/post
    //             dataType: "html", // request type html/json/xml
    //             data: form.serialize(), // serialize form data
    //             beforeSend: function() {
    //                 alert.fadeOut();
    //                 submit.html("Sending...."); // change submit button text
    //             },
    //             success: function(data) {
    //                 alert.html(data).fadeIn(); // fade in response data
    //                 form.trigger("reset"); // reset form
    //                 submit.attr("style", "display: none !important"); // reset submit button text
    //             },
    //             error: function(e) {
    //                 console.log(e);
    //             }
    //         });
    //     });
    // });

    //  Start Google map

    // When the window has finished loading create our google map below
    // google.maps.event.addDomListener(window, "load", init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 11,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(40.67, -73.94), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{ color: "#e9e9e9" }, { lightness: 17 }]
                },
                {
                    featureType: "landscape",
                    elementType: "geometry",
                    stylers: [{ color: "#f5f5f5" }, { lightness: 20 }]
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [{ color: "#ffffff" }, { lightness: 17 }]
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [
                        { color: "#ffffff" },
                        { lightness: 29 },
                        { weight: 0.2 }
                    ]
                },
                {
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [{ color: "#ffffff" }, { lightness: 18 }]
                },
                {
                    featureType: "road.local",
                    elementType: "geometry",
                    stylers: [{ color: "#ffffff" }, { lightness: 16 }]
                },
                {
                    featureType: "poi",
                    elementType: "geometry",
                    stylers: [{ color: "#f5f5f5" }, { lightness: 21 }]
                },
                {
                    featureType: "poi.park",
                    elementType: "geometry",
                    stylers: [{ color: "#dedede" }, { lightness: 21 }]
                },
                {
                    elementType: "labels.text.stroke",
                    stylers: [
                        { visibility: "on" },
                        { color: "#ffffff" },
                        { lightness: 16 }
                    ]
                },
                {
                    elementType: "labels.text.fill",
                    stylers: [
                        { saturation: 36 },
                        { color: "#333333" },
                        { lightness: 40 }
                    ]
                },
                {
                    elementType: "labels.icon",
                    stylers: [{ visibility: "off" }]
                },
                {
                    featureType: "transit",
                    elementType: "geometry",
                    stylers: [{ color: "#f2f2f2" }, { lightness: 19 }]
                },
                {
                    featureType: "administrative",
                    elementType: "geometry.fill",
                    stylers: [{ color: "#fefefe" }, { lightness: 20 }]
                },
                {
                    featureType: "administrative",
                    elementType: "geometry.stroke",
                    stylers: [
                        { color: "#fefefe" },
                        { lightness: 17 },
                        { weight: 1.2 }
                    ]
                }
            ]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        // var mapElement = document.getElementById('map');

        // // Create the Google Map using our element and options defined above
        // var map = new google.maps.Map(mapElement, mapOptions);

        // // Let's also add a marker while we're at it
        // var marker = new google.maps.Marker({
        //     position: new google.maps.LatLng(40.6700, -73.9400),
        //     map: map,
        //     title: 'Snazzy!'
        // });
    }

    $(document).ready(function() {
        $("#mc_embed_signup")
            .find("form")
            .ajaxChimp();
    });
    // -------   Mail Send ajax

    function matchStart(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === "") {
            return data;
        }

        // Skip if there is no 'children' property
        if (typeof data.children === "undefined") {
            return null;
        }

        // `data.children` contains the actual options that we are matching against
        var filteredChildren = [];
        $.each(data.children, function(idx, child) {
            if (
                child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0
            ) {
                filteredChildren.push(child);
            }
        });

        // If we matched any of the timezone group's children, then set the matched children on the group
        // and return the group object
        if (filteredChildren.length) {
            var modifiedData = $.extend({}, data, true);
            modifiedData.children = filteredChildren;

            // You can return modified objects from here
            // This includes matching the `children` how you want in nested data sets
            return modifiedData;
        }

        // Return `null` if the term should not be displayed
        return null;
    }

    $(document).ready(function() {
        var today = new Date(
            new Date().getFullYear(),
            new Date().getMonth(),
            new Date().getDate()
        );

        // $(".startDateBus").datepicker({
        //     uiLibrary: "bootstrap4",
        //     iconsLibrary: "fontawesome",
        //     format: "dd-mm-yyyy",
        //     minDate: today
        // });

        $(".startDateFlight").datepicker({
            uiLibrary: "bootstrap4",
            iconsLibrary: "fontawesome",
            format: "yyyy-mm-dd",
            minDate: today,
            maxDate: function() {
                return $(".endDateFlight").val();
            }
        });
        $(".endDateFlight").datepicker({
            uiLibrary: "bootstrap4",
            iconsLibrary: "fontawesome",
            format: "yyyy-mm-dd",
            minDate: function() {
                return $(".startDateFlight").val();
            }
        });
    });

    // bootstrapValidate('#keberangkatan','required:Please choose one date of departure below')
    // bootstrapValidate('#dewasa','required:Please fill out this field with number')

    // UBAH PENCARIAN
    $("#btn_pencarian").click(function() {
        $("#ubah_pencarian").show();
        $("#detail_pencarian").hide();
        $("#btn_pencarian").hide();
        $("#btn_cancel").show();
    });
    $("#btn_cancel").click(function() {
        $("#ubah_pencarian").hide();
        $("#detail_pencarian").show();
        $("#btn_pencarian").show();
        $("#btn_cancel").hide();
    })

    // PESAN TIKET
    $("#btn_fasilitas").click(function() {
        $("#row-fasilitas").show();
        $("#row-info").hide();
        $("#btn_fasilitas").hide();
        $("#btn_close_fsl").show();
    });
    $("#btn_close_fsl").click(function() {
        $("#row-fasilitas").hide();
        $("#row-info").show();
        $("#btn_fasilitas").show();
        $("#btn_close_fsl").hide();
    });

    // PEMESANAN

    $("#next").click(function() {
        $("#pemesan").hide();
        $("#penumpang").show();
        $("#next").hide();
        $("#prev").show();
        $("#save").show();
    });
    $("#prev").click(function() {
        $("#pemesan").show();
        $("#penumpang").hide();
        $("#prev").hide();
        $("#next").show();
        $("#save").hide();
    })

    $("#ch_indomaret").click(function() {
        $("#bca").hide();
        $("#bri").hide();
        $("#indomaret").show();
        $("#detail").hide();
    });
    $("#ch_bri").click(function() {
        $("#bca").hide();
        $("#indomaret").hide();
        $("#bri").show();
        $("#detail").hide();
    });
    $("#ch_bca").click(function() {
        $("#bri").hide();
        $("#indomaret").hide();
        $("#bca").show();
        $("#detail").hide();
    });

});

