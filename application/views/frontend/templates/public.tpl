<!DOCTYPE html>
<html lang="en">
<head>
  <title>{$title|default:''}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="header>" class="container">

    </div>

    <div class="container">
        <div id="content">


          {* 2nd way $dis->view($view_file)*}
          {$this->load->view($view_file)}

        </div>
    </div>

    <div id="footer" class="container">
        <p>footer</p>
    </div>
</body>
</html>