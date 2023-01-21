<x-app-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Home</a></li>
  </x-breadcrumb>

  <div class="row justify-content-center py-2 mb-4">
    <div class="col-md-12 d-flex-center">
      <div class="alert alert-light" role="alert">
        <h2 class="alert-heading mb-3">Informasi</h2>
        <p>
          Silahakan pilih Tes yang diikuti dari daftar tes yang tersedia dibawah ini. Apabila tes tidak muncul, silahkan menghubungi Operator yang bertugas.
        </p>
      </div>
    </div>
  </div>

  <div class="card" style="padding: 20px;">
    <div class="table-responsive text-nowrap">
      <table id="table" class="table">
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
            <td>{{ $item->question_count }} Soal</td>
            <td>{{ $item->minutes }} Menit</td>
            <td>
              <a href="{{ url('teacher/task/'.$item->slug) }}">
                <button type="button" class="btn btn-primary">
                  <i class="fa-solid fa-pen-to-square"></i>
                  Kerjakan
                </button>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- <div class="py-8"> -->
  <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <div class="row justify-content-center py-2 mb-4">
          <div class="col-md-12 d-flex-center">
            
          </div>
        </div>

      </div>
    </div>
  </div> -->
  <!-- </div> -->

</x-app-layout>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({});
  });
</script>