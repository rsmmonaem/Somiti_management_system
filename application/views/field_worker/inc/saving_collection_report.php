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
					<h4 style="float: left;"><?$title?>&nbsp;&nbsp;<?=$endDate?> &nbsp; TO &nbsp; <?=$endDate?></h4>
    			</div>
                </div>
                <div class="card-body" style="text-align: center;" >
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> মেম্বার </th>
                                <th> প্লেন আইডি</th>
                                <th>টাকা জামর মাধ্যম</th>
								<th>সঞ্চয় আইডি</th>
                                <th>জমা</th>
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
					$result = $this->db->get_where('member', ['member_id' => $row->dsc_member_id])->row();
					if ($result) {
						echo $result->member_name;
					} else {
						echo "Member not found";
					}
				?>
								</td>
                                <td>
				<?php

 echo $row->sa_plan_id;
					// $result = $this->db->get_where('loans', ['loans_id' => $row->dlc_loans_id])->row();
					// if ($result) {
					// 	$result->loans_guarantor_id;

					// 	$results = $this->db->get_where('guarantor', ['guarantor_id ' => $result->loans_guarantor_id])->row();
					// 	if ($results) {
					// 		echo $results->guarantor_name;
					// 	} else {
					// 		echo "guarantor not found";
					// 	}
						
					// } else {
					// 	echo "guarantor not found";
					// }
				?>
								</td>
                                <td id="am">
				<?php


if ($row->dsc_payment_type==1) {
	echo "Cash";
}else{
	echo "Chack";
}
					// $result = $this->db->get_where('loans', ['loans_id' => $row->dlc_loans_id])->row();
					// if ($result) {
					// 	echo $result->loans_amount;					
					// } else {
					// 	echo "guarantor not found";
					// }
				?>
								</td>
								<td><?= $row->dsc_saving_id?></td>
                                <td id="ax" ><?= $row->dsc_amount?></td>
								
								<td><?= $row->dsc_collect_date?></td>
                            </tr>
                            <?php endforeach;?>
							<tr>

								<td colspan="5"> ‍মোট জমা =</td>
								<!-- <td colspan="1" id="result"></td> -->
								<td colspan="1" id="result2"></td>
								<td colspan="3"><?=$endDate?> &nbsp; TO &nbsp; <?=$endDate?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					<div class="text-center">
        </div>
                </div>
				<button id="print-button" style="float: right;margin-bottom: 40px;" type="button" class="btn btn-primary" onclick="printCard();">Print</button>
            </div>
        </div>



<script>
var axElements = document.querySelectorAll("#ax");

var totalSum = 0;

for (var i = 0; i < axElements.length; i++) {
    totalSum += parseInt(axElements[i].textContent);
}
var resultElement = document.querySelector("#result2");
resultElement.textContent = totalSum+"/-";


</script>

<script>
function printCard() {
    var printContents = document.getElementById("printable-content").innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;

    var printButton = document.getElementById('print-button');
    if (printButton) {
        printButton.style.display = 'none';
    }
    window.print();
    window.onafterprint = function() {
        document.body.innerHTML = originalContents;
        location.reload();
    };
	location.reload();
}


</script>
