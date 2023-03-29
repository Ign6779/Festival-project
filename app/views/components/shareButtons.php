<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- share with social media buttons -->
<div class="share">
    <h4>Share this page!</h4>
<button id="twitter-button" class="btn btn-primary mr-2">
    <i class="fab fa-twitter mr-2"></i>Twitter
  </button>
  <button id="facebook-button" class="btn btn-primary">
    <i class="fab fa-facebook-f mr-2"></i>Facebook
  </button>
  </div>
  <script>
    document.getElementById('twitter-button').addEventListener('click', function() {
    var url = encodeURIComponent(window.location.href);
    var text = encodeURIComponent(document.title);
    var shareUrl = 'https://twitter.com/intent/tweet?url=' + url + '&text=' + text;
    window.open(shareUrl, '_blank');
});

document.getElementById('facebook-button').addEventListener('click', function() {
    var url = encodeURIComponent(window.location.href);
    var shareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
    window.open(shareUrl, '_blank');
});
</script>