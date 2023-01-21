<x-student-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('student.task') }}">Home</a></li>
    <li class="breadcrumb-item active">Tes</li>
  </x-breadcrumb>

  <div class="row justify-content-center py-2 mb-4">
    <div class="col-md-12 d-flex-center">
      <div class="alert alert-info" role="alert">
        <h2 class="alert-heading mb-3">Informasi</h2>
        <p>
          Mohon untuk tidak meninggalkan halaman ini sebelum menyelesaikan semua soal
        </p>
      </div>
    </div>
  </div>

  <div class="card" style="padding: 20px;">
    <div class="row py-2 mb-4">
      <div class="col-xs-12 col-md-12">
        <div class="alert alert-secondary" role="alert" style="color: #000">
          <div class="row justify-content-between">
            <div class="col-6">
              <h3 style="text-align: left; margin-bottom: 0px;">Soal <span id="number">1</span> / {{ $task->question_count }}</h3>
            </div>
            <div class="col-6">
              <h4 style="text-align: right; margin-bottom: 0px;" id="counter"></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-2 mb-4">
      <div class="col-xs-12 col-md-6 mb-4">
        <input type="hidden" id="end_at" value="{{ $task->end_at }}" />
        <input type="hidden" id="task_id" value="{{ $task->id }}" />
        <input type="hidden" id="question_id" value="" />
        <div class="d-flex flex-column mb-3">
          <div class="p-2 pb-3">
            <h3 id="question" style="margin: 0;"></h3>
          </div>
          <div class="p-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="answer1">
              <label class="form-check-label" for="answer1" id="textanswer1"></label>
            </div>
          </div>
          <div class="p-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="answer2">
              <label class="form-check-label" for="answer2" id="textanswer2"></label>
            </div>
          </div>
          <div class="p-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="answer3">
              <label class="form-check-label" for="answer3" id="textanswer3"></label>
            </div>
          </div>
          <div class="p-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="answer4">
              <label class="form-check-label" for="answer4" id="textanswer4"></label>
            </div>
          </div>
          <div class="p-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="answer5">
              <label class="form-check-label" for="answer5" id="textanswer5"></label>
            </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="p-2">
            <button class="btn btn-success" onclick="submitAnswer()">Jawab</button>
          </div>
          <div class="p-2">
            <button class="btn btn-warning" onclick="notSure()">Ragu Ragu</button>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6 mb-4">
        <div class="grid-container">
          
        </div>
        <div class="d-flex flex-column mt-4">
          <div class="d-flex" style="padding: 10px; padding-left: 0px; gap: 10px;">
            <div style="width: 20px; height: 20px; border-radius: 0.375rem;" class="btn-success"></div>
            <p style="margin: unset">Sudah dijawab</p>
          </div>
          <div class="d-flex" style="padding: 10px; padding-left: 0px; gap: 10px;">
            <div style="width: 20px; height: 20px; border-radius: 0.375rem;" class="btn-warning"></div>
            <p style="margin: unset">Ragu ragu</p>
          </div>
          <div class="d-flex" style="padding: 10px; padding-left: 0px; gap: 10px;">
            <div style="width: 20px; height: 20px; border-radius: 0.375rem;" class="btn-secondary"></div>
            <p style="margin: unset">Belum dijawab</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-2 mb-4">
      <div class="col-12">
        <div class="d-flex justify-content-center">
          <div class="p-2">
            <button class="btn btn-danger" style="width: 200px;" onclick="stop()">HENTIKAN UJIAN</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-student-layout>
<script>
  const userTask = "{{ $task->userTask }}";
  const questionLength = "{{ $task->question_count }}";
  const urlAnswer = "{{ route('student.task_answer') }}";
  const urlQuestion = "{{ route('student.task_question') }}";
  const urlStart = "{{ route('student.task_start') }}";
  const urlData = "{{ url('student/task/data') }}";
</script>
<script src="{{ asset('js/student/task.js') }}"></script>