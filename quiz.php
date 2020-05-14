<?php include_once('inc/head.php'); ?>
<body class="theme-red" onload="playAudio(),removeNextButton()">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">PHP Simple Quiz System </a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <?php include_once('inc/menu.php'); ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y', time()); ?> <a href="#">PHP Simple Quiz System</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
    <?php if(isset($_GET['id_number'])) { ?>
    <section class="content">
    <div class="container-fluid">
    <audio src="audio/oxford_placement_test_listening.mp3" id="player" autoplay></audio>
    <div class="block-header">
        <h2>Quiz Page</h2>
    </div>
    <div class="row clearfix">
    <div class="col-md-12">
        <div id="quiz_timer" class="right" style="display:none;"></div>
    </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12" style="opacity: 0.7;">
        <div class="card" id="previousQuizContainer">
            <div class="body">
            <!-- Previous Question -->
            <div>
                <div id="pQuestion" class="question"></div>
                <label class="pOption" id="pOption1"><input type="radio" name="pOption" value="1" class="with-gap radio-col-blue" readonly /><span id="pOpt1"></span></label>
                <label class="pOption" id="pOption2"><input type="radio" name="pOption" value="2" class="with-gap radio-col-blue" readonly /><span id="pOpt2"></span></label>
                <label class="pOption" id="pOption3" style="display:none;"><input type="radio" name="pOption" value="3" class="with-gap radio-col-blue" readonly /><span id="pOpt3"></span></label>
            </div>
            <!-- Previous Question End -->
            </div><!-- card body -->
        </div><!-- card-1 -->
        </div><!-- End col-1 -->
    </div> <!-- End Row 1 -->
    <div class="row clearfix">
    <div class="col-md-12">
    <div class="card">
        <div class="body">
    <!-- Questions section -->
    <div id="quizContainer">
        <div class="title" id="title">Listening Section</div>
        <div id="question" class="question"></div>
        <div class="demo-radio-button" style="margin-bottom:20px">
        <label class="option"><input type="radio" name="option" value="1" class="with-gap radio-col-blue" /><span id="opt1"></span></label>
        <label class="option"><input type="radio" name="option" value="2" class="with-gap radio-col-blue" /><span id="opt2"></span></label>
        <label class="option" id="option3" style="display:none;"><input type="radio" name="option" value="3" class="with-gap radio-col-blue" /><span id="opt3"></span></label>
    </div>
        <button id="nextButton" class="btn btn-primary btn-lg btn-rounded waves-effect" onclick="loadNextQuestion();" style="display:none;">Next Question</button>
        <button class="btn btn-danger waves-effect" onclick="skipQuestion()" style="margin-left: 25px;">SKIP</button>
    </div>
    <div id="result" class="container result" style="display:none;"><!-- Result Container --></div>
    <!-- Questions Section End -->
    <input type="hidden" id="id_number" value="<?php echo $_SESSION['id_number']; ?>" />
    </div><!-- card body -->
    </div><!-- card-2 -->
    </div><!-- End Col-2 -->
    </div><!-- End 2nd row -->
    <div class="row clearfix">
    <div class="col-md-12" style="opacity: 0.7;">
        <div class="card" id="nextQuizContainer">
            <div class="body">
    <!-- Next Question -->
    <div>
        <div id="nQuestion" class="question"></div>
        <label class="nOption" id="nOption1"><input type="radio" name="nOption" value="1" class="with-gap radio-col-blue" readonly /><span id="nOpt1"></span></label>
        <label class="nOption" id="nOption2"><input type="radio" name="nOption" value="2" class="with-gap radio-col-blue" readonly /><span id="nOpt2"></span></label>
        <label class="nOption" id="nOption3" style="display:none;"><input type="radio" name="nOption" value="3" class="with-gap radio-col-blue" readonly /><span id="nOpt3"></span></label>
    </div>
    </div><!-- Next Question End -->
    </div><!-- card body -->
    </div><!-- card-3 -->
    </div><!-- End col-3 -->
    </div><!-- End 3rd Row -->
</section>
    <?php } else { ?>
        <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Warning!</h2>
            </div>
            <div class="signup-box">
        <div class="card">
            <div class="body">
                <h2>Please register your self to proceed for quiz!</h2>
                <hr />
                <p>Kindly visit <a href="index.php">registration</a> page and add required information to procced.</p>
            </div>
        </div>
        </div>
    </section>
    <?php } ?>
<?php include_once('inc/footer.php'); ?>