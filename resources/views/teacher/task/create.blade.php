<x-teacher-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Tes</a></li>
    <li class="breadcrumb-item active">Tambah</li>
  </x-breadcrumb>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="row justify-content-between py-2 mb-4">
            <div class="col-md-8">
              <h2>Tambah Data</h2>
            </div>
            <div class="col-md-4 text-end">

            </div>
          </div>
          <div class="row justify-content-between py-2 mb-4">
            <form method="POST" action="{{ route('teacher.task_store') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label">Nama Tes</label>
                <input autofocus type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Tes">
              </div>
              <div class="mb-3">
                <div class="row">
                  <div class="col">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type='text' name="start_at" id="start_at" class="form-control" style="margin-bottom: 20px;" />
                    <!-- <div id="datetimepicker12"></div> -->
                  </div>
                  <div class="col">
                    <label class="form-label">Tanggal Berakhir</label>
                    <input type='text' name="end_at" id="end_at" class="form-control" style="margin-bottom: 20px;" />
                    <!-- <div id="datetimepicker12"></div> -->
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-teacher-layout>
<script src="{{ asset('js/task.js') }}"></script>