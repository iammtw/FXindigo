<!-- About-->
<section class="page-section" id="about">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">About us</h2>
        <h3 class="section-subheading text-muted">
          Know everything about this
        </h3>
      </div>

      <div>

        <?php  $about = App\Page::where('name','about')->first() ?>
        {{ $about->description }}

        
      </div>
    </div>
  </section>