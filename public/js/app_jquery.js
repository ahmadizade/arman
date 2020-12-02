$(document).ready(function () {

    //Add User In Admin Page
    // $("#add-user").on("click",function (e) {
    //     console.log("TEST");
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: "POST",
    //         url: 'register',
    //         data: $("#add-user-form").serialize(),
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    //     e.preventDefault();
    // });
    //admin Page admin Page admin Page

    $('.counter').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({countNum: $this.text()}).animate({
                countNum: countTo
            },

            {
                duration: 8000,
                easing: 'linear',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                    //alert('finished');
                }
            });
    });
    $("#reply-btn").click(function () {
        $("#reply_card").fadeToggle('slow');
    });
//بستن مخصوص کارتها
    $(".close").click(function () {
        $(this).parent().parent().fadeToggle('slow');
        $("#result_back").hide('slow');
    });


//بستن مخصوص باکس ها
    $(".close_box").click(function () {
        $(this).parent().fadeToggle('slow');
        $("#result_back").hide('slow');
    });

    //admin Page Register form
    // $("#add_user").click(function () {
    //     $("#register_card").fadeToggle('slow');
    // });

    //شماره عضویت در صفحه آی تی
    $("#membership").change(function (e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: '/membership',
            data: $("#member-form").serialize(),
            success: function (response) {
                console.log(response);
            }
        });
        e.preventDefault();
    });

    //اندیشه ها در پروفایل

    $("#idea-btn").click(function (e) {
        $idea = $("#message").val();
        console.log($idea);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: '/profile/message',
            data: "idea=" + $idea,
            success: function (response) {
                if (response == "done") {
                    alert("ایده شما با موفقیت ثبت شد");
                } else if (response == "error") {
                    alert("متن وارد شده صحیح نیست");
                }
            }
        });
        e.preventDefault();
    });

    //admin Page admin Page admin Page
    //User Edit
    $("#user_change").click(function (e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/admin-page/change-user',
            data: $("#change-form").serialize(),
            success: function (response) {
                console.log(response);
            }

        });
        e.preventDefault();
    });


    //Data Table Admin Get User
    // $("#user_table_btn").click(function () {
    //     $(function () {
    //         $('#user_table').DataTable({
    //             processing: true,
    //             serverSide: true,
    //             ajax: '/admin-page/get-user',
    //             columns: [
    //                 {data: 'id', name: 'id'},
    //                 {data: 'name', name: 'name'},
    //                 {data: 'family', name: 'family'},
    //                 {data: 'username', name: 'username'},
    //                 {data: 'personnel_id', name: 'personnel_id'},
    //                 {data: 'role', name: 'role'},
    //                 {data: 'unit_id', name: 'unit_id'},
    //                 {data: 'email', name: 'email'},
    //                 {data: 'permission', name: 'permission'}
    //             ]
    //         });
    //     });
    // });
    //Data Table Admin Get User
    // $('[data-remodal-id=modal]').remodal(options);

    //Data Table Admin Get User
    $("#data_select_btn").click(function (e) {
        $('#article_table').fadeIn('slow');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/admin-page/get-newsletter',
            data: "data" + '=' + $('#data_select').val(),
            success: function (response) {
                let rows = '';
                $.each(response, function (i, item) {
                    rows += '<tr><td>' + item.id + '</td><td>' + item.article_page + '</td><td>' + item.title + '</td><td>' + item.author + '</td><td>' + item.article_id + '</td><td>' + item.created_at + '</td><td>' + '<span><button onclick="removeFunction(' + item.id + ')" class="remove" value="' + item.id + '" >Del</button></span>' + '</td></tr>';
                });
                $('#article_data_table').html(rows);
                e.preventDefault();
            }
        });
    });
    //Data Table Admin Get User


    $("#add_credit_form_btn").click(function () {
        $("#add_credit_form").show('slow');
        $("#result_back").show('slow');
    });


    $("#add_estate_form_btn").click(function () {
        $("#add_estate_form").show('slow');
        $("#result_back").show('slow');
    });


    $("#result_back").click(function () {
        $(this).fadeOut('slow');
        $("#resbox").hide('slow');
        $("#add_credit_form").fadeOut('slow');
        $(".result_box").fadeOut('slow');
    });

//samin takhfif

    $("#add-store-btn").click(function () {
        // alert("SALAM");
        $("#add-store-form").toggle('slow');
        $("#result_back").show('slow');
    });

    //Samin
    $(".input_null").click(function () {
        $(this).val("");
    })
