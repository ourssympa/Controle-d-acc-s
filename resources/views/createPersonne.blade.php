@extends('layout.app')

@section('section')
<div class="d-flex justify-content-center ">
<div class="card card-info w-75 shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h3 class="card-title">Enregistrement</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('personne.store')}}">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="nom">Nom :</label>
          <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
        </div>
        <div class="form-group">
          <label for="prenoms">Prenoms :</label>
          <input name="prenoms" type="text" class="form-control" id="prenoms" placeholder="Prénoms">
        </div>
        <div class="form-group">
          <label for="contact">Contact :</label>
          <input name="contact" type="text" class="form-control" id="contact" placeholder="Contact">
        </div>
        <div class="form-group">
            <label for="type">Type :</label>
            <select id="type" name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                <option selected="selected" value="etudiant" >Etudiant</option>
                <option value="gardien">Gardien</option>
                <option value="visiteur">Visiteur</option>
                <option value="enseignant">Enseignant</option>
              </select>
          </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Enregistrement</button>
      </div>
    </form>
  </div>
</div>
@endsection
