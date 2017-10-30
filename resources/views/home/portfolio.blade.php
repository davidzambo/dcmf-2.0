<section class="container-fluid" id="portfolio">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="section-title text-left">
        <code>&lt;portfolio&gt;</code>
      </div>
      <div class="row" id ="portfolio-content">
        @foreach($portfolios as $portfolio)
          <div class="col-md-3 col-4 portfolio-container">

            @if (!empty(session('username')))
            <div class="admin-button edit-button">
              <i class="fa fa-pencil btn-sm btn-warning clickable"
              data-toggle="modal"
              data-target="#editPortfolio"
              data-name="{{ $portfolio->name }}"
              data-link="{{ $portfolio->link }}"
              data-shortDesc="{{ $portfolio->short_description }}"
              data-longDesc="{{ $portfolio->long_description }}"
              data-thumbnail="{{ $portfolio->thumbnail }}"
              data-id="{{ $portfolio->id }}"
              aria-hidden="true"></i>
            </div>
            <div class="admin-button delete-button">
              <i class="fa fa-times btn-sm btn-danger clickable" data-toggle="modal" data-target="#deletePortfolio" data-id="{{ $portfolio->id }}" aria-hidden="true"></i>
            </div>
            @endif

            <a href="{{ $portfolio->link }}" target="_blank">
            <div class="image-container">
              <img src="{{ $portfolio->thumbnail }}"  class="img-fluid greyscale">
            </div>

            <div class="portfolio-info-container" title="{{ $portfolio->long_description }}">
              <p>{{ $portfolio->name }}</p>
              <!-- <p><small>{{ $portfolio->short_descrition}}</small></p> -->
            </div>
            </a>
          </div>
        @endforeach
      </div>
      @if (!empty(session('username')))

        <div class="row">
          <div class="col-auto ml-auto clickable" data-toggle="modal" data-target="#addNewPortfolio">
            <i class="fa fa-plus-circle clickable" aria-hidden="true"></i>
            Add new element
          </div>
        </div>

      @endif

      <div class="section-title text-right">
        <code>&lt;/portfolio&gt;</code>
      </div>
    </div>
  </div>
</section>

<style>
.greyscale{
  -moz-filter: grayscale(0.5);
  -webkit-filter: grayscale(0.5);
  filter: grayscale(0.5);
  transition: all 0.5s;
}
.greyscale:hover{
  -moz-filter: grayscale(0);
  -webkit-filter: grayscale(0);
  filter: grayscale(0);
  transition: all 0.5s;
}
</style>
