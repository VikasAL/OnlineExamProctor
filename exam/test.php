<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style>
        *:fullscreen, *:-webkit-full-screen, *:-moz-full-screen {
            background-color: rgba(255,255,255,0)!important;
            padding: 20px;
        }

        ::backdrop
        {
            background-color: white;
            
        }
    </style>

</head>

<body id="appin" onclick="requestFullScreen();" onload="requestFullScreen();" onmouseover="requestFullScreen();" oncontextmenu="requestFullScreen()" ondrag="select()">

    <div class="wrapper">

        <!-- Page Content  -->
        <div id="content">

            <div class="container">

            <div class='container'>
                Time <div id='seconds'></div>
            </div>
                <!-- <button class="btn btn-info" onClick="requestFullScreen();">Full Screen</button> -->
                <button class="btn btn-info" onClick="startExam();">Start</button>
                <button class="btn btn-info" onClick="cancelFullScreen();">Close Full Screen</button>
                <a href="index.php" class="btn btn-info" ">Submit</a>
            </div>
            
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">

        function startExam() {
            var count = 20;
            var myInterval;
            var c = 0;
            // Active
            window.addEventListener('focus', startTimer);

            window.addEventListener('blur', stopTimer);
            // Inactive
            
            function timerHandler() {
                if(count>0) {
                    count--;
                    document.getElementById("seconds").innerHTML = count;
                }
                else if(count==0) {
                    stopTimer();
                }
            }

            // Start timer
            function startTimer() {
                myInterval = window.setInterval(timerHandler, 1000);
            }

            // Stop timer
            function stopTimer() {
                c++;
                if(c==3) {
                    alert("time over")
                    cancelFullScreen();
                    window.clearInterval(myInterval);
                    document.querySelector("a").click();
                }
                else {
                    alert("dont");
                    requestFullScreen();
                }
            }
        }


        function cancelFullScreen() {
            var el = document;
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen||el.webkitExitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen() {
            // Supports most browsers and their versions.
            var el = document.getElementById("appin");
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }

        // function toggleFullScreen() {
            // el = document.documentElement;
        //     if (!el) {
        //         el = document.body; // Make the body go full screen.
        //     }
        //     var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);

        //     if (isInFullScreen) {
        //         cancelFullScreen();
        //     } else {
        //         requestFullScreen(el);
        //     }
        //     return false;
        // }

</script>
</body>

</html>