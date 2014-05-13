<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
        Note: These tiles are completely responsive,
        you can add as many as you like
        -->
<div id="shortcut">
    <ul>
        <li>
            <a href="#inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
        </li>
        <li>
            <a href="#calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
        </li>
        <li>
            <a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
        </li>
        <li>
            <a href="#invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
        </li>
        <li>
            <a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>
<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<!--<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
    <?php echo HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js'); ?>
<script>
    if (!window.jQuery) {
        document.write('<?php echo HTML::script('js/libs/jquery-2.0.2.min.js'); ?>);
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<?php echo HTML::script('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js'); ?>

<!-- BOOTSTRAP JS -->
<?php echo HTML::script('js/bootstrap/bootstrap.min.js'); ?>

<!-- CUSTOM NOTIFICATION -->
<?php echo HTML::script('js/notification/SmartNotification.min.js'); ?>

<!-- JARVIS WIDGETS -->
<?php echo HTML::script('js/smartwidgets/jarvis.widget.min.js'); ?>

<!-- EASY PIE CHARTS -->
<?php echo HTML::script('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'); ?>

<!-- SPARKLINES -->
<?php echo HTML::script('js/plugin/sparkline/jquery.sparkline.min.js'); ?>

<!-- JQUERY VALIDATE -->
<?php echo HTML::script('js/plugin/jquery-validate/jquery.validate.min.js'); ?>

<!-- JQUERY MASKED INPUT -->
<?php echo HTML::script('js/plugin/masked-input/jquery.maskedinput.min.js'); ?>

<!-- JQUERY SELECT2 INPUT -->
<?php echo HTML::script('js/plugin/select2/select2.min.js'); ?>

<!-- JQUERY UI + Bootstrap Slider -->
<?php echo HTML::script('js/plugin/bootstrap-slider/bootstrap-slider.min.js'); ?>

<!-- browser msie issue fix -->
<?php echo HTML::script('js/plugin/msie-fix/jquery.mb.browser.min.js'); ?>

<!-- FastClick: For mobile devices -->
<?php echo HTML::script('js/plugin/fastclick/fastclick.js'); ?>

<!--[if IE 7]>

        <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

        <![endif]-->


<!-- MAIN APP JS FILE -->
<?php echo HTML::script('js/app.js'); ?>

<!-- PAGE RELATED PLUGIN(S) -->

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<?php echo HTML::script('js/plugin/flot/jquery.flot.cust.js'); ?>
<?php echo HTML::script('js/plugin/flot/jquery.flot.resize.js'); ?>
<?php echo HTML::script('js/plugin/flot/jquery.flot.tooltip.js'); ?>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<?php echo HTML::script('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js'); ?>
<?php echo HTML::script('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js'); ?>

<!-- Full Calendar -->
<?php echo HTML::script('js/plugin/fullcalendar/jquery.fullcalendar.min.js'); ?>

<!-- PAGE RELATED PLUGIN(S) -->
<?php echo HTML::script('js/plugin/dropzone/dropzone.min.js'); ?>

<script type="text/javascript">
    $(document).ready(function() {

        pageSetUp();

        var myDropzone = new Dropzone(
            "div#mydropzone",{
                url: "/upload"
            }
        )


//        Dropzone.autoDiscover = false;
//        $("div#mydropzone").dropzone({
//            url: "/upload"
//            addRemoveLinks : true,
//            maxFilesize: 0.5,
//            dictResponseError: 'Error uploading file!'
//        });


    })

</script>

<script>
$(document).ready(function() {

    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    pageSetUp();

    /*
                  * PAGE RELATED SCRIPTS
                  */

    $(".js-status-update a").click(function() {
        var selText = $(this).text();
        var $this = $(this);
        $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
        $this.parents('.dropdown-menu').find('li').removeClass('active');
        $this.parent().addClass('active');
    });

    /*
                 * TODO: add a way to add more todo's to list
                 */

    // initialize sortable
    $(function() {
        $("#sortable1, #sortable2").sortable({
            handle : '.handle',
            connectWith : ".todo",
            update : countTasks
        }).disableSelection();
    });

    // check and uncheck
    $('.todo .checkbox > input[type="checkbox"]').click(function() {
        var $this = $(this).parent().parent().parent();

        if ($(this).prop('checked')) {
            $this.addClass("complete");

            // remove this if you want to undo a check list once checked
            //$(this).attr("disabled", true);
            $(this).parent().hide();

            // once clicked - add class, copy to memory then remove and add to sortable3
            $this.slideUp(500, function() {
                $this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
                $this.remove();
                countTasks();
            });
        } else {
            // insert undo code here...
        }

    })
    // count tasks
    function countTasks() {

        $('.todo-group-title').each(function() {
            var $this = $(this);
            $this.find(".num-of-tasks").text($this.next().find("li").size());
        });

    }

    /*
                 * RUN PAGE GRAPHS
                 */

    /* TAB 1: UPDATING CHART */
    // For the demo we use generated data, but normally it would be coming from the server

    var data = [], totalPoints = 200, $UpdatingChartColors = $("#updating-chart").css('color');

    function getRandomData() {
        if (data.length > 0)
            data = data.slice(1);

        // do a random walk
        while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50;
            var y = prev + Math.random() * 10 - 5;
            if (y < 0)
                y = 0;
            if (y > 100)
                y = 100;
            data.push(y);
        }

        // zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i)
            res.push([i, data[i]])
        return res;
    }

    // setup control widget
    var updateInterval = 1500;
    $("#updating-chart").val(updateInterval).change(function() {

        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            $(this).val("" + updateInterval);
        }

    });

    // setup plot
    var options = {
        yaxis : {
            min : 0,
            max : 100
        },
        xaxis : {
            min : 0,
            max : 100
        },
        colors : [$UpdatingChartColors],
        series : {
            lines : {
                lineWidth : 1,
                fill : true,
                fillColor : {
                    colors : [{
                        opacity : 0.4
                    }, {
                        opacity : 0
                    }]
                },
                steps : false

            }
        }
    };

    var plot = $.plot($("#updating-chart"), [getRandomData()], options);

    /* live switch */
    $('input[type="checkbox"]#start_interval').click(function() {
        if ($(this).prop('checked')) {
            $on = true;
            updateInterval = 1500;
            update();
        } else {
            clearInterval(updateInterval);
            $on = false;
        }
    });

    function update() {
        if ($on == true) {
            plot.setData([getRandomData()]);
            plot.draw();
            setTimeout(update, updateInterval);

        } else {
            clearInterval(updateInterval)
        }

    }

    var $on = false;

    /*end updating chart*/

    /* TAB 2: Social Network  */

    $(function() {
        // jQuery Flot Chart
        var twitter = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], facebook = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]], data = [{
            label : "Twitter",
            data : twitter,
            lines : {
                show : true,
                lineWidth : 1,
                fill : true,
                fillColor : {
                    colors : [{
                        opacity : 0.1
                    }, {
                        opacity : 0.13
                    }]
                }
            },
            points : {
                show : true
            }
        }, {
            label : "Facebook",
            data : facebook,
            lines : {
                show : true,
                lineWidth : 1,
                fill : true,
                fillColor : {
                    colors : [{
                        opacity : 0.1
                    }, {
                        opacity : 0.13
                    }]
                }
            },
            points : {
                show : true
            }
        }];

        var options = {
            grid : {
                hoverable : true
            },
            colors : ["#568A89", "#3276B1"],
            tooltip : true,
            tooltipOpts : {
                //content : "Value <b>$x</b> Value <span>$y</span>",
                defaultTheme : false
            },
            xaxis : {
                ticks : [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"], [13, "JAN+1"]]
            },
            yaxes : {

            }
        };

        var plot3 = $.plot($("#statsChart"), data, options);
    });

    // END TAB 2

    // TAB THREE GRAPH //
    /* TAB 3: Revenew  */

    $(function() {

        var trgt = [[1354586000000, 153], [1364587000000, 658], [1374588000000, 198], [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080], [1414592000000, 353], [1424593000000, 749], [1434594000000, 523], [1444595000000, 258], [1454596000000, 688], [1464597000000, 364]], prft = [[1354586000000, 53], [1364587000000, 65], [1374588000000, 98], [1384589000000, 83], [1394590000000, 980], [1404591000000, 808], [1414592000000, 720], [1424593000000, 674], [1434594000000, 23], [1444595000000, 79], [1454596000000, 88], [1464597000000, 36]], sgnups = [[1354586000000, 647], [1364587000000, 435], [1374588000000, 784], [1384589000000, 346], [1394590000000, 487], [1404591000000, 463], [1414592000000, 479], [1424593000000, 236], [1434594000000, 843], [1444595000000, 657], [1454596000000, 241], [1464597000000, 341]], toggles = $("#rev-toggles"), target = $("#flotcontainer");

        var data = [{
            label : "Target Profit",
            data : trgt,
            bars : {
                show : true,
                align : "center",
                barWidth : 30 * 30 * 60 * 1000 * 80
            }
        }, {
            label : "Actual Profit",
            data : prft,
            color : '#3276B1',
            lines : {
                show : true,
                lineWidth : 3
            },
            points : {
                show : true
            }
        }, {
            label : "Actual Signups",
            data : sgnups,
            color : '#71843F',
            lines : {
                show : true,
                lineWidth : 1
            },
            points : {
                show : true
            }
        }]

        var options = {
            grid : {
                hoverable : true
            },
            tooltip : true,
            tooltipOpts : {
                //content: '%x - %y',
                //dateFormat: '%b %y',
                defaultTheme : false
            },
            xaxis : {
                mode : "time"
            },
            yaxes : {
                tickFormatter : function(val, axis) {
                    return "$" + val;
                },
                max : 1200
            }

        };

        plot2 = null;

        function plotNow() {
            var d = [];
            toggles.find(':checkbox').each(function() {
                if ($(this).is(':checked')) {
                    d.push(data[$(this).attr("name").substr(4, 1)]);
                }
            });
            if (d.length > 0) {
                if (plot2) {
                    plot2.setData(d);
                    plot2.draw();
                } else {
                    plot2 = $.plot(target, d, options);
                }
            }

        };

        toggles.find(':checkbox').on('change', function() {
            plotNow();
        });
        plotNow()

    });

    /*
                  * VECTOR MAP
                  */

    data_array = {
        "US" : 4977,
        "AU" : 4873,
        "IN" : 3671,
        "BR" : 2476,
        "TR" : 1476,
        "CN" : 146,
        "CA" : 134,
        "BD" : 100
    };

    $('#vector-map').vectorMap({
        map : 'world_mill_en',
        backgroundColor : '#fff',
        regionStyle : {
            initial : {
                fill : '#c4c4c4'
            },
            hover : {
                "fill-opacity" : 1
            }
        },
        series : {
            regions : [{
                values : data_array,
                scale : ['#85a8b6', '#4d7686'],
                normalizeFunction : 'polynomial'
            }]
        },
        onRegionLabelShow : function(e, el, code) {
            if ( typeof data_array[code] == 'undefined') {
                e.preventDefault();
            } else {
                var countrylbl = data_array[code];
                el.html(el.html() + ': ' + countrylbl + ' visits');
            }
        }
    });

    /*
                  * FULL CALENDAR JS
                  */

    if ($("#calendar").length) {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({

            editable : true,
            draggable : true,
            selectable : false,
            selectHelper : true,
            unselectAuto : false,
            disableResizing : false,

            header : {
                left : 'title', //,today
                center : 'prev, next, today',
                right : 'month, agendaWeek, agenDay' //month, agendaDay,
            },

            select : function(start, end, allDay) {
                var title = prompt('Event Title:');
                if (title) {
                    calendar.fullCalendar('renderEvent', {
                            title : title,
                            start : start,
                            end : end,
                            allDay : allDay
                        }, true // make the event "stick"
                    );
                }
                calendar.fullCalendar('unselect');
            },

            events : [{
                title : 'All Day Event',
                start : new Date(y, m, 1),
                description : 'long description',
                className : ["event", "bg-color-greenLight"],
                icon : 'fa-check'
            }, {
                title : 'Long Event',
                start : new Date(y, m, d - 5),
                end : new Date(y, m, d - 2),
                className : ["event", "bg-color-red"],
                icon : 'fa-lock'
            }, {
                id : 999,
                title : 'Repeating Event',
                start : new Date(y, m, d - 3, 16, 0),
                allDay : false,
                className : ["event", "bg-color-blue"],
                icon : 'fa-clock-o'
            }, {
                id : 999,
                title : 'Repeating Event',
                start : new Date(y, m, d + 4, 16, 0),
                allDay : false,
                className : ["event", "bg-color-blue"],
                icon : 'fa-clock-o'
            }, {
                title : 'Meeting',
                start : new Date(y, m, d, 10, 30),
                allDay : false,
                className : ["event", "bg-color-darken"]
            }, {
                title : 'Lunch',
                start : new Date(y, m, d, 12, 0),
                end : new Date(y, m, d, 14, 0),
                allDay : false,
                className : ["event", "bg-color-darken"]
            }, {
                title : 'Birthday Party',
                start : new Date(y, m, d + 1, 19, 0),
                end : new Date(y, m, d + 1, 22, 30),
                allDay : false,
                className : ["event", "bg-color-darken"]
            }, {
                title : 'Smartadmin Open Day',
                start : new Date(y, m, 28),
                end : new Date(y, m, 29),
                className : ["event", "bg-color-darken"]
            }],

            eventRender : function(event, element, icon) {
                if (!event.description == "") {
                    element.find('.fc-event-title').append("<br/><span class='ultra-light'>" + event.description + "</span>");
                }
                if (!event.icon == "") {
                    element.find('.fc-event-title').append("<i class='air air-top-right fa " + event.icon + " '></i>");
                }
            }
        });

    };

    /* hide default buttons */
    $('.fc-header-right, .fc-header-center').hide();

    // calendar prev
    $('#calendar-buttons #btn-prev').click(function() {
        $('.fc-button-prev').click();
        return false;
    });

    // calendar next
    $('#calendar-buttons #btn-next').click(function() {
        $('.fc-button-next').click();
        return false;
    });

    // calendar today
    $('#calendar-buttons #btn-today').click(function() {
        $('.fc-button-today').click();
        return false;
    });

    // calendar month
    $('#mt').click(function() {
        $('#calendar').fullCalendar('changeView', 'month');
    });

    // calendar agenda week
    $('#ag').click(function() {
        $('#calendar').fullCalendar('changeView', 'agendaWeek');
    });

    // calendar agenda day
    $('#td').click(function() {
        $('#calendar').fullCalendar('changeView', 'agendaDay');
    });

    /*
                  * CHAT
                  */

    $.filter_input = $('#filter-chat-list');
    $.chat_users_container = $('#chat-container > .chat-list-body')
    $.chat_users = $('#chat-users')
    $.chat_list_btn = $('#chat-container > .chat-list-open-close');
    $.chat_body = $('#chat-body');

    /*
                 * LIST FILTER (CHAT)
                 */

    // custom css expression for a case-insensitive contains()
    jQuery.expr[':'].Contains = function(a, i, m) {
        return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };

    function listFilter(list) {// header is any element, list is an unordered list
        // create and add the filter form to the header

        $.filter_input.change(function() {
            var filter = $(this).val();
            if (filter) {
                // this finds all links in a list that contain the input,
                // and hide the ones not containing the input while showing the ones that do
                $.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
                $.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
            } else {
                $.chat_users.find("li").slideDown();
            }
            return false;
        }).keyup(function() {
                // fire the above change event after every letter
                $(this).change();

            });

    }

    // on dom ready
    listFilter($.chat_users);

    // open chat list
    $.chat_list_btn.click(function() {
        $(this).parent('#chat-container').toggleClass('open');
    })

    $.chat_body.animate({
        scrollTop : $.chat_body[0].scrollHeight
    }, 500);

});