//samin takhfif Form


    //Data Table Business Page
    //         $('#business_table').DataTable({
    //             buttons: [
    //                 'copy', 'excel', 'pdf'
    //             ],
    //             dom: 'Bfrtip',
    //             // processing: true,
    //             serverSide: true,
    //             colReorder: true,
    //             fixedColumns: true,
    //             keys: true,
    //             responsive: true,
    //             // "scrollY": 200,
    //             // "scrollX": true,
    //             // "scrollCollapse": true,
    //             // "paging": false,
    //             // "pagingType": "scrolling",
    //             // "pagingType": "full_numbers",
    //             ajax: '/business/get-table',
    //             // columnDefs: [
    //             //     {targets: 'no_sort', orderable: false}
    //             // ],
    //             columns: [
    //                 {data: 'shdr_contract_num', name: 'shdr_contract_num'},
    //                 {data: 'shdr_contract_date', name: 'shdr_contract_date'},
    //                 {data: 'contract_kind', name: 'contract_kind'},
    //                 {data: 'shdr_name', name: 'shdr_name'},
    //                 {data: 'shdr_family', name: 'shdr_family'},
    //                 {data: 'shdr_company', name: 'shdr_company'},
    //                 {data: 'codemelli', name: 'codemelli'},
    //                 {data: 'economic_num', name: 'economic_num'},
    //                 {data: 'registration_num', name: 'registration_num'},
    //                 {data: 'confession_code', name: 'confession_code'},
    //                 {data: 'hidden', name: 'hidden'},
    //                 {data: 'seen', name: 'seen'},
    //                 {data: 'signature', name: 'signature'},
    //             ]
    //         });
    //Data Table Business Page


    //Home-Sale-Setting (Admin Page)
    // $(".home-sale-change").change(function (e) {
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: "POST",
    //         url: '/admin-page/home-sale',
    //         data: $("#home-sale-form").serialize(),
    //         success: function (response) {
    //             console.log(response);
    //         }
    //
    //     });
    //     e.preventDefault(e);
    // });
    //Home-Sale-Setting (Admin Page)


    //Accounting-Check form (Accounting Page)
    $("#shdr_referred_num").change(function (e) {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/accounting/check-contract',
            dataType: "text",
            data: "action" + '=' + $("#shdr_referred_num").val(),
            success: function (response) {
                if (response == true) {
                    $("#contract_result").html("موجود است").css({"color": "white"});
                    $("#shdr_referred_num").css({"border-color": "green"});
                } else {
                    $("#contract_result").html("موجود نیست").css({"color": "red"});
                    $("#shdr_referred_num").css({"border-color": "red"});
                }
            }
        });
        e.preventDefault();
    });
    //Accounting-Check form (Accounting Page)


    //Little approve credits List Of Approves
    $("#credit_search_btn").click(function (e) {
        $("#resbox").fadeToggle('slow');
        $("#result_back").fadeToggle('slow');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache: false,
            type: "POST",
            url: '/business/credits',
            data: $("#credit_search").serialize(),
            success: function (response) {
                if (response["shdr_referred_num"] == null) {
                    $("#contract_num").html("موردی یافت نشد");
                } else {
                    $("#contract_num").html(response["shdr_referred_num"]);
                }
                if (response["user1_signature_date"] == null) {
                    $("#created_at").html("موردی یافت نشد");
                } else {
                    $("#created_at").html(response["user1_signature_date"]);

                }
                if (response["user1_signature"] == true) {
                    $("#user1_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user1_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user2_signature"] == true) {
                    $("#user2_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user2_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user3_signature"] == true) {
                    $("#user3_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user3_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user4_signature"] == true) {
                    $("#user4_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user4_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user1_signature" && "user2_signature" && "user3_signature" && "user4_signature"] == true) {
                    $("#user5_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user5_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user5_signature_date"] == null) {
                    $("#signature_date").html('<p> تکمیل نشده </p>');
                } else {
                    $("#signature_date").html(response["user5_signature_date"]);
                }
            }
        });
        e.preventDefault();
    });
    //Little approve credits List Of Approves


    //Little approve Estate List Of Approves
    $("#mortgage_search_btn").click(function (e) {
        $("#resbox").fadeToggle('slow');
        $("#result_back").fadeToggle('slow');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // cache: true,
            type: "POST",
            url: '/business/estate',
            data: $("#estate_search").serialize(),
            success: function (response) {
                if (response["mortgage_number"] == null) {
                    $("#contract_num").html("موردی یافت نشد");
                } else {
                    $("#contract_num").html(response["mortgage_number"]);
                }
                if (response["user1_signature_date"] == null) {
                    $("#created_at").html("موردی یافت نشد");
                } else {
                    $("#created_at").html(response["user1_signature_date"]);

                }
                if (response["user1_signature"] == true) {
                    $("#user1_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user1_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user2_signature"] == true) {
                    $("#user2_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user2_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user3_signature"] == true) {
                    $("#user3_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user3_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user4_signature"] == true) {
                    $("#user4_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user4_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user1_signature" && "user2_signature" && "user3_signature" && "user4_signature"] == true) {
                    $("#user5_signature").html('<span class="icon-sun-o text-success" </span>');
                } else {
                    $("#user5_signature").html('<span class="icon-sun-o text-primary" </span>');
                }
                if (response["user5_signature_date"] == null) {
                    $("#signature_date").html('<p> تکمیل نشده </p>');
                } else {
                    $("#signature_date").html(response["user5_signature_date"]);
                }
            }
        });
        e.preventDefault();
    });
    //Little approve Estate List Of Approves


