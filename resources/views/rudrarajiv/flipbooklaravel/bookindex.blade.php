<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col items-center justify-center sm:flex-row  sm:justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
        {{ __('Data User') }}
      </h2>
      <a href="{{ route('users.create') }}"
        class="mt-2 sm:mt-0 text-sm bg-blue-600 px-3 py-2 rounded shadow border-none text-white">Tambah
        Data</a>
    </div>
  </x-slot>


  <div class="py-6 w-full">
    <section class="max-w-7xl mx-auto">

      <x-auth-session-status class="mb-4" :status="session('status')" />

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg p-3">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg" id="datatables-data">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <x-th-table>Name</x-th-table>
                <x-th-table>Email</x-th-table>
                <x-th-table>Level</x-th-table>
                <x-th-table>Aksi</x-th-table>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <x-td-table>{{ ucwords($user->name) }}</x-td-table>
                <x-td-table>{{ ucwords($user->email) }}</x-td-table>
                <x-td-table>{{ ucwords($user->level) }}</x-td-table>
                <td class="block sm:flex gap-2">
                  <x-btn-edit href="{{ route('users.edit', $user->id) }}" />
                  <x-btn-delete class="mt-2 sm:mt-0" method="POST" action="{{ route('users.destroy', $user->id) }}" />
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

  <x-slot name="script">
    <script>
      $(document).ready(function() {
              $('#datatables-data').DataTable();
          });
    </script>
  </x-slot>
</x-app-layout>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Show Book</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container">
    <div class="starter-template">
      <h1>View All Books</h1>
      <p class="lead">Here you will find list of all Flip Books.</p>
    </div>
    <div class="row">
      @foreach($flipbooks as $fb)
      <div class="col-md-2">

        <a href="{{ route('flipbook.show',$fb->id) }}" style="float: left;clear: both;">

          <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="{{ asset(explode("
            ,",$fb->content)[0]) }}" data-holder-rendered="true">
          {{ $fb->name }} , {{ $fb->desc }}



        </a>

        <a href="{{ route('flipbook.edit',$fb->id) }}" style="float: left;clear: both;width:100%;margin-top: 10px;">
          <button id="add_files" class="btn btn-medium btn-general input-block-level" type="submit"
            style="width:100%;">Edit</button></a>

      </div>
      @endforeach
    </div>
  </div>


  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script>
    window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')
  </script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
</body>

</html>