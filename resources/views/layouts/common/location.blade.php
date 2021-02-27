<section class="page-section" id="location">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Locations</h2>
        <h3 class="section-subheading text-muted">
          We located in Different Locations
        </h3>
      </div>

      <div>

        <?php  $locations = App\Location::all() ?>
        <ul class="list-group">
       @foreach ($locations as $location)
              <li class="list-group-item">
                {{ $location->address }}
              </li>
              @endforeach
            </ul>

      </div>
    </div>
  </section>