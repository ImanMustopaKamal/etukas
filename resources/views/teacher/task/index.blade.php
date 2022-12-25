<x-teacher-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tes</li>
  </x-breadcrumb>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="row justify-content-between py-2 mb-4">
            <div class="col-md-8">
              <h2>Data Tes</h2>
            </div>
            <div class="col-md-4 text-end">
              <a href="{{ route('teacher.task_create') }}">
                <button type="button" class="btn btn-primary">
                  Tambah Data
                </button>
              </a>
            </div>
          </div>
          <!-- <table class="table table-hover mt-2" id="table" style="width:100%"> -->
          <table id="table" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah Soal</th>
                <th>Waktu</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($task as $idx => $item)
              <tr>
                <td>{{ $idx+1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->id }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-teacher-layout>
<script src="{{ asset('js/task.js') }}"></script>