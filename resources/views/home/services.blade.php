<section class="container-fluid" id="services">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="section-title text-left">
        <code>&lt;workflow&gt;</code>
      </div>
      <div class="row justify-content-center no-gutters" id="services-content">
        @foreach($services as $service)
          <div class="col-lg-4 col-xs-12 service-container">
            <div class="container">
              <div class="row service-title">
                <div class="col-lg-6 col-3 text-right">
                  <span class="fa-stack text-primary fa-2x">
                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                    {!! $service->icon !!}
                  </span>
                </div>
                <div class="col-lg-6 col-9 text-left align-self-center">
                  <h2>{{ $service->name }}</h2>
                </div>
              </div>

              <div class="row">
                <div class="col service-body">
                  <p class="text-justify">{!! $service->description !!}</p>
                </div>
              </div>



              @if (!empty(session('username')))
              <div class="row">
                <div class="col-auto">
                  <i class="fa fa-times btn-sm btn-danger clickable" data-toggle="modal" data-target="#deleteService" data-id="{{ $service->id }}" aria-hidden="true"></i>
                </div>
                <div class="col-auto ml-auto">
                  <i class="fa fa-pencil btn-sm btn-warning clickable"
                  data-toggle="modal"
                  data-target="#serviceModal"
                  data-name="{{ $service->name }}"
                  data-icon="{{ $service->icon }}"
                  data-description="{{ $service->description }}"
                  data-ordernumber="{{ $service->order_number }}"
                  data-id="{{ $service->id }}"
                  aria-hidden="true"></i>
                </div>
              </div>
              @endif

            </div>
          </div>
        @endforeach
      </div>
      @if (!empty(session('username')))

        <div class="row">
          <div class="col-auto ml-auto clickable" data-toggle="modal" data-target="#serviceModal" data-action="new">
            <i class="fa fa-plus-circle clickable" aria-hidden="true"></i> Add new element
          </div>
        </div>

      @endif

      <div class="section-title text-right">
        <code>&lt;/workflow&gt;</code>
      </div>
    </div>
  </div>
</section>
