<?php require_once("core/user/data.core.php");  require "includes/head.inc.php";?> 

<body>
    <style type="text/css">
        #step2{
            display:  none;
        }
    </style>

    <?php  require "includes/navbar.inc.php"; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto">
                <?php require "includes/greetings.inc.php"; ?>
                <h4 class="h3 mb-3" id="create-new-entry-page">Create New Entry</h4>
                <div id="errors-info"></div>

                <h4 id="steps-level">Step 1 / 2</h4>  
                <hr>

                <?php require "process/forms.process.php"; ?>
                <form action="" method="post" role="form" class="php-email-form" id="create-entry-form">
                            <div class="casing" id='step1'>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Report filled by</label>
                                        <input type="text" class="form-control" name="report_author" value='<?= "{$firstname}, {$lastname}" ?>' readonly>
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <label for="name">Site Name</label>
                                        <input type="text" class="form-control" name="site_name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Date</label>
                                        <input type="date" class="form-control" name="entry_date" id="date">
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Site ID</label>
                                        <input type="text" class="form-control" name="site_id">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Site Address</label>
                                        <textarea class="form-control" name="site_address" rows="2  "></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">COORDINATES</label>
                                        <input type="text" class="form-control" name="coordinates" id="coordinates">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Site Description</label>
                                        <textarea class="form-control" name="site_description" rows="2"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">(Residential, Industrial, Proximity to Hospital or School )</label>
                                        <input type="text" class="form-control" name="hospital_proximity">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Date OF CONSTRUCTION</label>
                                        <input type="date" class="form-control" name="construction_date" id="construction_date">
                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Altitude</label>
                                        <input type="text" class="form-control" name="altitude">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Tower Type</label>
                                        <input type="text" class="form-control" name="tower_type">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Tenants</label>
                                        <input type="text" class="form-control" name="tenants">
                                    </div>
                                </div>

                                </div>
                            </div>

                            
                    </div>



                    <div class="casing" id="step2">

                        <div class="section-title">
                                <h2 class="text-center">Waste Management/Housekeeping</h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Determine the degree of compliance with environmental regulations, administrative and legal frameworks</label>
                                        <input type="text" class="form-control" name="compliance_degree">
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Submit report on Site Metrics</label>
                                        <input type="text" class="form-control" name="site_metrics">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Batteries</label>
                                        <input type="text" class="form-control" name="batteries" id="batteries">
                                        
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Filters</label>
                                        <input type="text" class="form-control" name="filters">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Spent oil</label>
                                        <input type="text" class="form-control" name="spent-oil">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Other waste streams.</label>
                                        <input type="text" class="form-control" name="other-waste-streams" id="other-waste-streams.">
                                    </div>
                                    <div class="form-group  col-md-10 col-md-10-offset-2 m-auto">
                                        <label for="name">Ascertain sanitation appears adequate, waste oil, sludge & oil spillage visible, check if Site is free of rubbish, fuel filter and Rubbish collected for disposal, surrounding area free of rubbish</label>
                                        <input type="text" class="form-control" name="ascertain_sanitation">
                                    </div>
                                </div>
                            </div>
                            <div class="section-title">
                                <h2 class="text-center">Emission Monitoring (Air Quality Management)</h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">CO ppm or mg/m3</label>
                                        <input type="text" name="co_ppm" class="form-control" id="co_ppm">
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">CO2 %</label>
                                        <input type="text" class="form-control" name="co2" id="co2%">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">NO ppm or mg/m3</label>
                                        <input type="text" class="form-control" name="no_ppm" id="noppmmg/m3">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">NO2 ppm or mg/m3</label>
                                        <input type="text" class="form-control" name="no2" id="no2ppmmg">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name"> SO2 ppm or mg/m3</label>
                                        <input type="text" class="form-control" name="so2" id="so2ppmmg/m3">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Suspended Particulate Matter (SPM) µg/m3</label>
                                        <input type="text" class="form-control" name="suspended_particulate" id="suspended_particulate">
                                    </div>
                                </div>
                            </div>
                            <div class="section-title">
                                <h2 class="text-center">Noise monitoring</h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">To carry out noise level measurement as it relates to land use (residential, commercial, industrial, hospital). Carry out noise mapping according to land use.</label>
                                        <input type="text" name="noise_level_measurement" class="form-control" id="noise_level_measurement">
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Noise level (1m, 10m,15m) in dB(A).</label>
                                        <input type="text" class="form-control" name="noise_level" id="noise_level">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Carry out full survey if >55dB(A)</label>
                                        <input type="text" class="form-control" name="carry_out_full_survey" id="carry_out_full_survey">
                                    </div>
                                </div>
                            </div>
                            <div class="section-title">
                                <h2 class="text-center">Occupational Health and Safety </h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Check the compliance of vibration containment measures, check dampers, spill management technique.</label>
                                        <input type="text" name="check_compliance" class="form-control" id="check_compliance">
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Check functionality of Aviation Warning Lights, Security Lights </label>
                                        <input type="text" class="form-control" name="check_functionality" id="check_functionality">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Signage</label>
                                        <input type="text" class="form-control" name="signage" id="signage">
                                    </div>
                                </div>
                            </div>

                            <div class="section-title">
                                <h2 class="text-center">Physio-chemical and physical Environment (Soil, underground water testing)</h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">To carry out analysis and testing of soil and underground water quality to determine degree of compliance.</label>
                                        <input type="text" name="carry_out_analyst" class="form-control" id="carry_out_analyst">
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Check if Surface/ground water is impacted, adequacy of Drainage, </label>
                                        <input type="text" class="form-control" name="check_surface" id="check_surface">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="CiSeofs">Check if Soil erosion originating from site</label>
                                        <input type="text" class="form-control" name="ciseofs" id="ciseofs">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name">Check if Surface granite/soil staining</label>
                                        <input type="text" class="form-control" name="check_if_surface_granite" id="check_if_surface_granite">
                                    </div>
                                    <div class="form-group col-md-6 mt-3">
                                        <label for="name"> Stagnant water on site</label>
                                        <input type="text" class="form-control" name="stagnant_water_on_site" id="stagnant_water_on_site">
                                    </div>
                                </div>
                            </div>
                            <div class="section-title">
                                <h2 class="text-center">EMF/Radiation Levels</h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Radiation Levels at 2m within the site and at 10m outside perimeter fence</label>
                                        <input type="text" name="radiation_level" class="form-control" id="radiation_level">
                                    </div>
                                    <div class="form-group col-md-6 mt-3 mt-md-0">
                                        <label for="name">Check compliance to ICNIRP Limit µW/Cm2 for Mhz</label>
                                        <input type="text" class="form-control" name="ICNIRP" id="ICNIRP">
                                    </div>
                                </div>
                            </div>
                            <div class="section-title">
                                <h2 class="text-center">Setback</h2>
                            </div>
                            <div class="casing">
                                <div class="row">
                                    <div class="form-group col-md-10 col-md-10-offset-2 m-auto">
                                        <label for="name">Consultants in collaboration with IHS HSE Team, Roll out and FSE.</label>
                                        <input type="text" name="hse_collaboration" class="form-control" id="hse_collaboration">
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="section-title">
                                <h2 class="text-center">ENVIRONMENTAL PERFORMANCE</h2>
                            </div>
                        -->
                    



                    </div>



                    <div class="form-group" style='margin-left: 100px; margin-top: 50px;'>

                    <div id="prevButton"> </div>
                    
                    <div id="nextButton mt-2">
                        <button type='button' id="next-phase" class="btn btn-md btn-primary mt-2">Next</button>
                    </div>

                        </div>

                    </form>
            </div>
        </div>


    </div>


