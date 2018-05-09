<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="black.jpg">
        <title>Car Service</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="layout.css" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body>
    <body>
      <div class="form-group">
                                  <label class="col-lg-2 control-label">Date of Event</label>
                                  <div class="col-lg-5">
                                    <input type="text" id="datepicker" class="form-control" name="date" required>
                                    <span class = "label label-warning">Check if date is available</span>
                                  </div>
                                </div>
    </body>
    <?php include 'script.php';?>
    <script>
  $(function () {
  //Initialize Select2 Elements
    $(".select2").select2();
  })
$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>