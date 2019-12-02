 <div class="row">
    <div class="col-lg-12">
        <h1>Lawyers <small>Overview</small></h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-list"></i> Import Members</li>
        </ol>            
    </div>
</div><!-- /.row -->
<?php
$output = '';
$output .= form_open_multipart('import/save');
$output .= '<div class="row">';
$output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
$output .= form_label('Import Lawyers', 'image');
$data = array(
    'name' => 'userfile',
    'id' => 'userfile',
    'class' => 'form-control filestyle',
    'value' => '',
    'data-icon' => 'false'
);
$output .= form_upload($data);
$output .= '</div> <span style="color:red;">*Please choose an Excel file(.xls or .xlxs) as Input</span></div>';
$output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
$data = array(
    'name' => 'importfile',
    'id' => 'importfile-id',
    'class' => 'btn btn-primary',
    'value' => 'Import',
);
$output .= form_submit($data, 'Import Data');
$output .= '</div>
                        </div></div>';
$output .= form_close();
echo $output;
?>
<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">First Name</th>
                <th class="header">Last Name</th>                           
                <th class="header">Email</th>                      
                <th class="header">DOB</th>
                <th class="header">Contact Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($employeeInfo) && !empty($employeeInfo)) {
                foreach ($employeeInfo as $key => $element) {
                    ?>
                    <tr>
                        <td><?php echo $element['first_name']; ?></td>   
                        <td><?php echo $element['last_name']; ?></td> 
                        <td><?php echo $element['email']; ?></td>                       
                        <td><?php echo $element['dob']; ?></td>
                        <td><?php echo $element['contact_no']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">There is no employee.</td>    
                </tr>
            <?php } ?>
 
        </tbody>
    </table>
</div>