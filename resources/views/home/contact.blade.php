<section class="container-fluid" id="contact">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="section-title text-left">
        <code>&lt;contact&gt;</code>
      </div>
      <div class="row justify-content-center" id="contact-content">
        <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 text-primary">
          <form action="email" method="post" id="contact-form">
            <div class="form-group">
              {{ csrf_field() }}
              <input type="text" name="name" id="name" class="dcmf-form-control" placeholder="Your name" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" class="dcmf-form-control" placeholder="Email" required>
              <input type="hidden" name="url" id="url" class="dcmf-form-control" placeholder="URL">
            </div>
            <div class="form-group">
              <input type="text" name="subject" id="subject" class="dcmf-form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea name="message" id="message" class="dcmf-form-control" placeholder="Message" rows="4" cols="80" required></textarea>
            </div>
            <div class="col-xs-8 col-xs-offset-2" id="recaptcha-here"></div>
            <p class="text-center bg-danger text-white" id="errormessage"></p>
            <p class="text-center bg-success text-white" id="sendmessage">Your message has been sent! <br>I will reply you soon!</p>
            <button type="submit" name="sendmail" class="btn btn-primary btn-block" id="sendmail">
              <i class="fa fa-3x m-2 fa-paper-plane" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
      <div class="section-title text-right">
        <code>&lt;/contact&gt;</code>
      </div>
    </div>
  </div>
</section>
