<?php
include('../database/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/CSS/report.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="height:130vh">                     
                                
                      <div class="row">
                      <div class="col-12">
                            <div class="btn btn-warning mb-5" onclick="window.print()">Print Form</div>
                            <div class="btn btn-warning mb-5" id="download" >Download</div>

                        <div class="card">

                        
                            <div class="card-body text-center" >
                                  <h5 class="card-title m-b-0">Audit Reports</h5>
                              </div>
                                  <div class="table-responsive" id="content">
                                      <table class="table table-bordered" >
                                          <thead class="thead-light">
                                              <tr>
                                                <th scope="col">SN</th>
                                                  <th scope="col">Audit Title</th>
                                                  <th scope="col">Audit Status</th>
                                                  <th scope="col">Compliance Rate</th>
                                                  <th scope="col">Violations</th>
                                                  <th scope="col">Insight</th>                                                  
                                                  <th scope="col">Audit Date</th>
                                              </tr>
                                          </thead>
                                          <tbody class="customtable">

                                       
                                      <?php

                                            $getaudits = "SELECT * FROM audits";
                                            $feed = mysqli_query($conn, $getaudits);

                                            while($row = mysqli_fetch_assoc($feed)){
                                            
                                            $title = $row['Title'];
                                            $date = $row['A_Date'];
                                            $status = $row['Audit_Status'];
                                            $Comp_Rate = $row['Comp_Rate'];
                                            $Violations = $row['Violations'];
                                            $Insights = $row['Insights'];
                                            $sn = $row['SN'];

                                            echo'
                                              <tr>
                                                  <td>'.$sn.'</td>
                                                  <td>'.$title.'</td>
                                                  <td>'.$status.'</td>
                                                  <td>'.$Comp_Rate.'</td>
                                                  <td>'.$Violations.'</td>
                                                  <td>'.$Insights.'</td>
                                                  <td>'.$date.'</td>
                                              </tr>
                                            ';

                                            }

                                            ?>
                                          </tbody>
                                      </table>
                                  </div>
                          </div>
                      </div>
                  </div>
            </div> 




 <!-- Your JavaScript code goes here -->
 <script>

   let download = document.getElementById('download');

    download.onclick = function() {
      const element = document.getElementById('content');
      const options = {
        margin: 1,
        filename: 'Audit.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
      };


      // Promise-based usage:
      html2pdf().set(options).from(element).save();


      // Old monolithic-style usage:
      // html2pdf(element, options);
    }
  </script>


            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        </body>
        </html>