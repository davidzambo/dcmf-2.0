<section class="container-fluid " id="skills">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
      <div class="section-title text-right">
        <code>&lt;skillset&gt;</code>
      </div>

      <div class="row">

        @foreach($skills as $skill)

          <div class="col-3 card">
            <img src="{{ ($skill->thumbnail) }}" alt="{{ $skill->name }}_logo" class="card-img-top">
            <!-- <div class="card-body">
              <div class="progress align-self-end">
                <div class="progress-bar-striped bg-info" role="progressbar" style="width: {{ $skill->experience }}%" aria-valuenow="{{ $skill->experience }}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="card-title text-center">{{ $skill->name }}</h4>
            </div> -->

            @if (!empty(session('username')))

              <div class="row">
                <div class="col-auto">
                  <i class="fa fa-pencil text-left btn-sm btn-warning clickable"
                  data-toggle="modal"
                  data-target="#editSkill"
                  data-name="{{ $skill->name }}"
                  data-experience="{{ $skill->experience }}"
                  data-thumbnail="{{ $skill->thumbnail }}"
                  data-order="{{ $skill->order_number }}"
                  data-id="{{ $skill->id }}" aria-hidden="true"></i>
                </div>

                <div class="col-auto ml-auto">
                  <i class="fa fa-times text-right btn-sm btn-danger clickable" data-toggle="modal" data-target="#deleteSkill" data-id="{{ $skill->id }}" aria-hidden="true"></i>
                </div>
              </div>

            @endif

          </div>

        @endforeach

      </div>

      @if (!empty(session('username')))

        <div class="row">
          <div class="col-1 ml-auto">
            <i class="fa fa-plus-circle clickable" data-toggle="modal" data-target="#addNewSkill" aria-hidden="true" onClick="emptySkillForm()"></i>
          </div>
        </div>

      @endif

      <div class="section-title text-right">
        <code>&lt;/skillset&gt;</code>
      </div>
    </div>
  </div>
</section>
