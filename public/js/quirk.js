$(document).ready(function () {

    'use strict';

    /***** SHOW / HIDE LEFT MENU *****/

    $('#menuToggle').click(function () {

        var collapsedMargin = $('.mainpanel').css('margin-left');
        var collapsedLeft = $('.mainpanel').css('left');

        if (collapsedMargin === '220px' || collapsedLeft === '220px') {
            toggleMenu(-220, 0);
        } else {
            toggleMenu(0, 220);
        }

    });


    function toggleMenu(marginLeft, marginMain) {

        var emailList = ($(window).width() <= 768 && $(window).width() > 640) ? 320 : 360;

        if ($('.mainpanel').css('position') === 'relative') {

            $('.logopanel, .leftpanel').animate({left: marginLeft}, 'fast');
            $('.headerbar, .mainpanel').animate({left: marginMain}, 'fast');

            $('.emailcontent, .email-options').animate({left: marginMain}, 'fast');
            $('.emailpanel').animate({left: marginMain + emailList}, 'fast');

            if ($('body').css('overflow') == 'hidden') {
                $('body').css({overflow: ''});
            } else {
                $('body').css({overflow: 'hidden'});
            }

        } else {

            $('.logopanel, .leftpanel').animate({marginLeft: marginLeft}, 'fast');
            $('.headerbar, .mainpanel').animate({marginLeft: marginMain}, 'fast');

            $('.emailcontent, .email-options').animate({left: marginMain}, 'fast');
            $('.emailpanel').animate({left: marginMain + emailList}, 'fast');

        }

    }


    /****** PULSE A QUICK ACCESS PANEL ******/

    $('.panel-quick-page .panel').hover(function () {
        $(this).addClass('flip animated');
    }, function () {
        $(this).removeClass('flip animated');
    });


    // Date Today in Notification
    $('#todayDay').text(getDayToday());
    $('#todayDate').text(getDateToday());

    // Toggle Left Menu
    $('.nav-parent > a').on('click', function () {

        var gran = $(this).closest('.nav');
        var parent = $(this).parent();
        var sub = parent.find('> ul');

        if (sub.is(':visible')) {
            sub.slideUp(200);
            if (parent.hasClass('nav-active')) {
                parent.removeClass('nav-active');
            }
        } else {

            $(gran).find('.children').each(function () {
                $(this).slideUp();
            });

            sub.slideDown(200);
            if (!parent.hasClass('active')) {
                parent.addClass('nav-active');
            }
        }
        return false;

    });

    function closeVisibleSubMenu() {
        $('.leftpanel .nav-parent').each(function () {
            var t = jQuery(this);
            if (t.hasClass('nav-active')) {
                t.find('> ul').slideUp(200, function () {
                    t.removeClass('nav-active');
                });
            }
        });
    }

    // Left Panel Toggles
    $('.leftpanel-toggle').toggles({
        on: true,
        height: 22
    });
    $('.leftpanel-toggle-off').toggles({height: 22});


    // Tooltip
    $('.tooltips').tooltip({container: 'body'});

    // Popover
    $('.popovers').popover();

    // Add class everytime a mouse pointer hover over it
    $('.nav-due > li').hover(function () {
        $(this).addClass('nav-hover');
    }, function () {
        $(this).removeClass('nav-hover');
    });

    // Prevent dropdown from closing when clicking inside
    $('#noticeDropdown').on('click', '.nav-tabs a', function () {
        // set a special class on the '.dropdown' element
        $(this).closest('.btn-group').addClass('dontClose');
    })

    $('#noticePanel').on('hide.bs.dropdown', function (e) {
        if ($(this).hasClass('dontClose')) {
            e.preventDefault();
        }
        $(this).removeClass('dontClose');
    });


    // Close panel
    $('.panel-remove').click(function () {
        $(this).closest('.panel').fadeOut(function () {
            $(this).remove();
        });
    });

    // Minimize panel
    $('.panel-minimize').click(function () {
        var parent = $(this).closest('.panel');

        parent.find('.panel-body').slideToggle(function () {
            var panelHeading = parent.find('.panel-heading');

            if (panelHeading.hasClass('min')) {
                panelHeading.removeClass('min');
            } else {
                panelHeading.addClass('min');
            }

        });

    });

    /* Get the current day today */
    function getDayToday() {
        // Get Date Today
        var d_names = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        var d = new Date();
        var curr_day = d.getDay();

        return d_names[curr_day];
    }

    /* Get the current date today */
    function getDateToday() {
        var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December");

        var d = new Date();
        var curr_date = d.getDate();
        var sup = "";

        if (curr_date == 1 || curr_date == 21 || curr_date == 31) {
            sup = "st";
        } else if (curr_date == 2 || curr_date == 22) {
            sup = "nd";
        } else if (curr_date == 3 || curr_date == 23) {
            sup = "rd";
        } else {
            sup = "th";
        }

        var curr_month = d.getMonth();
        var curr_year = d.getFullYear();

        return curr_date + sup + " " + m_names[curr_month] + " " + curr_year;
    }

    /* This function will reposition search form to the left panel when viewed
     * in screens smaller than 767px and will return to top when viewed higher
     * than 767px
     */
    function reposition_searchform() {
        if ($('.searchform').css('position') == 'relative') {
            $('.searchform').insertBefore('.leftpanelinner .userlogged');
        } else {
            $('.searchform').insertBefore('.header-right');
        }
    }


    /* This function allows top navigation menu to move to left navigation menu
     * when viewed in screens lower than 1024px and will move it back when viewed
     * higher than 1024px
     */
    function reposition_topnav() {
        if ($('.nav-horizontal').length > 0) {

            // top navigation move to left nav
            // .nav-horizontal will set position to relative when viewed in screen below 1024
            if ($('.nav-horizontal').css('position') == 'relative') {

                if ($('.leftpanel .nav-bracket').length == 2) {
                    $('.nav-horizontal').insertAfter('.nav-bracket:eq(1)');
                } else {
                    // only add to bottom if .nav-horizontal is not yet in the left panel
                    if ($('.leftpanel .nav-horizontal').length == 0)
                        $('.nav-horizontal').appendTo('.leftpanelinner');
                }

                $('.nav-horizontal').css({display: 'block'})
                    .addClass('nav-pills nav-stacked nav-bracket');

                $('.nav-horizontal .children').removeClass('dropdown-menu');
                $('.nav-horizontal > li').each(function () {

                    $(this).removeClass('open');
                    $(this).find('a').removeAttr('class');
                    $(this).find('a').removeAttr('data-toggle');

                });

                if ($('.nav-horizontal li:last-child').has('form')) {
                    $('.nav-horizontal li:last-child form').addClass('searchform').appendTo('.topnav');
                    $('.nav-horizontal li:last-child').hide();
                }

            } else {
                // move nav only when .nav-horizontal is currently from leftpanel
                // that is viewed from screen size above 1024
                if ($('.leftpanel .nav-horizontal').length > 0) {

                    $('.nav-horizontal').removeClass('nav-pills nav-stacked nav-bracket')
                        .appendTo('.topnav');
                    $('.nav-horizontal .children').addClass('dropdown-menu').removeAttr('style');
                    $('.nav-horizontal li:last-child').show();
                    $('.searchform').removeClass('searchform').appendTo('.nav-horizontal li:last-child .dropdown-menu');
                    $('.nav-horizontal > li > a').each(function () {

                        $(this).parent().removeClass('nav-active');

                        if ($(this).parent().find('.dropdown-menu').length > 0) {
                            $(this).attr('class', 'dropdown-toggle');
                            $(this).attr('data-toggle', 'dropdown');
                        }

                    });
                }

            }

        }
    }

    $('#example').DataTable();

    $('.example').DataTable();


    $('#dataTable1,#dataTable2').DataTable();


    $('.datepicker').datepicker();


    $('#select1, #select2, #select3,#select4,#select5,#select6,#select7').select2();


    $('#myModal').on('click', function () {
        $('#myModal').modal();

    });

    $('#myModal').on('click', '[data-dismiss="modal"]', function (e) {
        e.stopPropagation();
    });

    $(document).on("click", "#deleteProject", function () {
        var myProjectId = $(this).data('project');
        $(".project_id").val(myProjectId);

    });
    $(document).on("click", "#deleteUser", function () {
        var myUserId = $(this).data('user');
        $(".user_id").val(myUserId);

    });

    $(document).on("click", "#editPassword", function () {
        var myUserId = $(this).data('user');
        $(".user_id").val(myUserId);

    });

    $(document).on("click", "#deleteWorkspace", function () {
        var myWorkspaceId = $(this).data('workspace');
        $(".workspace").val(myWorkspaceId);

    });


    var options = [];

    $('.dropdown-menu a').on('click', function (event) {

        var $target = $(event.currentTarget),
            val = $target.attr('data-value'),
            $inp = $target.find('input'),
            idx;

        if ((idx = options.indexOf(val)) > -1) {
            options.splice(idx, 1);
            setTimeout(function () {
                $inp.prop('checked', false)
            }, 0);
        } else {
            options.push(val);
            setTimeout(function () {
                $inp.prop('checked', true)
            }, 0);
        }

        $(event.target).blur();

        return false;
    });


//////////////////////////////////////////////////////////////

    $(window).on('load', function () {


        var groupByArray = $('.groupBy');
        var groupByArrayValue = $('.small.group-by');

        var subGroupByArray = $('.subGroupBy');
        var subGroupByArrayValue = $('.small.sub-group-by');


        var groupByText = $('.groupedBy');


        for (let i = 0; i < groupByArray.length; i++) {

            if (groupByArray[i].checked) {
                var group = document.createElement('h7');
                group.innerText = groupByArrayValue[i].innerText;
                group.className = "text-danger";
                groupByText[0].append(group);
                groupByText[0].append("/");
            }

        }

        for (let i = 0; i < subGroupByArray.length; i++) {

            if (subGroupByArray[i].checked) {
                var subgroup = document.createElement('h7');
                subgroup.innerText = subGroupByArrayValue[i].innerText;
                subgroup.className = "text-danger";
                groupByText[0].append(subgroup);

            }
        }
        var sortByArray = $('.sortBy');
        var sortByArrayValue = $('.small.sort-by');

        var sortDirArray = $('.sortDir');
        var sortDirArrayValue = $('.small.sort-dir');


        var sortByText = $('.sortedBy');


        for (let i = 0; i < sortByArray.length; i++) {

            if (sortByArray[i].checked) {
                var sortBy = document.createElement('h7');
                sortBy.innerText = sortByArrayValue[i].innerText;
                sortBy.className = "text-danger";
                sortByText[0].append(sortBy);
                sortByText[0].append("/");
            }

        }

        for (let i = 0; i < sortDirArray.length; i++) {

            if (sortDirArray[i].checked) {
                var sortDir = document.createElement('h7');
                sortDir.innerText = sortDirArrayValue[i].innerText;
                sortDir.className = "text-danger";
                sortByText[0].append(sortDir);

            }
        }
    })


    //////////////////////////////////////////////////////////////

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Headers": "Content-Type"
        }
    });


    $('.tag').on('focusout', function (e) {

        var inputResult = e.target.value;
        var dataResult = $(this).data('value');
        console.log(inputResult);


        if (inputResult != "") {
            var hidden = document.createElement('input');
            var parent = document.getElementById('hidden-fields');

            hidden.type = 'hidden';
            hidden.className = 'received-tags';
            hidden.name = 'tag[]';
            hidden.value = dataResult + " " + inputResult;
            parent.appendChild(hidden);
        }


    });


    $('.logout').on('click', function (e) {

        e.preventDefault();
        var logout = document.getElementById('logout-form');
        console.log(logout);

        logout.submit();

    });

    $(window).load(function () {


        $('.add-order').each(function () {
            if ($(this).data('order') !== "") {

                $(this).addClass('disabled');
            }
        });

        $('.delete-order').each(function () {
            if ($(this).data('order') === "") {

                $(this).hide();
            } else {

                $(this).show();

            }
        });
    });


    $(document).on('click', '.add-order', function () {

        var article = $(this).closest('.order').find('[name=article]').val();
        var table = $(this).closest('.order').find('[name=table]').val();
        var quantity = $(this).closest('.order').find('[name=quantity]').val();
        var user = $(this).closest('.order').find('[name=user]').val();
        var orderId = $('#orderId').val();
        var articlePrice=$(".article:last option:selected").data('price');

        var $order = $(".order:last").clone();
        var $selectedButton = $(this);
        var $beforeButton = $selectedButton.html();
        var receipt=parseInt($('#receipt').text());
        var $newPrice=receipt+articlePrice;

        $.ajax({
            url: '/order/apply',
            type: "POST",
            data: {
                'article': article,
                'table': table,
                'quantity': quantity,
                'user': user,
                'order': orderId,
                'newPrice': $newPrice,
                'permissions': "edit"
            },
            beforeSend: function () {
                $selectedButton.html('<i class="fa fa-spinner fa-spin "></i>');
            },
            error: function (err) {

                var error = err['responseJSON'];

                if (error.order) {
                    $selectedButton.html('<i class="fa fa-plus"></i>');
                    $.growl.error({message: error.order});
                }

                if (error.ratio) {
                    $.growl.error({message: error.ratio});
                    $selectedButton.html('<i class="fa fa-plus"></i>');
                }

            },
            success: function (orderId) {
                // $order.find('#select3').prop('selectedIndex', 0).trigger('change');
                $order.find('#select4').prop('selectedIndex', 0).trigger('change');
                $order.find('#select5').prop('selectedIndex', 0).trigger('change');
                $order.find('#select6').prop('selectedIndex', 0).trigger('change');
                $order.find('#select7').prop('selectedIndex', 0).trigger('change');
                $order.find("span").remove();
                $order.find("select").select2();
                $order.insertAfter(".order:last");
                $selectedButton.html($beforeButton);

                $('#receipt').text($newPrice);

                $selectedButton.closest('.order').find('#select3').attr('disabled', true);
                $selectedButton.closest('.order').find('#select4').attr('disabled', true);
                $selectedButton.closest('.order').find('#select5').attr('disabled', true);
                $selectedButton.closest('.order').find('#select6').attr('disabled', true);
                $selectedButton.closest('.order').find('#select7').attr('disabled', true);
                $selectedButton.closest('.order').find('.ratio').attr('disabled', true);


                $selectedButton.removeClass('btn-primary');
                $selectedButton.addClass('btn-success');
                $selectedButton.addClass('disabled');
                $selectedButton.find('i').removeClass('fa-plus');
                $selectedButton.find('i').addClass('fa-check');

                $selectedButton.data('data-order', orderId);
                $selectedButton.blur();
                $selectedButton.closest('.order').find('.delete-order').data('order', orderId);
                $selectedButton.closest('.order').find('.delete-order').show();
                $.growl.notice({message: "order is successfully added."});
            },
            complete: function () {

            }
        });
    });

    $(document).on('click', '.delete-order', function () {

        var $orderID = $(this).data('order');
        var $deleteButton = $(this);

        var articlePrice=$(".article:last option:selected").data('price');

        var receipt=parseInt($('#receipt').text());
        var $newPrice=receipt-articlePrice;


        $.ajax({
            url: '/order/delete',
            type: "POST",
            data: {
                'orderId': $orderID,
                'permissions': "delete"
            },
            beforeSend: function () {

                $deleteButton.html('<i class="fa fa-spinner fa-spin "></i>');

            },
            error: function () {
                $.growl.error({message: "Internal Server Error. Please try again."});
            },
            success: function () {
                $deleteButton.closest('.order').remove();
                $.growl.notice({message: "order is successfully deleted."});

                $('#receipt').text($newPrice);

            },
            complete: function () {


            }
        });

    });



});
