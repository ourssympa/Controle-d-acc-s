@extends('layout.app')
@section('css')
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
@endsection
@section('section')

<!-- Small boxes (Stat box) -->

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Liste des Personnes dans les locaux :</h2>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom et Prenoms</th>
                    <th>Mouvement</th>
                    <th>Date entré</th>
                    <th>Motif</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td>{{$data->nom}}</td>
                    <td>
                        {{$data->mouvement1}}
                    </td>
                    <td>

                        {{ date('d M Y H:i:s', strtotime($data->date_entre));}}
                    </td>
                    <td>
                        {{$data->motifs}}
                    </td>

                    <td>

                        <form action="{{route('mouvement.sortie',$data->id)}}" method="POST" >
                          @csrf
                            <input class="btn btn-danger" type="submit" value="Sortie">
                        </form>

                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>Nom et Prenoms</th>
                    <th>Mouvement</th>
                    <th>Date entré</th>
                    <th>Motif</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
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
