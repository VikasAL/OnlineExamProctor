<style>
    *:fullscreen,
    *:-webkit-full-screen,
    *:-moz-full-screen {
        background-color: rgba(255, 255, 255, 0) !important;
        padding: 20px;
    }

    ::backdrop {
        background-color: white;

    }
</style>

<?php
$examId = $_GET['id'];

$selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
$selExamTimeLimit = $selExam['ex_time_limit'];
$_SESSION['time'] = $selExamTimeLimit;
$exDisplayLimit = $selExam['ex_questlimit_display'];
// $examId = $_COOKIE['exId'];

// $selExam = $_SESSION['selExam'];
// $selExamTimeLimit = $_SESSION['time'];
// $exDisplayLimit = $_SESSION['limit'];

?>

<!-- id="appin" onload="requestFullScreen();" onmouseover="requestFullScreen();"
    oncontextmenu="requestFullScreen()" ondrag="select()" -->
<div class="app-main__outer">
    <div class="app-main__inner" id="fscreen" onload="requestFullScreen();" onmouseover="requestFullScreen();" onfocus="requestFullScreen()" onscroll="requestFullScreen()">
        <div class="col-md-12">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <?php echo $selExam['ex_title']; ?>
                            <div class="page-title-subheading">
                                <?php echo $selExam['ex_description']; ?>
                                <script type="text/python" src="main.py"></script>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <form name="cd">
                            <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit;
                                                                                    ?>">
                            <label>Remaining Time : </label>
                            <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 p-0 mb-4">
            <form method="post" id="submitAnswerFrm">
                <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
                <input type="hidden" name="examAction" id="examAction">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php
                    $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' ORDER BY rand() LIMIT $exDisplayLimit ");
                    if ($selQuest->rowCount() > 0) {
                        $i = 1;
                        while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                            <?php $questId = $selQuestRow['eqt_id']; ?>
                            <tr>
                                <td>
                                    <p><b><?php echo $i++; ?> .) <?php echo $selQuestRow['exam_question']; ?></b></p>
                                    <div class="col-md-4 float-left">
                                        <div class="form-group pl-4 ">
                                            <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch1']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck">

                                            <label class="form-check-label" for="invalidCheck">
                                                <?php echo $selQuestRow['exam_ch1']; ?>
                                            </label>
                                        </div>

                                        <div class="form-group pl-4">
                                            <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch2']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck">

                                            <label class="form-check-label" for="invalidCheck">
                                                <?php echo $selQuestRow['exam_ch2']; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 float-left">
                                        <div class="form-group pl-4">
                                            <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch3']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck">

                                            <label class="form-check-label" for="invalidCheck">
                                                <?php echo $selQuestRow['exam_ch3']; ?>
                                            </label>
                                        </div>

                                        <div class="form-group pl-4">
                                            <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $selQuestRow['exam_ch4']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck">

                                            <label class="form-check-label" for="invalidCheck">
                                                <?php echo $selQuestRow['exam_ch4']; ?>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        ?>
                        <tr>
                            <td style="padding: 20px;">
                                <button type="button" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>
                                <input name="submit" type="submit" id="submit" value="Submit" onclick="cancelFullScreen()" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswerFrmBtn">
                            </td>
                        </tr>

                    <?php } else { ?>
                        <b>No question at this moment</b>
                    <?php }
                    ?>
                </table>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    count = 3;

    function preventBack() {
        window.history.forward();
    }
    setTimeout("preventBack()", 0);

    window.onunload = function() {
        requestFullScreen();
    };

    if (count <= 0) {
        // document.getElementById("submitAnswerFrm").submit();
        document.getElementById("submit").click();
    }
    window.addEventListener('blur', function() {
        if (count <= 0) {
            // document.getElementById("submitAnswerFrm").submit();
            document.getElementById("submit").click();
        } else {
            count--;
            requestFullScreen();
        }
    });

    function requestFullScreen() {
        // Supports most browsers and their versions.
        var el = document.getElementById("fscreen");
        //console.log("value " ,el);
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
            .msRequestFullscreen;

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

    function cancelFullScreen() {
        var el = document;
        var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el.exitFullscreen || el.webkitExitFullscreen;
        if (requestMethod) { // cancel full screen.
            requestMethod.call(el);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }


    // launchFullscreen(document.getElementsById("appin"));

    // function launchFullscreen(element) {
    //     if(element.requestFullscreen) {
    //     element.requestFullscreen();
    //   } else if(element.mozRequestFullScreen) {
    //     element.mozRequestFullScreen();
    //   } else if(element.webkitRequestFullscreen) {
    //     element.webkitRequestFullscreen();
    //   } else if(element.msRequestFullscreen) {
    //     element.msRequestFullscreen();
    //   }
    // }



    // window.onload = function(){
    //   document.getElementById('appin').click();
    //   requestFullScreen();
    // }


    // window.onload = function(){
    //   document.getElementById('btn').click();

    // var scriptTag = document.createElement("script");
    // scriptTag.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js";
    // document.getElementsByTagName("head")[0].appendChild(scriptTag);
    // }


    // function toggleFullScreen(elem) {
    //     // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    //     if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
    //         if (elem.requestFullScreen) {
    //             elem.requestFullScreen();
    //         } else if (elem.mozRequestFullScreen) {
    //             elem.mozRequestFullScreen();
    //         } else if (elem.webkitRequestFullScreen) {
    //             elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    //         } else if (elem.msRequestFullscreen) {
    //             elem.msRequestFullscreen();
    //         }
    //     }
    // }
</script>