</script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

    pageSetUp();

    /*
              * Autostart Carousel
              */
    $('.carousel.slide').carousel({
        interval : 3000,
        cycle : true
    });
    $('.carousel.fade').carousel({
        interval : 3000,
        cycle : true
    });

    // Fill all progress bars with animation

    $('.progress-bar').progressbar({
        display_text : 'fill'
    });


    /*
              * Smart Notifications
              */
    $('#eg1').click(function(e) {

        $.bigBox({
            title : "Big Information box",
            content : "This message will dissapear in 6 seconds!",
            color : "#C46A69",
            //timeout: 6000,
            icon : "fa fa-warning shake animated",
            number : "1",
            timeout : 6000
        });

        e.preventDefault();

    })

    $('#eg2').click(function(e) {

        $.bigBox({
            title : "Big Information box",
            content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            color : "#3276B1",
            //timeout: 8000,
            icon : "fa fa-bell swing animated",
            number : "2"
        });

        e.preventDefault();
    })

    $('#eg3').click(function(e) {

        $.bigBox({
            title : "Shield is up and running!",
            content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            color : "#C79121",
            //timeout: 8000,
            icon : "fa fa-shield fadeInLeft animated",
            number : "3"
        });

        e.preventDefault();

    })

    $('#eg4').click(function(e) {

        $.bigBox({
            title : "Success Message Example",
            content : "Lorem ipsum dolor sit amet, test consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            color : "#739E73",
            //timeout: 8000,
            icon : "fa fa-check",
            number : "4"
        }, function() {
            closedthis();
        });

        e.preventDefault();

    })



    $('#eg5').click(function() {

        $.smallBox({
            title : "Ding Dong!",
            content : "Someone's at the door...shall one get it sir? <p class='text-align-right'><a href='javascript:void(0);' class='btn btn-primary btn-sm'>Yes</a> <a href='javascript:void(0);' class='btn btn-danger btn-sm'>No</a></p>",
            color : "#296191",
            //timeout: 8000,
            icon : "fa fa-bell swing animated"
        });

    });



    $('#eg6').click(function() {

        $.smallBox({
            title : "Big Information box",
            content : "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            color : "#5384AF",
            //timeout: 8000,
            icon : "fa fa-bell"
        });

    })

    $('#eg7').click(function() {

        $.smallBox({
            title : "James Simmons liked your comment",
            content : "<i class='fa fa-clock-o'></i> <i>2 seconds ago...</i>",
            color : "#296191",
            iconSmall : "fa fa-thumbs-up bounce animated",
            timeout : 4000
        });

    })

    function closedthis() {
        $.smallBox({
            title : "Great! You just closed that last alert!",
            content : "This message will be gone in 5 seconds!",
            color : "#739E73",
            iconSmall : "fa fa-cloud",
            timeout : 5000
        });
    }

    /*
             * SmartAlerts
             */
    // With Callback
    $("#smart-mod-eg1").click(function(e) {
        $.SmartMessageBox({
            title : "Smart Alert!",
            content : "This is a confirmation box. Can be programmed for button callback",
            buttons : '[No][Yes]'
        }, function(ButtonPressed) {
            if (ButtonPressed === "Yes") {

                $.smallBox({
                    title : "Callback function",
                    content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
                    color : "#659265",
                    iconSmall : "fa fa-check fa-2x fadeInRight animated",
                    timeout : 4000
                });
            }
            if (ButtonPressed === "No") {
                $.smallBox({
                    title : "Callback function",
                    content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
                    color : "#C46A69",
                    iconSmall : "fa fa-times fa-2x fadeInRight animated",
                    timeout : 4000
                });
            }

        });
        e.preventDefault();
    })
    // With Input
    $("#smart-mod-eg2").click(function(e) {

        $.SmartMessageBox({
            title : "Smart Alert: Input",
            content : "Please enter your user name",
            buttons : "[Accept]",
            input : "text",
            placeholder : "Enter your user name"
        }, function(ButtonPress, Value) {
            alert(ButtonPress + " " + Value);
        });

        e.preventDefault();
    })
    // With Buttons
    $("#smart-mod-eg3").click(function(e) {

        $.SmartMessageBox({
            title : "Smart Notification: Buttons",
            content : "Lots of buttons to go...",
            buttons : '[Need?][You][Do][Buttons][Many][How]'
        });

        e.preventDefault();
    })
    // With Select
    $("#smart-mod-eg4").click(function(e) {

        $.SmartMessageBox({
            title : "Smart Alert: Select",
            content : "You can even create a group of options.",
            buttons : "[Done]",
            input : "select",
            options : "[Costa Rica][United States][Autralia][Spain]"
        }, function(ButtonPress, Value) {
            alert(ButtonPress + " " + Value);
        });

        e.preventDefault();
    });

    // With Login
    $("#smart-mod-eg5").click(function(e) {

        $.SmartMessageBox({
            title : "Login form",
            content : "Please enter your user name",
            buttons : "[Cancel][Accept]",
            input : "text",
            placeholder : "Enter your user name"
        }, function(ButtonPress, Value) {
            if (ButtonPress == "Cancel") {
                alert("Why did you cancel that? :(");
                return 0;
            }

            Value1 = Value.toUpperCase();
            ValueOriginal = Value;
            $.SmartMessageBox({
                title : "Hey! <strong>" + Value1 + ",</strong>",
                content : "And now please provide your password:",
                buttons : "[Login]",
                input : "password",
                placeholder : "Password"
            }, function(ButtonPress, Value) {
                alert("Username: " + ValueOriginal + " and your password is: " + Value);
            });
        });

        e.preventDefault();
    });


})

</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>


