this is the test page.
<?php
//require_once '/../../models/event.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Summernote</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

<button id="edit" class="btn btn-primary" onclick="edit()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="save()" type="button">Save</button>
<div class="click2edit">click2edit</div>

<script>
    var edit = function() {
  $('.click2edit').summernote({focus: true});
};

var save = function() {
  var markup = $('.click2edit').summernote('code');
  $('.click2edit').summernote('destroy');
};
</script>
</body>
</html>

    
