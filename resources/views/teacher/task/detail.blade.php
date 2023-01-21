<x-teacher-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Tes</a></li>
    <li class="breadcrumb-item active">Detail</li>
  </x-breadcrumb>

  <div class="card" style="padding: 20px;">
    <div class="row justify-content-between py-2 mb-4">
      <div class="col-md-8">
        <h2>Detail Data</h2>
      </div>
      <div class="col-md-4 text-end">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Import&nbsp;
          <i class="fa-solid fa-file-excel"></i>
        </button>
        <a href="{{ asset('asset/question.xlsx') }}">
          <button class="btn btn-primary">
            Format&nbsp;
            <i class="fa-solid fa-download"></i>
          </button>
        </a>
      </div>
    </div>
    <div class="row py-2 mb-4">
      <div class="col-xs-12 col-md-6">
        <div class="mb-3">
          <label class="form-label">Nomor</label>
          <input autofocus type="hidden" class="form-control" id="task_id" name="task_id" placeholder="Masukkan Nama Tes" value="{{ $task->id }}">
          <input autofocus type="text" readonly class="form-control" id="nomor" name="nomor" placeholder="Masukkan Nama Tes" value="1">
        </div>
        <div class="mb-3">
          <label class="form-label">Pertanyaan</label>
          <textarea class="form-control" id="question" name="question" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Jawaban</label>
          <div class="input-group mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" name="answer" id="answer1" value="a">
            </div>
            <span class="input-group-text">A</span>
            <textarea class="form-control" name="answer-text1" id="answer-text1" aria-label="With textarea"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" name="answer" id="answer2" value="b">
            </div>
            <span class="input-group-text">B</span>
            <textarea class="form-control" name="answer-text2" id="answer-text2" aria-label="With textarea"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" name="answer" id="answer3" value="c">
            </div>
            <span class="input-group-text">C</span>
            <textarea class="form-control" name="answer-text3" id="answer-text3" aria-label="With textarea"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" name="answer" id="answer4" value="d">
            </div>
            <span class="input-group-text">D</span>
            <textarea class="form-control" name="answer-text4" id="answer-text4" aria-label="With textarea"></textarea>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-text">
              <input class="form-check-input mt-0" type="radio" name="answer" id="answer5" value="e">
            </div>
            <span class="input-group-text">E</span>
            <textarea class="form-control" name="answer-text5" id="answer-text5" aria-label="With textarea"></textarea>
          </div>
        </div>
        <div class="mb-3">
          <button type="button" class="btn btn-primary" id="store_question">Submit</button>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="grid-container">
          @for($x = 0; $x < $task->question_count; $x++)
            <div class="grid-item">
              <button type="button" class="btn btn-outline-success question" id="question_{{ $x+1 }}" onclick="readQuestion('{{ $x+1 }}')">{{ $x+1 }}</button>
            </div>
            @endfor
        </div>
      </div>
    </div>
  </div>

  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Soal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-info" role="alert">
            import file excel dengan mengikuti format, dan pastikan jumlah soal sesuai
          </div>
          <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input accept=".xls,.xlsx" class="form-control form-control-sm" id="file" name="file" type="file">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="import-store">Submit</button>
        </div>
      </div>
    </div>
  </div>
</x-teacher-layout>
<script>
  const url = "{{ route('teacher.task') }}";
  const urlQuestion = "{{ url('teacher/task/question/get') }}";
  const urlQuestionStore = "{{ route('teacher.task_question_store') }}";
  const urlImport = "{{ route('teacher.import_store') }}";
</script>
<script src="{{ asset('js/task.js') }}"></script>