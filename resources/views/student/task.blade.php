<x-student-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('student.task') }}">Home</a></li>
    <li class="breadcrumb-item active">Tes</li>
  </x-breadcrumb>

  <div class="card" style="padding: 20px;">
    <div class="row py-2 mb-4">
      <div class="col-xs-12 col-md-12">
        <div class="alert alert-secondary" role="alert" style="color: #000">
          <div class="row justify-content-between">
            <div class="col-6">
              <h3 style="text-align: left; margin-bottom: 0px;">Soal 1 / 30</h3>
            </div>
            <div class="col-6">
              <h4 style="text-align: right; margin-bottom: 0px;">Soal 1 / 30</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-2 mb-4">
      <div class="col-xs-12 col-md-6">

      </div>
      <div class="col-xs-12 col-md-6">
        <div class="grid-container">
          @for($x = 0; $x < $task->question_count; $x++)
            <div class="grid-item">
              <button type="button" class="btn btn-outline-dark question" id="question_{{ $x+1 }}" onclick="readQuestion('{{ $x+1 }}')">{{ $x+1 }}</button>
            </div>
            @endfor
        </div>
      </div>
    </div>
    <div class="row py-2 mb-4">

    </div>
  </div>
</x-student-layout>
<script>
  var start_at = "{{ $task->start_at }}";
  var end_at = "{{ $task->end_at }}";
</script>
<script src="{{ asset('js/student/task.js') }}"></script>