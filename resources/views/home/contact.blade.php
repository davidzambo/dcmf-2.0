<section class="container-fluid" id="contact">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="section-title text-left">
        <code>&lt;contact&gt;</code>
      </div>
      <div class="row justify-content-center">
        <div class="col-6 text-primary">
          <form action="index.html" method="post" id="contact-form">
            <div class="form-group">
              <input type="text" name="name" id="name" class="dcmf-form-control" placeholder="Your name" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" class="dcmf-form-control" placeholder="Your email address" required>
            </div>
            <div class="form-group">
              <input type="text" name="subject" id="subject" class="dcmf-form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea name="message" id="message" class="dcmf-form-control" placeholder="Your message" rows="8" cols="80" required></textarea>
            </div>
            <p class="text-center bg-danger text-white" id="errormessage">GALI</p>
            <p class="text-center bg-success text-white" id="sendmessage">HALI</p>
            <button type="submit" name="sendmail" class="btn btn-primary btn-block" id="sendmail">
              <i class="fa fa-2x fa-paper-plane" aria-hidden="true"></i>
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

<style>
  .dcmf-form-control{
    background-color: transparent;
    width: 100%;
    border: none;
    border-bottom: 1px solid grey;
    outline: none;
    font-size: 1.2rem;
    padding: 0.5rem 0.5rem;
  }
  .dcmf-for-control:focus{
    border-bottom: 1px solid red;
  }

  textarea{
    resize: none;
  }

  footer{
    background-color: black;
    padding: 1rem;
  }
</style>
