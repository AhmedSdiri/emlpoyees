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
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="2%">Id</th>
                <th width="5%">Tel</th>
                <th width="10%">Email</th>
                <th width="5%">vile de deces</th>
                <th width="5%">date de deces</th>
                <th width="5%">lieu de deces</th>
                <th width="5%">destination de defunt</th>
                <th width="10%">Ceremonie</th>
                <th width="10%">Option</th>
                <th width="10%">Obervation</th>
                <th width="2%">Etat</th>
                <th width="2%">Traitement</th>
                <th width="5%">starttime</th>
                <th width="5%">deadline</th>
                  
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