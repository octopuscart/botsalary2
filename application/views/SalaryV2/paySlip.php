<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/treejs/themes/default/style.min.css">

<script src="<?php echo base_url(); ?>assets/treejs/jstree.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet"  />



<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<style>
    .product_image{
        height: 200px!important;
    }
    .product_image_back{
        background-size: contain!important;
        background-repeat: no-repeat!important;
        height: 200px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }
    .primarytext{
        font-size: 15px;
    }
    .form-group-bg {

        background: #f9f9f9;
        padding: 8px 0px;
        margin: 5px 0px;
    }
</style>
<!-- Main content -->
<section class="content" >
    <div class="">

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h3 class="panel-title">Pay Slip For Employee ID/HKID: #<?php echo $employee["employee_id"]; ?>
                    <div class="btn-group pull-right">
                        <?php if ($deletable) { ?>
                            <a href="<?php echo site_url("Salary/deletePayslip/" . $salaryobj["id"]); ?>?salary_date=<?php echo $paydate; ?>" class="btn btn-danger "><i class="fa fa-trash"></i> Delete Payslip</a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo site_url("Salary/index"); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>

                            <?php
                        }
                        ?>

                        <a href="<?php echo site_url("SalaryV2/paySlipPdf/" . $salaryobj["id"] . "/I"); ?>" class="btn btn-primary"><i class="fa fa-eye"></i> View PDF</a>
                        <a href="<?php echo site_url("SalaryV2/paySlipPdf/" . $salaryobj["id"] . "/D"); ?>"  class="btn btn-primary"><i class="fa fa-download"></i> Download PDF</a>
                    </div>
                </h3>
            </div>
            <div class="panel-body">

                <div class="col-md-12">

                    <?php echo $this->session->flashdata('success_msg'); ?>
                    <?php echo $this->session->flashdata('error_msg'); ?>
                    <div class="row form-group-bg">
                        <div class="col-md-6">  
                            <div class="form-group ">
                                <h3>
                                    <?php echo $employee["name"]; ?><br/>
                                      <small>Employee HKID: #<?php echo $employee["hk_id"]; ?></small><br/>
                                    <small>Employee ID: #<?php echo $employee["employee_id"]; ?></small>
                                </h3>

                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>



                </div>
                <div class="col-md-12" id='printArea'>

                    <?php
                    $this->load->view('SalaryV2/printSalaryBase', array("employee" => $employee, "salaryobj" => $salaryobj, "allownce" => $allownce, "deduction" => $deduction));
                    ?>


                </div>


            </div>


        </div>



</section>
<!-- end col-6 -->

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>


<script>

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>



<script src="<?php echo base_url(); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>

<?php
$this->load->view('layout/footer');
?> 


