<section class="container-fluid" id="skills">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="section-title text-left">
        <code>&lt;skills&gt;</code>
      </div>

      <div class="row">

        @foreach($skills as $skill)

          <div class="col-6">
            <div class="row no-gutters">

              <div class="col-3 skill-name text-center">
                {{ $skill->name }}
              </div>
              <div class="col">
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->experience }}%"
                    aria-valuenow="{{ $skill->experience }}" aria-valuemin="0" aria-valuemax="100">{{ $skill->experience }}%</div>
                  </div>
                </div>


            @if (!empty(session('username')))


                <div class="col-auto align-self-end">
                  <i class="fa fa-pencil text-left btn-sm btn-warning clickable"
                  data-toggle="modal"
                  data-target="#skillModal"
                  data-name="{{ $skill->name }}"
                  data-experience="{{ $skill->experience }}"
                  data-thumbnail="{{ $skill->thumbnail }}"
                  data-ordernumber="{{ $skill->order_number }}"
                  data-title="Edit skill"
                  data-id="{{ $skill->id }}" aria-hidden="true"></i>
                </div>

                <div class="col-auto align-self-end">
                  <i class="fa fa-times text-right btn-sm btn-danger clickable" data-toggle="modal" data-target="#deleteSkill" data-id="{{ $skill->id }}" aria-hidden="true"></i>
                </div>

            @endif
            </div>
          </div>

        @endforeach

      </div>

      @if (!empty(session('username')))

        <div class="row">
          <div class="col-auto ml-auto clickable" data-toggle="modal" data-target="#skillModal" data-title="Add new skill" aria-hidden="true">
            <i class="fa fa-plus-circle"></i> Add new element
          </div>
        </div>

      @endif

      <div class="section-title text-right">
        <code>&lt;/skills&gt;</code>
      </div>
    </div>
  </div>
</section>
