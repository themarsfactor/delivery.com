<?php
    require_once("core/user/data.core.php");
    require "includes/head.inc.php";

   $user_entries = getUserEntries();

 ?>


<body>
	<?php  require "includes/navbar.inc.php"; ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto">
                   <?php include "includes/greetings.inc.php"; ?>

                   <?php 

                        if(count($user_entries) == 0){
                           echo "<div class='alert alert-info border-0'>
                            No entry has been added. <a href='add-entry.php'><strong>Create your first entry</strong></a>
                        </div>";
                        }else{

                            echo "<table class='table table-hover table-responsive table-dark'>
                                    <thead>
                                        <th>#</th>
                                        <th>Site name</th>
                                        <th>Entry date</th>
                                        <th>Site address</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                    ";
                            foreach($user_entries as $user_entry){

                                    echo "<tr>
                                                <td>{$user_entry['id']}</td>
                                                <td>{$user_entry['site_name']}</td>
                                                <td>{$user_entry['entry_date']}</td>
                                                <td>{$user_entry['site_address']}</td>
                                                <td id='{$user_entry['id']}_permission'><a href='' class='btn btn-sm btn-info'>View</a> <a href='#' onclick='firePermissionModal({$user_entry['id']})' class='btn btn-sm btn-warning text-white' type ='button' id = 'edit_name'>Send Permission to Edit</a></td>

                                        </tr>";


                            }

                            echo "</tbody></table>";



                        }

                   ?>
            		
            		
            
            </div>

        </div>


        <div id="modals-loader"></div>

    </div>



<?php require "includes/footer-scripts.inc.php"; ?>


<script>
    
          
        function firePermissionModal(entry_id){
         

            $.get({
                url: "process/loaders/get_entry_info.php", 
                data: { entry_id: entry_id },
                success: function(feedback){

                            
                
                    feedback = JSON.parse(feedback);

                    console.log('Entry info: ',feedback);

                    if(feedback.data.is_edit_permitted == null || feedback.data.is_edit_permitted == undefined ){

                          if(feedback.code == "success"){
                          let modalCode = `<div class="modal" tabindex="-1" id='permissionModal' data-backdrop='false'>
                              <div class="modal-dialog">
                                <div class="modal-content bg-dark text-white">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Permission Required!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>You need administrator's permission to edit the entry with Site name: <mark><strong>${feedback.data['site_name']}</strong></mark></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close this</button>
                                    <button type="button" class="btn btn-primary" onclick='sendPermissionRequest(${entry_id})'>Send Permission Request</button>
                                  </div>
                                </div>
                              </div>
                            </div>`;

                            $("#modals-loader").html(modalCode);

                            $("#permissionModal").modal("show");

                    }

                    }

                    else if(feedback.data.is_edit_permitted == "1"){
                        location.href = `edit_entry.php?id=${feedback.data.entry_id}`;
                    }else{
                           if(feedback.code == "success"){
                          let modalCode = `<div class="modal" tabindex="-1" id='permissionModal' data-backdrop='false'>
                              <div class="modal-dialog">
                                <div class="modal-content bg-dark text-white">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Permission Required!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>You need administrator's permission to edit the entry with Site name: <mark><strong>${feedback.data['site_name']}</strong></mark></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close this</button>
                                    <button type="button" class="btn btn-primary" onclick='sendPermissionRequest(${entry_id})'>Send Permission Request</button>
                                  </div>
                                </div>
                              </div>
                            </div>`;

                            $("#modals-loader").html(modalCode);

                            $("#permissionModal").modal("show");

                    }


                    }

                  





                }

            })



          



        }



function sendPermissionRequest(entry_id){

    const user_id = "<?php echo $current_user_id; ?>";

    
    $.post({
        url:"process/loaders/send-edit-permission.php",
        data: { entry_id: entry_id, user_id: user_id },
        success: function(feedback){

            feedback = JSON.parse(feedback);

            if(feedback.code == "duplicate"){

                toastr.warning(feedback.message);
            }

            if(feedback.code == 'success'){

                toastr.success(feedback.message);

            }


            $("#permissionModal").modal("hide");


        }


    })



}


</script>
</body>

</html>