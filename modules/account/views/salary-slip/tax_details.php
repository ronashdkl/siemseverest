<?php
/**
 * Created by PhpStorm.
 * User: Binay
 * Date: 29/11/2017
 * Time: 13:36
 */
$counter = 1;
?>
<div class="box">
    <div class="box-body">
        <table id="expenses_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Date</th>
                <th>Employee</th>
                <th>Tax</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($salary_slips as $salary_slip){?>
                <tr>
                    <td scope="row"><?= $counter++?></td>
                    <td scope="row"><?= date('Y M', strtotime($salary_slip["date"]))?></td>
                    <td scope="row"><?= $salary_slip->paidTo->fullName?></td>
                    <td scope="row"><?= $salary_slip["tax_amount"]?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
</div>
