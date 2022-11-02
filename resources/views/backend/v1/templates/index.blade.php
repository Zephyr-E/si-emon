<!DOCTYPE html>
<html lang="en">
{{-- css --}}
@include('backend.v1.templates.inc.head')

<body id="page-top">
  <div id="wrapper">
    {{-- sidebar --}}
    @include('backend.v1.templates.inc.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      {{-- navbar --}}
      @include('backend.v1.templates.inc.navbar')
      <div id="content">

        <div class="container-fluid conatiner" id="container-wrapper">
          {{-- isi content --}}
          @yield('content')
        </div>


      </div>
      {{-- footer --}}
      @include('backend.v1.templates.inc.footer')
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  {{-- script --}}
  @include('backend.v1.templates.inc.script')
</body>

</html>