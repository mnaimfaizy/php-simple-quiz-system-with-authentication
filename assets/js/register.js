$(function() {
  $("#sign_up").validate({
    rules: {
      name: {
        required: true,
        minlength: 4
      },
      fathername: {
        required: true,
        minlength: 4
      },
      id_number: {
        required: true,
        minlength: 2
      }
    },
    messages: {
      name: {
        required: "Please enter your fullname",
        minlength: "Your fullname must consist of at least 4 characters"
      },
      fathername: {
        required: "Please enter your fathername",
        minlength: "Your fathername must consist of at least 4 characters"
      },
      id_number: {
        required: "Please provide your ID Number",
        minlength: "Your id number must be at least 2 characters long"
      }
    },
    highlight: function(input) {
      console.log(input);
      $(input)
        .parents(".form-line")
        .addClass("error");
    },
    unhighlight: function(input) {
      $(input)
        .parents(".form-line")
        .removeClass("error");
    },
    errorPlacement: function(error, element) {
      $(element)
        .parents(".input-group")
        .append(error);
      $(element)
        .parents(".form-group")
        .append(error);
    }
  });
});
