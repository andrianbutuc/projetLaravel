@extends('canvas')
@section('title','Gestion des commits')
@section('content')
   <h2>Tous les dépôts</h2>
   <table style="width:100%">
  <tr>
    <th>Nom du dépôt</th>
    <th>Nom de l'utilisateur</th>
    <th>Nom de commits</th>
  </tr>
  @foreach($repositories as $rep)
    <tr>
        <td > <a class="link" id ="{{$rep->id}}">{{$rep->name}}</a> </td>
        <td> {{$rep->cname}} </td>
        <td> {{$rep->nbcomit}} </td>
    </tr>
    @endforeach
</table>
<div class="details">

</div>
<script>
    $(document).ready(function(){
        $(".link").click(function(event){
            $(".details").empty();
            let elmId = event.target.id;
            $.get("/api/repositories/"+elmId, function(data, status){
                let detail =JSON.parse(data);
                let hDepot = $("<h2></h2>").text("Nom du dépôt");
                let nomDepot = $("<p></p>").text(detail[0].name);

                let hUser = $("<h2></h2>").text("Nom de l'utilisateur");
                let nomUser = $("<p></p>").text(detail[0].cname);

                let hComits = $("<h2></h2>").text("Liste de commits");
                $(".details").append(hDepot,nomDepot,hUser,nomUser,hComits);
                let list = $("<ul></ul>");
                $(".details").append(list);
                for (let comit of detail[0].comits ) {
                    let elem = $("<li></li>").text("[" + comit.date +"]" + comit.message );
                    $(list).append(elem);
                }
            });
        });
    });
</script>
@endsection