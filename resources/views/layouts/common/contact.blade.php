<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
      <div class="text-center">

        <h2 class="section-heading text-uppercase">Contact Us</h2>
        <h3 class="section-subheading text-muted">
         Contact us to get Distrilled Water
        </h3>
      </div>
    <form action="{{ url("add-contact") }}" method="POST">
       @csrf
        <div class="row align-items-stretch mb-5">
          <div class="col-md-6">
            <div class="form-group">
              <input class="form-control" type="text" name="name" placeholder="Your Name *" required="required"/>
            </div>
            <div class="form-group">
              <input
                class="form-control" type="email" name="email" placeholder="Your Email *"required="required" />
            </div>
            <div class="form-group mb-md-0">
              <input class="form-control" name="phone" type="tel"placeholder="Your Phone *"required="required"/>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group form-group-textarea mb-md-0">
              <textarea class="form-control" name="message" placeholder="Your Message *" rows="6" required="required"></textarea>
            </div>
          </div>
        </div>
        <div class="text-center">
          <div id="success"></div>
          <button class="btn btn-primary btn-xl text-uppercase" type="submit">
            Send Message
          </button>
        </div>
      </form>
    </div>
  </section>