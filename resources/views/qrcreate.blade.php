@extends('layout.app')

@section('section')
<div class="row" style="height:500px;">
<section >
    <div class="row">



        <div class="col">
            <video id="preview"></video>
            <script type="text/javascript">
              let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
              scanner.addListener('scan', function (content) {
                console.log(content);
              });
              Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                  scanner.start(cameras[0]);
                } else {
                  console.error('No cameras found.');

                }
              }).catch(function (e) {
                console.error(e);
              });

              scanner.addListener('scan',function(c){
                //document.getElementById('data').value-c;
                var id= document.getElementById('data');
                var btn= document.getElementById('btn');
                var form= document.getElementById('form');
                id.value=c;
                form.submit();
             
              });
            </script>

        </div>
      </div>
      <div class="col">
        <form action="{{route('qr.mouvement')}}" method="POST" id="form">
            @csrf
            <input type="text" id="data" name="data" class="form-control" hidden>
            <button class="btn btn-lg btn-primary" id="btn" style="display: none">Mouvement</button>
        </form>
    </div>




</section>
</div>
@endsection
