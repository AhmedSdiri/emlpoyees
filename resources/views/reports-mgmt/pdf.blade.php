 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      td, th {
        border: solid 2px;
        padding: 10px 5px;
      }
      tr {
        text-align: center;
      }
      .container {
        width: 100%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
        <div><h2>List of Devis from {{$searchingVals['from']}} to {{$searchingVals['to']}}</h2></div>
       <table id="example2" role="grid" table table-striped table-condensed>
            <thead>
              <tr role="row">
                <th>Id</th>
                <th>Tel</th>
                <th>Email</th>
                <th>vile de deces</th>
                <th>date de deces</th>
                <th>lieu de deces</th>
                <th>destination de defunt</th>
                <th>Ceremonie</th>
                <th>Option</th>
                <th>Obervation</th>
                <th>Etat</th>
                <th>Traitement</th>
                <th>starttime</th>
                <th>deadline</th>
                  
              </tr>
            </thead>
           
            <tbody>
            @foreach ($devis as $devi)
                <tr role="row" class="odd">
                  <td>{{ $devi['id'] }} </td>
                  <td>{{ $devi['tel'] }} </td>
                    <td>{{ $devi['email'] }} </td>
                    <td>{{ $devi['ville_de_deces'] }} </td>
                    <td>{{ $devi['date_de_deces'] }} </td>
                    <td>{{ $devi['lieu_de_deces'] }} </td>
                    <td>{{ $devi['destination_de_defunt'] }} </td>
                    <td>{{ $devi['ceremonie'] }} </td>
                    <td>{{ $devi['option'] }} </td>
                    <td>{{ $devi['observation'] }} </td>
                    <td>{{ $devi['etat'] }} </td>
                    <td>{{ $devi['traitement'] }} </td>
                    <td>{{ $devi['starttime'] }} </td>
                    <td>{{ $devi['deadline'] }} </td>
              </tr>
            @endforeach
           </tbody>
        </table>
    </div>
  </body>
</html>