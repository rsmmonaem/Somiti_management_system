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

            <div id="printTable" class="card">
                <div class="card-header">
                    <div class="col-md-12" style="text-align: center;display: flex;justify-content: center;margin-bottom: 40px; margin-top: 50px;">
                        <h4 style="float: left;"><?=$title?> &nbsp;&nbsp;<?=$startDate?> &nbsp; TO &nbsp; <?=$endDate?></h4>
                    </div>
                </div>
                <div class="card-body" style="text-align: center;" >
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>মেম্বারের নাম</th>
                                <th> টাকা </th>
                                <th>কালেকশনের তারিখ </th>
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
                                        $result = $this->db->get_where('member', ['member_id' => $row->dps_acc_member_id])->row();
                                        if ($result) {
                                            echo $result->member_name;
                                        } else {
                                            echo "Member not found";
                                        }
                                        ?>
                                    </td>
                                    <td id="plus"><?=$row->dps_col_amount?></td>
                                    <td><?=$row->dps_col_collect_date?></td>
                                </tr>
                            <?php endforeach;?>
                            <tr>

                                <td colspan="2"> ‍মোট কালেকশনের পরিমাণ =</td>
                                <td colspan="1" id="result"></td>
                                <td colspan="2"><?=$startDate?> &nbsp; TO &nbsp; <?=$endDate?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">

                    </div>
                </div>
                <button id="printButton" style="float: right;margin-bottom: 40px;" type="button" class="btn btn-primary" onclick="printCard();">Print</button>
            </div>
        </div>
        <script>
            // Function to calculate the total and update the result element
            function calculateTotal() {
                var total = 0;
                var plusElements = document.querySelectorAll("#plus");

                // Loop through all elements with id "plus" and sum their values
                for (var i = 0; i < plusElements.length; i++) {
                    var value = parseFloat(plusElements[i].textContent) || 0; // Parse the value as a float
                    total += value;
                }

                // Update the result element with the calculated total
                document.getElementById("result").textContent = total.toFixed(2); // Display total with 2 decimal places
            }

            // Call the calculateTotal function when the page loads
            window.onload = calculateTotal;
        </script>

        

        <script>
            // Function to open a new window and print the table
            function printTable() {
                var tableToPrint = document.getElementById("printTable"); // Add id="printTable" to your table element
                var newWin = window.open('', 'Print-Window');
                newWin.document.open();
                newWin.document.write('<html><head><title>Print</title></head><body>');
                newWin.document.write(tableToPrint.outerHTML);
                newWin.document.write('</body></html>');
                newWin.document.close();
                newWin.print();
                newWin.close();
            }

            // Add an event listener to the print button
            document.getElementById("printButton").addEventListener("click", function() {
                printTable();
            });
        </script>