//date picker business form page
//     $("#shdr_referred_date, #created_at, #mortgage_date, #refund_credit_from ,#refund_credit_until").persianDatepicker({
//         formatDate: "YYYY/MM/DD",
//     });

//MAJIDI
    // $("#s-btn").on("click",function(e){
    //     $.ajax({
    //         "url":"{{ route('HomeController_test_form')}}",
    //         "type":"POST",
    //         "data":$("#my-form").serialize(),
    //         success: function(response){
    //             if(response == "ok"){
    //                 $("#result").html("شماره شما ثبت شد");
    //                 $("#my-form").fadeOut();
    //             }
    //             if(response == "dup"){
    //                 $("#result").html("شماره شما تکراری میباشد");
    //             }
    //             if(response == "no"){
    //                 $("#result").html("شماره شما ثبت نشد");
    //             }
    //         }
    //     });
    //     e.preventDefault();
    // });

    //محاسبات و جداسازی اعداد به تومان با پلاگین Accounting.js
    $('#shdr_referred_price_num, #price').on('change', function () {

        $price = accounting.formatMoney($("#shdr_referred_price_num, #price").val());
        $('#shdr_referred_price_num, #price').val($price);
        console.log($('#shdr_referred_price_num, #price').val($price));
//عملیات برعکس
        $simple = accounting.unformat($price); // 12345678.9
        console.log($simple);
//گرد کردن اعداد
        // accounting.toFixed(0.615, 2); // "0.62"
    });
    //محاسبات و جداسازی اعداد به تومان با پلاگین Accounting.js


//Business approve credits (business Page)


    // $(".update").change(function () {
    //     // alert($(this).val());
    //     $(this).val($(this).val());
    // });
//HOME SLIDE
    $("#owl-demo, #owl-demo-1").owlCarousel({
        // items: 10, //10 items above 1000px browser width
        itemsDesktop: [1000, 6], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        lazyLoad: true,
        // navigation: true,
        responsiveClass: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
                nav: false,
                margin: 10
            },
            600: {
                items: 3,
                nav: false,
                margin: 10
            },
            900: {
                items: 4,
                nav: false,
                margin: 10
            },
            1200: {
                items: 5,
                nav: false,
                margin: 10
            }
        }
    });

    $(".owl").owlCarousel({
        itemsDesktop: [1000, 6],
        itemsDesktopSmall: [900, 3],
        itemsTablet: [600, 2],
        itemsMobile: false,
        lazyLoad: true,
        responsiveClass: true,
        loop: true,
        responsive: {
            0: {
                items: 2,
                nav: false,
                margin: 10
            },
            600: {
                items: 3,
                nav: false,
                margin: 10
            },
            900: {
                items: 4,
                nav: false,
                margin: 10
            },
            1200: {
                items: 5,
                nav: false,
                margin: 10
            }
        }
    });



    $(document).ready(function () {
        $('.counter').each(function () {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({countNum: $this.text()}).animate({
                    countNum: countTo
                },

                {

                    duration: 8000,
                    easing: 'linear',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                        //alert('finished');
                    }
                });
        });

    });



});
