    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <?php if($page_name == 'quiz.php'){ ?>
      <script src="questions/questions.js"></script>
      <script src="assets/js/quiz-script.js"></script>
      <script>
        $(document).ready(function() {
          $( ".option" ).on("click", function() {
            //console.log("clicked!");
            $( ".option" ).css( {
              "backgroundColor": "rgba(255, 255, 255, 0.5)",
              "color": "#000000"
            });
            //next.addClass("valid");
            $(this).css({
              "backgroundColor": "#0803bc",
              "color": "#f6f6f6"
            });
          });

          $("#nextButton").on("click", function(){
            $(".option").css({
              "backgroundColor": "rgba(255, 255, 255, 0.5)",
              "color": "#000000"
            });
          });

        });
      </script>
    <?php } ?>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>

    <?php if($page_name != 'quiz.php'){ ?>
    <!-- Validation Plugin Js -->
    <script src="assets/plugins/jquery-validation/jquery.validate.js"></script>
    <?php } ?>
    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <?php if($page_name != 'quiz.php') { ?>
    <script src="assets/js/register.js"></script>

    <?php } ?>
    </body>

</html>