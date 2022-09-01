@extends('layout.app')
@section('css')
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
@endsection
@section('section')
<div class="row">
    <div class="col-md-5">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center bg-info " style="height: 200px;">
                {{-- <img class="" src="{{asset(" /admin/dist/img/user4-128x128.jpg")}}" alt="User profile picture">
                --}}
                {{QrCode::size(200)->generate($qr);}}
            </div>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Nom :</b> <b class="float-right">{{$personne->nom}}</b>
                </li>
                <li class="list-group-item">
                    <b>Prenoms :</b> <b class="float-right">{{$personne->prenoms}}</b>
                </li>
                <li class="list-group-item">
                    <b>Type :</b> <b class="float-right">{{$personne->type}}</b>
                </li>
                <li class="list-group-item">
                    <b>Contact</b> <b class="float-right">{{$personne->contact}}</b>
                </li>
            </ul>

        </div>


        <!-- /.card-body -->
    </div>

      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="card-body box-profile">
        <div class="text-center bg-danger " style="height: 80px;">
            {{-- <img class="" src="{{asset(" /admin/dist/img/user4-128x128.jpg")}}" alt="User profile picture">
            --}}
        </div>
        <form  method="POST" action="{{route('mouvement.store')}}">
            @csrf
            <input type="text" name="personne_id" value="{{$personne->id}}" style="display:none">
            <div class="form-group">
                <label>Mouvement</label>
                <select name="mouvement1" class="form-control select2 select2-hidden-accessible"
                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" value="entre"> ENTRE </option>

                </select>
            </div>
            <div class="form-group">
                <label>Motifs</label>
                <textarea name="motifs" class="form-control" rows="3" placeholder="Motif"></textarea>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">ENREGISTREZ UN MOUVEMENT</button>
            </div>

        </form>

    </div>

    <!-- /.col -->
  </div>
  <div class="">
    <div class="card">
      <div class="card-header p-2">
        Mouvement
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">


          <!-- /.tab-pane -->
          <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>Mouvement 1</th>
                          <th>Date entré</th>
                          <th>Mouvement 2</th>
                          <th>Date sortie</th>
                          <th>Motif</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>

                      @foreach($mouvement as $data )
                      <tr>
                          <td>
                              {{$data->mouvement1}}
                          </td>
                          <td>

                              {{ date('d M Y H:i:s', strtotime($data->date_entre));}}
                          </td>
                          <td>
                              {{$data->mouvement2}}
                          </td>
                          <td>

                            @if($data->date_sortie==NULL)

                            @else
                            {{ date('d M Y H:i:s', strtotime($data->date_sortie));}}

                            @endif
                          </td>
                          <td>
                              {{$data->motifs}}
                          </td>

                          <td>
                              @if($data->status==1)

                              @else
                              <form action="{{route('mouvement.sortie',$data->id)}}" method="POST" >
                                @csrf
                                  <input class="btn btn-danger" type="submit" value="Sortie">
                              </form>
                              @endif

                          </td>
                      </tr>
                      @endforeach

                      </tbody>
                  <tfoot>
                      <tr>
                        <th>Mouvement 1</th>
                        <th>Date entré</th>
                        <th>Mouvement 2</th>
                        <th>Date sortie</th>
                        <th>Motif</th>
                        <th>Action</th>
                      </tr>
                  </tfoot>
              </table>
          </div>

        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection

@section('script')
<script src="{{asset("/admin/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("/admin/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("/admin/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("/admin/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("/admin/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection
