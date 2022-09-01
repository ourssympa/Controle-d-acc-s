@extends('layout.app')

@section('section')
<div class="d-flex justify-content-center ">
<div class="card card-info w-75 shadow p-3 mb-5 bg-body rounded">
    <div class="card-header">
      <h3 class="card-title">Enregistrement</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="{{route('personne.update',$user->id)}}">
        @csrf
        @method('put')
      <div class="card-body">
        <div class="form-group">
          <label for="nom">Nom :</label>
          <input value="{{$user->nom}}" name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
        </div>
        <div class="form-group">
          <label for="prenoms">Prenoms :</label>
          <input  value="{{$user->prenoms}}" name="prenoms" type="text" class="form-control" id="prenoms" placeholder="Prénoms">
        </div>
        <div class="form-group">
          <label for="contact">Contact :</label>
          <input  value="{{$user->contact}}" name="contact" type="text" class="form-control" id="contact" placeholder="Contact">
        </div>
        <div class="form-group">
            <label for="type">Type :</label>
            <select id="type" name="type" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                @if($user->type=="etudiant")
                <option selected="selected" value="etudiant" >Etudiant</option>
                <option value="gardien">Gardien</option>
                <option value="visiteur">Visiteur</option>
                <option value="enseignant">Enseignant</option>
                @endif

               @if($user->type=="visiteur")
               <option  value="etudiant" >Etudiant</option>
               <option value="gardien">Gardien</option>
               <option selected="selected" value="visiteur">Visiteur</option>
               <option value="enseignant">Enseignant</option>
               @endif
               @if($user->type=="gardien")
               <option  value="etudiant" >Etudiant</option>
               <option  selected="selected" value="gardien">Gardien</option>
               <option value="visiteur">Visiteur</option>
               <option value="enseignant">Enseignant</option>
               @endif
               @if($user->type=="enseignant")
               <option  value="etudiant" >Etudiant</option>
               <option value="gardien">Gardien</option>
               <option  value="visiteur">Visiteur</option>
               <option  selected="selected" value="enseignant">Enseignant</option>
               @endif
              </select>
          </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
    </form>
  </div>
</div>
@endsection