<?php
        require "includes/footer-scripts.inc.php"
 ?>

 <script>
       
       window.onload = function(){
            //check the localstorage for entry progress..
           let entryFormProgress =  localStorage.getItem("entry-form-progress");

            if(entryFormProgress == null || entryFormProgress == undefined){
                //no entry progress..
                //start from the beginning
                formProgress("step1");
            }else{
                //check the step currently 
                entryFormProgress = JSON.parse(entryFormProgress);

                if(entryFormProgress.step == "1"){
                    formProgress("step1");
                }

                if(entryFormProgress.step == "2"){
                    formProgress("step2");
                }


            }

       }



         document.querySelector("#next-phase").addEventListener("click", function(){

                document.querySelector("#step1").style.display = "none";

                document.querySelector("#step2").style.display = "block";

                document.querySelector("#steps-level").innerText = "Step 2 / 2";

                document.querySelector("#prevButton").innerHTML = "<button class='btn btn-md btn-warning' id='prev-button'>Previous</button>";

            
                 document.querySelector("#next-phase").innerText = "Submit Entry";

                 document.querySelector("#next-phase").setAttribute("onclick", "createEntry()");

                saveFormProgress("step2");



        document.querySelector("#prev-button").addEventListener("click", function(){


                document.querySelector("#step1").style.display = "block";
                document.querySelector("#step2").style.display = "none";

                document.querySelector("#steps-level").innerText = "Step 1 / 2";

                 document.querySelector("#prevButton").innerHTML = "";

                  document.querySelector("#next-phase").type = "button";
                  document.querySelector("#next-phase").innerText = "Next";

                  document.querySelector("#next-phase").removeAttribute("onclick");

                  saveFormProgress("step1");


        })


        });







        //Functions

        function resetFormProgress(){

            localStorage.removeItem("entry-form-progress");
            formProgress("step1");

            document.querySelector("#next-phase").innerText = "Next";




        }

       function formProgress(formStep){


            if(formStep == "step1"){
                    document.querySelector("#step1").style.display = "block";
                    document.querySelector("#step2").style.display = "none";

                     document.querySelector("#steps-level").innerText = "Step 1 / 2";

                 document.querySelector("#prevButton").innerHTML = "";

                  document.querySelector("#next-phase").type = "button";

                  document.querySelector("#next-phase").removeAttribute("onclick");


            }

            if(formStep == "step2"){        

                    document.querySelector("#step2").style.display = "block";
                    document.querySelector("#step1").style.display = "none";

                document.querySelector("#steps-level").innerText = "Step 2 / 2";

                document.querySelector("#prevButton").innerHTML = "<button class='btn btn-md btn-warning' id='prev-button'>Previous</button>";


                document.querySelector("#next-phase").innerText = "Submit Entry";

                document.querySelector("#next-phase").setAttribute("onclick", "createEntry()");


                 document.querySelector("#prev-button").addEventListener("click", function(){
                        //go back to step1

                         document.querySelector("#step1").style.display = "block";
                        document.querySelector("#step2").style.display = "none";

                        document.querySelector("#steps-level").innerText = "Step 1 / 2";

                         document.querySelector("#prevButton").innerHTML = "";

                          document.querySelector("#next-phase").type = "button";

                          document.querySelector("#next-phase").removeAttribute("onclick");

                          saveFormProgress("step1"); document.querySelector("#step1").style.display = "block";
                        document.querySelector("#step2").style.display = "none";

                        document.querySelector("#steps-level").innerText = "Step 1 / 2";

                         document.querySelector("#prevButton").innerHTML = "";

                          document.querySelector("#next-phase").type = "button";

                          document.querySelector("#next-phase").removeAttribute("onclick");
                          document.querySelector("#next-phase").innerText = "Next";

                          saveFormProgress("step1");

                 })

            }




       }


        function saveFormProgress(formStep){

            entryFormProgress = localStorage.getItem("entry-form-progress");

            if(entryFormProgress == null || entryFormProgress == undefined){
                formStep = {
                    'step' : 1
                }

                localStorage.setItem('entry-form-progress', JSON.stringify(formStep));
            }else{
                    entryFormProgress = JSON.parse(entryFormProgress);

                    if(formStep == 'step1'){
                        entryFormProgress.step = '1';
                    }else{
                        entryFormProgress.step = '2';
                    }

                    localStorage.setItem('entry-form-progress', JSON.stringify(entryFormProgress));


            }
        }


        function createEntry(){
                //document.querySelector("#create-entry-form").submit();


                   $.post({
                            url: "process/loaders/create-entry-data.php",
                            data: $("#create-entry-form").serialize(), 
                            success: function(feedback){

                                feedback = JSON.parse(feedback);

                                if(feedback.code == "error"){

                                    console.log("Data: ", feedback.data);

                                    if(feedback.data.length > 1){
                                           document.querySelector("#errors-info").innerHTML = "";
                                            feedback.data.forEach((error) =>{

                                        document.querySelector("#errors-info").innerHTML += `<div class='alert alert-danger border-0 .alert-dismissible fade show'><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>${error}</div>`;

                                            location.href="#create-new-entry-page";

                                            //reset the page steps
                                            resetFormProgress();

                                        })
                                 }else{

                                    document.querySelector("#error-info").innerHTML = `<div class='alert alert-danger>${feedback.message}</div>`;

                                    location.href="#create-new-entry-page";
                                 }


                                }else{

                                    //Not an error
                                    location.href="#create-new-entry-page";
                                    document.querySelector("#errors-info").innerHTML = `<div class='alert alert-success border-0'>${feedback.message}</div>`;

                                    resetFormProgress();

                                    document.querySelector("#create-entry-form").reset();

                                }

                             

                            },
                            beforeSend(){


                            }


                        })



        }


 </script>
</body>

</html>