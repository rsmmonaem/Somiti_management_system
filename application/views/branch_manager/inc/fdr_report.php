<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

	<style>

#print-button {
  display: block;
}

@media print {
  #print-button {
	display: none;
  }
}


	  @media print {
		  .card-header {
			  display: none;
		  }
	  }
  </style>
        <div class="row">   

            <div id="printable-content" class="card">
                <div class="card-header">
				<div class="col-md-12" style="text-align: center;display: flex;justify-content: center;margin-bottom: 40px; margin-top: 50px;">
					<h4 style="float: left;"><?=$title?> &nbsp;&nbsp;<?=$endDate?> &nbsp; TO &nbsp; <?=$endDate?></h4>
    			</div>
                </div>
                <div class="card-body" style="text-align: center;" >
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>মেম্বার </th>
                                <th>আসল টাকা </th>
                                <th>মাসিক মুনাফা</th>
                                <th>বাৎসরিক মুনাফা</th>
								<th>মুনাফা হার</th>
								<th>সময়</th>
								<th>‍মোট মুনাফা আসল</th>
								<th> ‍তারিখ </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
							    
                            $i = 1;
                            foreach ($report as $row):?>
							
                            <tr>
                                <td><?= $i++;?></td>
                                <td>
									
                                <?php
                                    $result = $this->db->get_where('member', ['member_id' => $row->fdr_member_id])->row();
                                    if ($result) {
                                        echo $result->member_name;
                                    } else {
                                        echo "Member not found";
                                    }
                                ?>
								</td>
                                <td>
				<?=$row->fdr_amount?>
								</td>
                                <td id="am">
				<?=$row->fdr_monthly_interest		?>
								</td>
                                <td ><?= $row->fdr_yearly_interest?></td>
								<td><?= $row->fdr_interest?></td>
								<td><?= $row->fdr_target_year?></td>
								<td id="ax"><?= $row->fdr_amount+($row->fdr_yearly_interest*$row->fdr_target_year)?></td>
								<td><?= $row->fdr_register_date?></td>
                            </tr>
                            <?php endforeach;?>
							<tr>

								<td colspan="7"> ‍মোট মুনাফা আসল =</td>
								<!-- <td colspan="1" id="result"></td> -->
								<td colspan="1" id="result2"></td>
								<td colspan="2"><?=$endDate?> &nbsp; TO &nbsp; <?=$endDate?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					<div class="text-center">
            <!-- <button type="button" class="btn btn-primary" onclick="window.print();">Print</button> -->
        </div>
                </div>
				<button id="print-button" style="float: right;margin-bottom: 40px;" type="button" class="btn btn-primary" onclick="printCard();">Print</button>
            </div>
        </div>
<!-- <script>
	// Get all the td elements with the id "am"
var amElements = document.querySelectorAll("#am");

// Initialize the sum
var totalSum = 0;

// Loop through each td element and sum up their content
for (var i = 0; i < amElements.length; i++) {
    totalSum += parseInt(amElements[i].textContent);
}

// Find the td element with the id "result" and update its content with the total sum
var resultElement = document.querySelector("#result");
resultElement.textContent = "আসল - "+totalSum+"/-";


</script> -->


<script>
	// Get all the td elements with the id "am"
var axElements = document.querySelectorAll("#ax");

// Initialize the sum
var totalSum = 0;

// Loop through each td element and sum up their content
for (var i = 0; i < axElements.length; i++) {
    totalSum += parseInt(axElements[i].textContent);
}

// Find the td element with the id "result" and update its content with the total sum
var resultElement = document.querySelector("#result2");
resultElement.textContent = totalSum+"/-";


</script>

<script>
function printCard() {
    // Store the original content and the content to be printed
    var printContents = document.getElementById("printable-content").innerHTML;
    var originalContents = document.body.innerHTML;

    // Replace the current content with the content to be printed
    document.body.innerHTML = printContents;

    // Hide the print button before printing
    var printButton = document.getElementById('print-button');
    if (printButton) {
        printButton.style.display = 'none';
    }

    // Open the print dialog
    window.print();

    // Add an event listener for the afterprint event
    window.onafterprint = function() {
        // Restore the original content after printing
        document.body.innerHTML = originalContents;

        // Reload the page
        location.reload();
    };
	location.reload();
}


</script>
