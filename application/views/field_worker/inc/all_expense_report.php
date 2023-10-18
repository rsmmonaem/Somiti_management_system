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
					<h4 style="float: left;">সকল ব্যয় সংক্রান্ত রিপোর্ট &nbsp;&nbsp;<?=$endDate?> &nbsp; TO &nbsp; <?=$endDate?></h4>
    			</div>
                </div>
                <div class="card-body" style="text-align: center;" >
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> খাত </th>
                                <th> মাধ্যম </th>
                                <th>টাকার পরিমাণ</th>
                                <th>টাকা</th>
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
									
				<?php echo $row->expense_name ?>
								</td>
                                <td>
								<?php echo $row->expense_type ?>
								</td>
                                <td id="am">
								<?php if ($row->expense_payment_type == 1) {
                                        echo 'ক্যাশ';
                                    }elseif($row->expense_payment_type == 2){
                                        echo 'চেক';
                                    }else{
                                        echo 'অন্যান্য';
                                    }
                                    ?>
								</td>
                                <td id="ax" ><?= $row->expense_amount?></td>
								<td><?= $row->expense_date?></td>
                            </tr>
                            <?php endforeach;?>
							<tr>

								<td colspan="4"> ‍মোট ব্যয় =</td>
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
