    <footer class="container-fluid">
      <div class="row">
        <div class="col">
          <small>{!! date('Y') !!} DCMF.HU</small>
        </div>
        <div class="col text-center">
          <i class="fa fa-lg fa-facebook-official" aria-hidden="true"></i>
          <i class="fa fa-lg fa-linkedin-square" aria-hidden="true"></i>
          <i class="fa fa-lg fa-github-square" aria-hidden="true"></i>
          <i class="fa fa-lg fa-stack-overflow" aria-hidden="true"></i>
          <i class="fa fa-lg fa-free-code-camp" aria-hidden="true"></i>
        </div>
        <div class="col-auto ml-auto">
          <i class="fa fa-lg fa-chevron-circle-up text-primary clickable" aria-hidden="true"></i>
        </div>
      </div>
    </footer>
    @if (!empty(session('username')))
      <script src="js/portfolio.js"></script>
      <script src="js/service.js"></script>
      <script src="js/skills.js"></script>
    @endif
    <script src="js/contact.js"></script>
  </body>

</html>
