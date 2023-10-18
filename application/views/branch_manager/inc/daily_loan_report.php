<style>
	.card-body{
		text-align: center;
	}
</style>
<div class="page-wrapper">
    <div class="page-content">
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">ঋণ সংগ্রহ </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">প্রতিদিনের ঋণ সংগ্রহ</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 style="text-align: center;"><?=$title ?></h5>
                    <div class="dropdown ms-auto">
                        <a href="<?= base_url()?>branch_manager/daily_loan_collection_list" class="btn btn-primary"><i class="bx bx-left-arrow"></i> ঋণ সংগ্রহ লিস্ট </a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>একাউন্ট</th>
                                <th>মেম্বারের নাম</th>
                                <th>ছবি</th>
                                <th>মোট ঋনের পরিমাণ</th>
                                <th>টাকা সংগ্রহের পরিমাণ</th>
                                <th>অবশিষ্ট টাকার পরিমাণ</th>
                                <th>তারিখ</th>
                                <th>টাকা পরিশোধের পদ্ধতি </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($this->alm->get_member_loans_collections() as $row):?>
                                <tr>
                                    <td><?= $row->loans_id ?></td>
                                    <td><?= $row->member_name?>
									</td>
                                    <td><img src="<?= base_url()?>uploads/member/<?=$row->member_image?>" class="product-img-2" alt="product img"></td>
                                    <td><?= $row->loans_amount?></td>
                                    <td><?= $row->dlc_amount?></td>
                                    <td><?php
                                        $collection = $row->dlc_amount;
                                        $main_amount = $row->loans_amount;
                                        echo $main_amount - $collection;


                                        ?></td>
                                    <td><?= $row->dlc_date?></td>
                                    <td>
                                        <?php if ($row->dlc_amount_type == 1){
                                            echo "ক্যাশ";
                                        }elseif($row->dlc_amount_type == 2){
                                            echo "চেক";
                                        }else{
                                            echo "অন্যন্য";
                                        }

                                        ?>

                                    </td>

                                </tr>
                            <?php endforeach;?>


                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
