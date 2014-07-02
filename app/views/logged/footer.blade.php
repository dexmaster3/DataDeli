<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
        Note: These tiles are completely responsive,
        you can add as many as you like
        -->
<div id="shortcut">
    <ul>
<!--        <li>-->
<!--            <a href="#inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>-->
<!--        </li>-->
<!--        <li>-->
<!--            <a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>-->
<!--        </li>-->
        <li>
            <a href="{{ URL::to('/users/1/edit/') }}" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Edit Profile </span> </span> </a>
        </li>
<!--        <li>-->
<!--            <a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>-->
<!--        </li>-->
        <li>
            <a href="{{ URL::to('/users/profile/') }}" class="jarvismetro-tile big-cubes bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>
<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<!--<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="/js/libs/jquery-2.0.2.min.js"><\/script>');
    }
</script>

{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}
<script>
    if (!window.jQuery.ui) {
        document.write('<script src="/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
{{ HTML::script('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}

<!-- BOOTSTRAP JS -->
{{ HTML::script('js/bootstrap/bootstrap.min.js') }}

<!-- CUSTOM NOTIFICATION -->
{{ HTML::script('js/notification/SmartNotification.min.js') }}

<!-- JARVIS WIDGETS -->
{{ HTML::script('js/smartwidgets/jarvis.widget.min.js') }}

<!-- EASY PIE CHARTS -->
{{ HTML::script('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}

<!-- SPARKLINES -->
{{ HTML::script('js/plugin/sparkline/jquery.sparkline.min.js') }}

<!-- JQUERY VALIDATE -->
{{ HTML::script('js/plugin/jquery-validate/jquery.validate.min.js') }}

<!-- JQUERY MASKED INPUT -->
{{ HTML::script('js/plugin/masked-input/jquery.maskedinput.min.js') }}

<!-- JQUERY SELECT2 INPUT -->
{{ HTML::script('js/plugin/select2/select2.min.js') }}

<!-- JQUERY UI + Bootstrap Slider -->
{{ HTML::script('js/plugin/bootstrap-slider/bootstrap-slider.min.js') }}

<!-- browser msie issue fix -->
{{ HTML::script('js/plugin/msie-fix/jquery.mb.browser.min.js') }}

<!-- FastClick: For mobile devices -->
{{ HTML::script('js/plugin/fastclick/fastclick.js') }}

<!--[if IE 7]>

        <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

        <![endif]-->


<!-- MAIN APP JS FILE -->
{{ HTML::script('js/app.js') }}


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
