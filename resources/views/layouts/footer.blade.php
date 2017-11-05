    <footer class="container-fluid">
      <div class="row align-items-center no-gutters">
        <div class="col text-center">
          <span><small>&copy; {!! date('Y') !!}  dcmf.hu</small></span>

        </div>
        <div class="col-1">
          <a href="https://www.facebook.com/david.baar.718" target="_blank">
            <i class="fa fa-facebook-official" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col-1">
          <a href="https://www.linkedin.com/in/david-zambo/" target="_blank">
            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col-1">
          <a href="https://github.com/davidzambo" target="_blank">
            <i class="fa fa-github-square" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col-1">
          <a href="https://stackoverflow.com/users/7706546/david-zambo" target="_blank">
            <i class="fa fa-stack-overflow" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col-1">
          <a href="https://www.freecodecamp.org/davidzambo" target="_blank">
            <i class="fa fa-free-code-camp" aria-hidden="true"></i>
          </a>
        </div>
        <div class="col text-right">
          <a class="smooth-scroll-up">
            <i class="fa fa-2x fa-chevron-circle-up scroll-up clickable text-primary" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </footer>

    @if (!empty(session('username')))
      <script src="js/portfolio.js"></script>
      <script src="js/service.js"></script>
      <script src="js/skills.js"></script>
    @endif
    <script src="js/contact.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <!-- <script src="js/navbar-position.js"></script> -->
    <script src="js/fadein.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105430750-1', 'auto');
  ga('send', 'pageview');

  </script>
  </body>

</html>
