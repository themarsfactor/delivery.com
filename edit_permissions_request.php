<?php
     require_once("core/admin/data.core.php");
 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Delivery | Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="thirdparties/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Delivery</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">View Users</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="edit_permissions_request.php">View Permisssion Requests</a>
      </li>
    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button onclick="location.href='logout.php'" class="btn btn-sm btn-outline-danger my-2 my-sm-0" type="button">Sign Out</button>
    </form>
  </div>
</nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto">
                     <!-- <img class="mb-4" src="/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                    <h1 class="h3 mb-3 font-weight-normal">Welcome <?="{$fullname}"?></h1>


                    <hr>

                    <?php
                        $permissions_requests = getPermissionsRequestsByAdmin();

                        if(count($permissions_requests)  == 0){

                            echo "<div class='alert alert-info border-0'>No request at this time</div>";

                        }else{
                             echo "<table class='table table-hover'>
                                <thead>
                                    <th>Entry Author</th>
                                    <th>Site name</th>
                                    <th>Date Created</th>
                                    <th></th>
                                </thead>
                                <tbody>";
                        foreach($permissions_requests as $request){

                            // echo "<pre>";
                            // print_r($request);

                            echo "<tr>
                                    <td>{$request['firstname']} {$request['lastname']}</td>
                                    <td>{$request['site_name']}</td>
                                    <td>{$request['entry_date']}</td>
                                    <td><a href='#' onclick='grantUpdatePermission({$request['entry_id']}, {$request['user_id']})'>Grant Update Permission</a></td>


                                </tr>";



                        }

                        echo "</tbody>
                            </table>";
                            
                        }

                       
                                             ?>

            
            
            </div>

        </div>

        <div id="modals-loader"></div>
    </div>



<script type="text/javascript" src="thirdparties/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="thirdparties/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    function grantUpdatePermission(entry_id, user_id){

        //power up the modal ;

        let modalCode = `<div class="modal" tabindex="-1" id="grantPermissionModal" data-backdrop='false'>
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Grant Permission to this Entry?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>You are about to grant permission to entry with an id of ${entry_id}.</p>
                            <p>The entry author will be able make changes...</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="confirmGrantPermission(${entry_id})">Grant Permission</button>
                          </div>
                        </div>
                      </div>
                    </div>`;


        $("#modals-loader").html(modalCode);

        $("#grantPermissionModal").modal("show");

    }


    function confirmGrantPermission(entry_id){

        $.post({
            url: "process/loaders/confirm_grant_permissions.php",
            data: {entry_id: entry_id}, 
            success: function(feedback){

                feedback = JSON.parse(feedback);

                if(feedback.code ==  'success'){

                    toastr.success(feedback.message);
                }else{

                    toastr.error(feedback.message);
                }

                //remve the modal
                $("#grantPermissionModal").modal("hide");

                location.reload();



            }

        })


    }


</script>
</body>

</html>