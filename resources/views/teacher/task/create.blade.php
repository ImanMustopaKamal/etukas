<x-teacher-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Tes</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </x-breadcrumb>

  <div class="card" style="padding: 20px;">
    <div class="row justify-content-between py-2 mb-4">
      <div class="col-md-8">
        <h2>Tambah Data</h2>
      </div>
      <div class="col-md-4 text-end">

      </div>
    </div>
    <div class="row justify-content-between py-2 mb-4">
      <div class="mb-3">
        <label class="form-label">Nama Tes</label>
        <input autofocus type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Tes">
      </div>
      <div class="mb-3">
        <label class="form-label">Jumlah Soal</label>
        <input autofocus type="number" class="form-control" id="question_count" name="question_count" placeholder="Masukkan Jumlah Soal" value="0">
      </div>
      <div class="mb-3">
        <div class="row">
          <div class="col">
            <label class="form-label">Tanggal Mulai</label>
            <input type='text' name="start_at" id="start_at" class="form-control" style="margin-bottom: 20px;" placeholder="Masukkan Tanggal Mulai" />
          </div>
          <div class="col">
            <label class="form-label">Tanggal Berakhir</label>
            <input type='text' name="end_at" id="end_at" class="form-control" style="margin-bottom: 20px;" placeholder="Masukkan Tanggal Berakhir" />
          </div>
        </div>
      </div>

      <div class="mb-3">
        <button type="button" class="btn btn-primary" id="store">Submit</button>
      </div>
    </div>
  </div>
</x-teacher-layout>
<script>
  const url = "{{ route('teacher.task') }}";
  const urlStore = "{{ route('teacher.task_store') }}";
</script>
<script src="{{ asset('js/task/create.js') }}"></script>