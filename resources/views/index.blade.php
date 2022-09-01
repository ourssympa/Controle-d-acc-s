@extends('layout.app')
@section('css')
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
@endsection
@section('section')

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-4 col-7">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$nbractive}}</h3>

                <p>Dans les locaux actuellement</p>
            </div>
           </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-7">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$nbruser}}</h3>

                <p>Utilisateurs au total</p>
            </div>
           </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-7">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$nbrmvm}}</h3>

                <p> Mouvement aujourdhui</p>
            </div>
            </div>
    </div>
    <!-- ./col -->
    {{-- <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> --}}
    <!-- ./col -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Gestion des Personnes</h3>
        <div class="d-flex justify-content-end ">
            <a class="btn btn-success " href="{{route('personne.create')}}"><i class="fas fa-plus"></i>Ajouter
                Personne</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom et Prenoms</th>
                    <th>Types de Personne</th>
                    <th>Contatc</th>
                    <th>Info</th>
                    <th>Modifier et Suprimmer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $data)
                <tr>
                    <td>{{$data->nom ." ".$data->prenoms}}</td>
                    <td>
                        {{$data->type}}
                    </td>
                    <td>
                        {{$data->contact}}
                    </td>
                    <td>

                        <a class="btn btn-primary btn-sm" href="{{route('personne.show',$data->id)}}">
                            <i class="fa fa-eye"></i>
                            View
                        </a>
                    </td>

                    <td class="project-actions text-right">

                        <a class="btn btn-info btn-sm" href="{{route('personne.edit',$data->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{route('personne.warning',$data->id)}}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>Nom et Prenoms</th>
                    <th>Types de Personne</th>
                    <th>Contatc</th>
                    <th>Info</th>
                    <th>Modifier et Suprimmer</th>
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
