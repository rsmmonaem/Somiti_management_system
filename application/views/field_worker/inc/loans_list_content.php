<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">ঋণ গ্রহীতার তালিকা </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?= base_url()?>field_worker/add_loans" type="button" class="btn btn-primary"><i class="bx bx-plus-circle"></i> Add Loans</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">ঋণ গ্রহীতা </h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>ঋণ <br/>গ্রহীতার নাম</th>
							<th>ঋণ <br/> আইডি</th>
                            <th>জামিনদার</th>
                            <th>মুল <br/> টাকা</th>
                            <th>গ্রহণের <br/>তারিখ</th>
                            <th>বীমার <br/> পরিমাণ</th>
							<th>মোট  জমার <br/> মেম্বার আইডি/পরিমান </th>
							<th>বাকির <br/>পরিমান  </th>
                            <th>কিস্তি</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $this->load->database();

                        // Perform the select query without grouping
                        $query = $this->db->get('daily_loan_collection');

                        // Check if the query was successful
                        if ($query) {
                            // Initialize an associative array to store the sums
                            $sums = array();

                            // Fetch the result as an array of objects
                            $result = $query->result();

                            // Loop through the result and accumulate sums based on dlc_member_id
                            foreach ($result as $row) {
                                $loans_id = $row->dlc_loans_id;
                                $amount = $row->dlc_amount;

                                if (!isset($sums[$loans_id])) {
                                    $sums[$loans_id] = $amount;
                                } else {
                                    $sums[$loans_id] += $amount;
                                }
                            }
                            // Display the accumulated sums

                            $member_data = array(); // Initialize an array to store member data

                            foreach ($sums as $loans_id => $total_dlc_amount) {
                                // echo $member_id , $total_dlc_amount. "<br>";

                                // Store member data in the array
                                $member_data[$loans_id] = $total_dlc_amount;
                            }

                            // Now you can use $member_data array to access all member data

                            // foreach ($member_data as $member_id => $total_dlc_amount) {
                            //     echo "Member: " . $member_id ." ";
                            //     echo "Total DLC amount: " . $total_dlc_amount . "<br>";
                            // }
                        }

                        $i = 1;
                        foreach ($data as $row): ?>

                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->member_name?></td>
                                <td><?= $row->loans_id?></td>
                                <td><?= $row->guarantor_name?></td>
                                <td><?= $row->loans_amount?></td>
                                <td><?= $row->loans_registration_date?></td>
                                <td><?= $row->loans_payment_amount?></td>
                                <td>
                                    <?php
                                    // Check if loans_member_id exists in $member_data array
                                    if (isset($member_data[$row->loans_id])) {
                                        // Use $member_data if condition is met
                                        echo "আইডি &nbsp;". $row->loans_member_id ."&nbsp; || পরিমান: &nbsp;" . $member_data[$row->loans_id];
                                    } else {
                                        echo "No matching member data";
                                    }
                                    ?>

                                </td>
                                <td>
									<?php
											if (isset($member_data[$row->loans_id])) {
												echo $row->loans_amount-$member_data[$row->loans_id];  
											}else{
												echo 'NA';
											}

									?>
                                   
                                </td>
                                <td><?= $row->loans_profit_installments?></td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="<?= base_url()?>field_worker/edit_loans/<?= $row->loans_id?>" class="ms-3 border-warning"><i class="bx bxs-edit"></i></a>
                                        <a onclick="return confirm('are you sure?')" href="<?= base_url()?>field_worker/loans_delete/<?= $row->loans_id?>" class="ms-3 border-danger"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>




