<?php require 'get.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <title>Plants</title>
</head>
<body>
    <div class="container">
        <h1 class="h3 mb-2 text-gray-800">Botanical Data</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="examples" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Common Name</th>
                                <th>Scientific Name</th>
                                <th>Family Common Name</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 id="modalTitle"></h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h3 id="cmn">ok</h3>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

</body>

<script>
    $(document).ready(function() {
        $('#examples').DataTable( {
            "ajax": "data.json",
            "columns": [
                { "data": "common_name" },
                { "data": "scientific_name" },
                { "data": "family_common_name"},
                { "targets": 3,
                    "render": function(data, type , row){
                        return '<button id="myBtn" type="button" class="btn btn-primary" data-toggle="modal" data-id="'+row.id+'" data-common_name="'+row.common_name+'" data-image_url="'+row.image_url+'" data-scientific_name="'+row.scientific_name+'" data-genus="'+row.genus+'" data-family="'+row.family+'" data-family_common_name="'+row.family_common_name+'" data-target="#myModal">Show</button>'
                    }
                }
            ]
        } );
    } );

    $("#myModal").on('show.bs.modal', function (e) {
        var triggerLink = $(e.relatedTarget);
        var common_name = triggerLink.data("common_name");
        var scientific_name = triggerLink.data("scientific_name");
        var genus = triggerLink.data("genus");
        var family = triggerLink.data("family");
        var family_common_name = triggerLink.data("family_common_name");
        var image_url = triggerLink.data("image_url");
    
        $("#modalTitle").text(common_name);
        $(this).find(".modal-body").html("<img class='rounded mx-auto d-block' width='200' height='200' src='"+image_url+"'/>"+"<h6>Scientific Name: "+scientific_name+"</h6>"+"<h6>Family: "+family+"</h6>"+"<h6>Family Common Name: "+family_common_name+"</h6>"+"<h6>Genus: "+genus+"</h6>");
    });
</script>
</html>