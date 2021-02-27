 <!-- Portfolio Grid-->
 <section class="page-section bg-light" id="portfolio">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Products</h2>
        <h3 class="section-subheading text-muted">
          All These Products we are delievery.
        </h3>
      </div>
      <div class="row">

        <?php  $products = App\Product::take(6)->get();  ?>

        @foreach ($products as $product)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                <a
                    class="portfolio-link"
                    href=" {{ url('customer/add-to-cart/'.$product->id) }} "
                    ><div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                        <i class="fas fa-plus fa-3x"></i>
                    </div>
                    </div>
                    <img
                    class="img-fluid"
                    src="{{ url('../storage/app/public/'.$product->img)  }}"
                    width="400"
                    height="300"
                    alt=""
                /></a>
                <div class="portfolio-caption">
                    <div class="portfolio-caption-heading">{{ $product->name }}</div>
                    <div class="portfolio-caption-subheading text-muted"> {{ $product->litres }} Litres</div>
                    <div class="portfolio-caption-subheading text-primary bg-warning" style="color:#17a1c0 !important; font-weight:bold"> Rs {{ $product->price }} /  <span class="text-muted"> Piece </span> </div>
                </div>
                </div>
            </div>
        @endforeach
        


      </div>
    </div>
  </section>