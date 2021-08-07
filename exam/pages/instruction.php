<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="col-md-12">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <h1>Exam Instructions</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 p-0 mb-4">
            <div>
                <h2>Before starting the exam:</h2>
                <ol>
                    <li>Make sure your device (mobile/tab/laptop/desktop) is ready and at your disposal for appearing
                        for the
                        online exam. </li>
                    <li>Make sure you have a good and stable internet connection. </li>
                </ol>
            </div>
            <div>
                <h2>During the exam:</h2>
                <ol>
                    <li>Do not resize or minimise the browser during the online exam</li>
                    <li>
                        Do not close the browser during the test before your exam is complete.
                    </li>
                    <li>
                        Do not click the ‘BACK’ button of browser during exam.
                    </li>
                    <li>Keep an eye on the TIMER CLOCK on top left of the online exam page of the browser to keep a
                        track of
                        the time left.</li>
                    <li>Do not leave the online exam browser page IDLE for more than 5 minutes to prevent the system
                        from
                        logging you out automatically. Keep moving the cursor (for laptop/desktop) or touch the screen
                        (from
                        mobile) frequently during the exam
                    </li>
                    <li>After finishing the exam, click on the click the submit button at the bottom of the browser page
                        with confirmation</li>
                    <li>
                        Once submitted, a message shall be displayed “Your Exam has been submitted successfully’ and you
                        can logout from the session.
                    </li>

                </ol>
            </div>

            <div>
                <h2>General instructions:</h2>
                <ol>
                    <li>
                        Make sure you appear for the online exam sitting alone in a well lit room with no background
                        noise during
                        the entire process of the exam.
                    </li>
                    <li>
                        For subjects that requires rough work, make sure you do the rough works on blank sheet and not
                        on any
                        notebook.
                    </li>
                    <li>
                        If any student is found to use unfair means or if the student is not visible on camera during
                        the entire
                        course of the online exam, that student’s exam will be disqualified
                    </li>
                </ol>
            </div>

            <form method="POST" onsubmit="return sessionFunction()" >
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera" class="ml-5"></div>
                        <br />
                        <input class="btn btn-primary ml-5" type="button" value="Take Snapshot"
                            onclick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div id="results" class="mt-2 ml-5">Your captured image will appear here...</div>
                    </div>

                    <div>
                        <input class="mt-4 ml-5" id="checkbox_button" type="checkbox" id="terms_and_conditions" value="1"
                            onclick="terms_changed(this)" disabled/>
                        <label class="ml-2" for="terms_and_conditions">I have read the above instruction properly, I will be responsible for any kind of malicious activities by aknlowledging these conditions</label>
                    </div>
                    <div class="col-md-12 my-3 text-center">
                        <button class="btn btn-success btn-lg" type="submit" id="submit_button" onclick="sessionFunction()" disabled>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script language="JavaScript">

Webcam.set({
    width: 350,
    height: 300,
    image_format: 'png',
    jpeg_quality: 90
});

Webcam.attach('#my_camera');

function take_snapshot() {
    Webcam.snap(function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        document.getElementById("checkbox_button").disabled = false;
    });
}

function terms_changed(termsCheckBox) {
    if (termsCheckBox.checked) {
      
        document.getElementById("submit_button").disabled = false;
    } else {

        document.getElementById("submit_button").disabled = true;
    }
}
 
 function sessionFunction() {
   var id = sessionStorage.getItem('exam');
   document.cookie = "exId = "+ id;
   <?php 
        $examId = $_COOKIE['exId'];
        $_SESSION['examId'] = $examId; 

        $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
        $_SESSION['selExam'] = $selExam;

        $selExamTimeLimit = $selExam['ex_time_limit'];
        $_SESSION['time'] = $selExamTimeLimit;

        $exDisplayLimit = $selExam['ex_questlimit_display'];
        $_SESSION['limit'] = $exDisplayLimit;

    ?>
   window.location.href="home.php?page=exam";
   return false;
 }
</script>