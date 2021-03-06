<?php $this->load->view('includes/header');?>
<?php $this->load->view('includes/menu');?> 
<link rel="stylesheet" href="<?php echo base_url()?>assets\datatables\css\dataTables.bootstrap.min.css">

<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
<script src="<?php echo base_url()?>assets\dist\js\jquery.js"></script>
<script src="<?php echo base_url()?>assets\dist\js\jquery-ui.min.js"></script>

<?php foreach ($purchase as $row ) {?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <section class="content-header">
        <button class="btn btn-success" onclick="viewpurchase()"><i class="glyphicon glyphicon-plus"></i> View Billing</button>

        
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> home</a></li>
        <li class="active">Billing</li>
      </ol>
    </section>
    <!-- Content Header (Page header) -->
    <div id="add-brand-messages"></div>
<section class="content">
 <div class="container-fluid">
  <div class="row main-content">       	
   <div class="box-body"> 
      
       <!-- <form method="POST" action="<?php //echo site_url('Edit_purchase/update')?>" id="form" class="form-horizontal"> -->  
 <div class="row">
 	<div id="add-brand-messages"></div>
 </div>
 <form action="#" id="form" class="form-horizontal">
 	<div class="row">
			 <div class="col-sm-3">
				<h6>Company Name:</h6>
 				<div class="form-group">
 					<!-- <select onchange="getSupplierData()" id="cname1" class="cname1 form-control" name="cname1"></select> -->
              	   	<input value="<?php echo $row->name; ?>" type="text" class="form-control" id="cname1" name="cname1" placeholder="Company Name">
              	   	<input value="<?php echo $row->name; ?>" type="hidden" class="form-control" id="cname" name="cname" placeholder="Company Name">
             	</div>
			</div>
			 
			<div class="col-sm-2">
				<h6>Role:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo $row->role; ?>" readonly="true" type="text" class="form-control" id="role" name="role" placeholder="Role">
             	</div>
			</div>
			<div class="col-sm-2">
				<h6>GSTIN:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo $row->gstin; ?>" readonly="true" type="text" class="form-control" id="gstin" name="gstin" placeholder="GSTIN">
             	</div>
			</div>
			<div class="col-sm-2">
				<h6>Mobile:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo $row->mobile; ?>" readonly="true" type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
             	</div>
			</div>
			<div class="col-sm-3">
				<h6>Address:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo $row->address; ?>" readonly="true" type="text" class="form-control" id="address" name="address" placeholder="Address">
             	</div>
			</div>		
		</div>


   		

<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:20%;text-align:center">Product</th>
			  			<th style="width:10%;text-align:center">Rate</th>
			  			<th style="width:10%;text-align:center">Quantity</th>
			  			<th style="width:15%;text-align:center">Sub Total</th>	
			  			<th style="width:9%;text-align:center">S GST</th>	
			  			<th style="width:9%;text-align:center">C GST</th>	
			  			<th style="width:15%;text-align:center">Total</th>			  
			  			<!-- <th style="width:10%;text-align:center">
			  				<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i>Add Row</button>
			  			</th> -->
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		$x=0;
			  		foreach ($purchase_item as $row1) 
			  		{
			  			
			  			$x++;
						?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="padding-left:20px;">			  					<div class="form-group">
			  					
			  					<input readonly="" value="<?php echo $row1->pname; ?>" class="username form-control" type="text" name="p_name1[]" id="p_name1<?php echo $x; ?>" autocomplete="off"  />	
			  					<input value="<?php echo $row1->product_id; ?>" type="hidden" name="p_id<?php echo $x; ?>" id="p_id<?php echo $x; ?>" autocomplete="off" class="form-control" />
			  					<input value="<?php echo $row1->pname; ?>" type="hidden" name="pname<?php echo $x; ?>" id="pname<?php echo $x; ?>" autocomplete="off" class="form-control" />	
			  					</div>	  					
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input value="<?php echo $row1->s_price; ?>" type="text" name="p_price<?php echo $x; ?>" id="p_price<?php echo $x; ?>" autocomplete="off" readonly="true" class="form-control" />			  					
			  					<input value="<?php echo $row1->qty; ?>" type="hidden" name="stock<?php echo $x; ?>" id="stock<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input value="<?php echo $row1->qty; ?>" type="text" name="qty<?php echo $x; ?>" id="qty<?php echo $x; ?>" onchange="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input value="<?php echo $row1->stot; ?>" type="text" name="stot<?php echo $x; ?>" id="stot<?php echo $x; ?>" autocomplete="off" class="form-control" readonly="true" />			  					
			  						
			  				</td>
			  				<td style="padding-left:20px;">	
			  					<input value="<?php echo $row1->sgst_amt; ?>" type="text" name="sgst_amt<?php echo $x; ?>" id="sgst_amt<?php echo $x; ?>" autocomplete="off" class="form-control" readonly="true" />	
			  					<input value="<?php echo $row1->sgst; ?>" type="hidden" name="sgst<?php echo $x; ?>" id="sgst<?php echo $x; ?>" autocomplete="off" class="form-control" readonly="true" />
			  				</td>
			  				<td style="padding-left:10px;">	
			  					<input value="<?php echo $row1->cgst_amt; ?>" type="text" name="cgst_amt<?php echo $x; ?>" id="cgst_amt<?php echo $x; ?>" autocomplete="off" class="form-control" readonly="true" />	
			  					<input value="<?php echo $row1->cgst; ?>" type="hidden" name="cgst<?php echo $x; ?>" id="cgst<?php echo $x; ?>" autocomplete="off" class="form-control" readonly="true" />	
			  				</td>
			  				
			  				<td style="padding-left:20px;">			  					
			  					<input value="<?php echo $row1->total; ?>" type="text" name="tot<?php echo $x; ?>" id="tot<?php echo $x; ?>" autocomplete="off" class="form-control" readonly="true" />			  					
			  						
			  				</td>
			  				<!-- <td style="padding-left:20px;">
			  					<button id="removeProductRowBtn<?php echo $x; ?>" class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button><button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i></button>
			  				</td> -->
			  			</tr>
		  			<?php
		  			$arrayNumber++;
		  			
			  		} // /for
			  		?>
			  	</tbody>	
			  	<tfoot>
			  		<tr>
			  			<td colspan="3" align="right">

						<input value="<?php echo $x+1; ?>" type="hidden" id="tc" name="tc">

			  			Total</td>
			  			
			  			<td style="padding-left:20px;"><input value="<?php echo $row->stot; ?>" type="text" name="subtot" id="subtot" autocomplete="off" class="form-control" readonly="true" /></td>
			  			<td style="padding-left:20px;"><input value="<?php echo $row->sgst; ?>" type="text" name="sgst_tot" id="sgst_tot" autocomplete="off" class="form-control" readonly="true" /></td>
			  			<td style="padding-left:20px;"><input value="<?php echo $row->cgst; ?>" type="text" name="cgst_tot" id="cgst_tot" autocomplete="off" class="form-control" readonly="true" /></td>
			  			<td style="padding-left:20px;"><input value="<?php echo $row->tot; ?>"type="text" name="total" id="total" autocomplete="off" class="form-control" readonly="true" /></td>
			  			<td></td>
			  		</tr>
			  	</tfoot>		  	
			  </table>


			

		<div class="row">
			 <div class="col-sm-2">
				<h6>Bill Id:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo $row->b_id; ?>" readonly="true" type="text" class="form-control" id="pid" name="pid" placeholder="ID">
             	</div>
			</div>

			<div class="col-sm-2">
				<h6>Bill Date:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo date('d-m-Y', strtotime($row->date)); ?>" type="text" class="form-control" id="pdate" name="pdate" placeholder="Date">
             	</div>
			</div>
			<div class="col-sm-2">
				<h6>Due Date:</h6>
 				<div class="form-group">
              	   	<input value="<?php echo date('d-m-Y', strtotime($row->duedate)); ?>" type="text" class="form-control" id="duedate" name="duedate" placeholder="Due Date">
             	</div>
			</div>
			<div class="col-sm-3">
				<h6>Cash or Credit:</h6>
 				<div class="form-group">
              	   	<select onchange="mode1()" name="mode" id="mode" class="form-control">
                 	<option><?php echo $row->mode; ?></option>
                 	<option>Cash</option>
                 	<option>Credit</option>
               		</select>
             	</div>
			</div>
			<div class="col-sm-3">
				<h6>Payment Mode:</h6>
 				<div class="form-group">
              	   	<select name="pmode" id="pmode" class="form-control">
                 	<option><?php echo $row->pmode; ?></option>
                 	<option>Cash</option>
                 	<option>Cheque</option>
                 	<option>Bank</option>
               		</select>
             	</div>
			</div>
				
		</div>

		

		<div class="row">
			<div class="col-sm-6">
				<h6></h6>
 				<div class="form-group">
              	   	
             	</div>
			</div>
			 	
			<div class="col-sm-3">
				<h6>Advance:</h6>
 				<div class="form-group">
              	   	<input onBlur="if(this.value=='') this.value='0'" onFocus="if(this.value =='0' ) this.value=''" value="<?php echo $row->advance; ?>" type="text" class="form-control" id="advance" name="advance" onkeyup="advance1()" onchange="advance1()" placeholder="Advance">
             	</div>
			</div>
			<div class="col-sm-3">
				<h6>Balance:</h6>
 				<div class="form-group">
              	   	<input readonly="true" value="<?php echo $row->balance; ?>" type="text" class="form-control" id="balance" name="balance" placeholder="Balance">
             	</div>
			</div>	
		</div>
		
		<div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default" onclick="newpurchase()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> New Billing</button>
			      <button onclick="save1()" type="button" id="save" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
			      <a target="_blank" href="<?php echo base_url();?>Billing_print/fetch_print/<?php echo $row->b_id; ?>"><button type="button" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Print</button></a>
			    </div>
		</div>
<?php }?>
</form>
		  </div>	
		</div>
	  </div>
	</section>

</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<script type="text/javascript">

	var tableProductLength = $("#productTable tbody tr").length;
	for(x = 1; x < tableProductLength; x++) 
	{
		$("#removeProductRowBtn"+x).hide();
	}

	$( "#cname1" ).autocomplete({      
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('Billing/ajax_autocomplete') ?>",
                    dataType: "json", 
                    data: request, 
                    success: function (data) {
                        if(data.response == 'true') 
                        {
                        response(data.message);
                    	}
                      }
                 });      
             },
        minLength: 1,
        
select: function (event, ui) {
    $(this).val(ui.item.label); // display the selected text
    var userid = ui.item.id; // selected value

    // AJAX
    $.ajax({
url : "<?php echo site_url('Billing/fetchSupplierData')?>/" + userid,
				type: 'POST',
				data: {SupplierID : userid},
				dataType: 'json',
				success:function(response) {
					// setting the rate value into the rate input field
					$("#cname").val(response.name);	
					$("#mobile").val(response.mobile);
					$("#address").val(response.address);
					$("#gstin").val(response.gstin);
					$("#role").val(response.role);
					$("#p_name11").focus();
					// $("#sgst1"+row).html(response.sgst);
					// $("#cgst1"+row).html(response.cgst);


				} // /success
			});
		}
		
		});  

         

	var tableProductLength = $("#productTable tbody tr").length;
	
	for(row = 1; row <= tableProductLength; row++) 
	{

	$("#p_name1"+row).autocomplete({   
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('Billing/ajax_autocomplete1') ?>",
                    dataType: "json", 
                    data: request, 
                    success: function (data) {
                        if(data.response == 'true') 
                        {
                        response(data.message);
                    	}
                      }
                 });      
             }, 

		minLength: 1,
        
select: function (event, ui) {
    $(this).val(ui.item.label); // display the selected text
    var userid = ui.item.pid; // selected value
	

$.ajax({
url : "<?php echo site_url('Billing/fetchProductData')?>/" + userid,
				type: 'POST',
				data: {productId : userid},
				dataType: 'json',
				success:function(response) {
					
					var role = $("#role").val();

				if(response.stock != 0 && role == 'Distributor' )
				{

					$("#p_id"+row).val(response.id);
					$("#pname"+row).val(response.p_name);
					$("#p_price"+row).val(response.d_price);
					$("#stock"+row).val(response.stock);
					$("#sgst"+row).val(response.sgst);
					$("#cgst"+row).val(response.cgst);
				$("#qty"+row).val(1);
				var total = Number(response.d_price) * 1;
     			total = total.toFixed(2);
				$("#stot"+row).val(total);
				var sgst1 = (total/100) * Number(response.sgst);
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+row).val(sgst1);
				var cgst1 = (total/100) * Number(response.cgst);
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+row).val(cgst1);
				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+row).val(tot1);
	
					subAmount();
					$("#qty"+row).focus();
				}
				else if(response.stock != 0 && role == 'Retailor' )
				{

					$("#p_id"+row).val(response.id);
					$("#pname"+row).val(response.p_name);
					$("#p_price"+row).val(response.r_price);
					$("#stock"+row).val(response.stock);
					$("#sgst"+row).val(response.sgst);
					$("#cgst"+row).val(response.cgst);
				$("#qty"+row).val(1);
				var total = Number(response.r_price) * 1;
     			total = total.toFixed(2);
				$("#stot"+row).val(total);
				var sgst1 = (total/100) * Number(response.sgst);
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+row).val(sgst1);
				var cgst1 = (total/100) * Number(response.cgst);
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+row).val(cgst1);
				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+row).val(tot1);
	
					subAmount();
					$("#qty"+row).focus();
				}
				else if(response.stock != 0 && role == 'Customer' )
				{

					$("#p_id"+row).val(response.id);
					$("#pname"+row).val(response.p_name);
					$("#p_price"+row).val(response.c_price);
					$("#stock"+row).val(response.stock);
					$("#sgst"+row).val(response.sgst);
					$("#cgst"+row).val(response.cgst);
				$("#qty"+row).val(1);
				var total = Number(response.c_price) * 1;
     			total = total.toFixed(2);
				$("#stot"+row).val(total);
				var sgst1 = (total/100) * Number(response.sgst);
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+row).val(sgst1);
				var cgst1 = (total/100) * Number(response.cgst);
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+row).val(cgst1);
				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+row).val(tot1);
	
					subAmount();
					$("#qty"+row).focus();
				}
				else
				{
					
					alert('No Stock Choose Another Product');
					$("#p_name1"+row).focus();
					$("#tot"+row).val('0');
					$("#cgst_amt"+row).val('0');
					$("#sgst_amt"+row).val('0');
					$("#stot"+row).val('0');
					$("#qty"+row).val('');
					$("#p_id"+row).val('');
					$("#pname"+row).val('');
					$("#p_name1"+row).val('');
					$("#p_price"+row).val('0');
					$("#stock"+row).val('0');
					$("#sgst"+row).val('0');
					$("#cgst"+row).val('0');
				}
				} // /success
			});
		}

        });

	}

$(document).ready(function() {


			date = new Date();
            var month = date.getMonth() + 2;
            var day = date.getDate();
            var year = date.getFullYear();
            if (document.getElementById('duedate').value == '')
            {
            document.getElementById('duedate').value = day + '-' + month +  '-' + year;           
            }
		// order date picker
		$('#pdate').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        // orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
		$('#duedate').datepicker({
        autoclose: true,
        format: "dd-mm-yyyy",
        todayHighlight: true,
        // orientation: "top auto",
        todayBtn: true,
        todayHighlight: true, 

    });

});

    

function addRow() {
	$("#addRowBtn").button("loading");


	var tableLength = $("#productTable tbody tr").length;

	var tc = tableLength+2;
	$('#tc').val(tc);
		// alert(tc);

	var tableRow;
	var arrayNumber;
	var count;
	var c ="0";
	var c1 ="";


	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}
	

			$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+				  				
			  	'<td style="padding-left:20px;"">'+
			  	'<div class="form-group">'+
				
				'<input type="text" name="p_name1[]" id="p_name1'+count+'" autocomplete="off" class="form-control" />'+
				'<input type="hidden" name="p_id'+count+'" id="p_id'+count+'" autocomplete="off" class="form-control" />'+
				'<input onchange="getProductData('+count+')" type="hidden" name="pname'+count+'" id="pname'+count+'" autocomplete="off" class="form-control" />'+
				'</div>'+
				'</td>'+
				'<td style="padding-left:20px;"">'+
					'<input value="0" type="text" name="p_price'+count+'" id="p_price'+count+'" autocomplete="off" readonly="true" class="form-control" />'+
					'<input type="hidden" name="stock'+count+'" id="stock'+count+'" autocomplete="off" class="form-control" />'+
				'</td>'+
				'<td style="padding-left:20px;">'+
					'<div class="form-group">'+
				'<input type="text" name="qty'+count+'" id="qty'+count+'" onchange="getTotal('+count+')" autocomplete="off" class="form-control" min="1"  />'+
					'</div>'+
				'</td>'+
				'<td style="padding-left:20px;">'+
					'<input value="0" type="text" name="stot'+count+'" id="stot'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
				'</td>'+
				'<td style="padding-left:20px;">'+
				'<input value="0" type="text" name="sgst_amt'+count+'" id="sgst_amt'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
					'<input value="0" type="hidden" name="sgst'+count+'" id="sgst'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
				'</td>'+
				'<td style="padding-left:20px;">'+
				'<input value="0" type="text" name="cgst_amt'+count+'" id="cgst_amt'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
					'<input value="0" type="hidden" name="cgst'+count+'" id="cgst'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
				'</td>'+
				
				'<td style="padding-left:20px;">'+
					'<input value="0" type="text" name="tot'+count+'" id="tot'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
				'</td>'+
				'<td style="padding-left:20px;">'+
					'<button id="removeProductRowBtn'+count+'" class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
					'<button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i></button>'+
				'</td>'+
			'</tr>';

			var a=count-1;
			$("#removeProductRowBtn"+a).hide();

			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}	


		$("#p_name1"+count).autocomplete({   
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('Billing/ajax_autocomplete1') ?>",
                    dataType: "json", 
                    data: request, 
                    success: function (data) {
                        if(data.response == 'true') 
                        {
                        response(data.message);
                    	}
                      }
                 });      
             }, 

		minLength: 1,
        
select: function (event, ui) {
    $(this).val(ui.item.label); // display the selected text
    var userid = ui.item.pid; // selected value
	

$.ajax({
url : "<?php echo site_url('Billing/fetchProductData')?>/" + userid,
				type: 'POST',
				data: {productId : userid},
				dataType: 'json',
				success:function(response) {

					var role = $("#role").val();
					
				if(response.stock != 0 && role == 'Distributor' )
				{
					$("#p_id"+count).val(response.id);
					$("#pname"+count).val(response.p_name);
					$("#p_price"+count).val(response.d_price);
					$("#stock"+count).val(response.stock);
					$("#sgst"+count).val(response.sgst);
					$("#cgst"+count).val(response.cgst);

				$("#qty"+count).val(1);

				var total = Number(response.d_price) * 1;
					
     			total = total.toFixed(2);
				$("#stot"+count).val(total);
				

				var sgst1 = (total/100) * Number(response.sgst);
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+count).val(sgst1);

				var cgst1 = (total/100) * Number(response.cgst);
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+count).val(cgst1);


				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+count).val(tot1);
			
					subAmount();
					$("#qty"+count).focus();
				}
				else if(response.stock != 0 && role == 'Retailor' )
				{
					$("#p_id"+count).val(response.id);
					$("#pname"+count).val(response.p_name);
					$("#p_price"+count).val(response.r_price);
					$("#stock"+count).val(response.stock);
					$("#sgst"+count).val(response.sgst);
					$("#cgst"+count).val(response.cgst);

				$("#qty"+count).val(1);

				var total = Number(response.r_price) * 1;
					
     			total = total.toFixed(2);
				$("#stot"+count).val(total);
				

				var sgst1 = (total/100) * Number(response.sgst);
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+count).val(sgst1);

				var cgst1 = (total/100) * Number(response.cgst);
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+count).val(cgst1);


				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+count).val(tot1);
			
					subAmount();
					$("#qty"+count).focus();
				}
				else if(response.stock != 0 && role == 'Customer' )
				{
					$("#p_id"+count).val(response.id);
					$("#pname"+count).val(response.p_name);
					$("#p_price"+count).val(response.c_price);
					$("#stock"+count).val(response.stock);
					$("#sgst"+count).val(response.sgst);
					$("#cgst"+count).val(response.cgst);

				$("#qty"+count).val(1);

				var total = Number(response.c_price) * 1;
					
     			total = total.toFixed(2);
				$("#stot"+count).val(total);
				

				var sgst1 = (total/100) * Number(response.sgst);
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+count).val(sgst1);

				var cgst1 = (total/100) * Number(response.cgst);
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+count).val(cgst1);


				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+count).val(tot1);
			
					subAmount();
					$("#qty"+count).focus();
				}
				else
				{
					
					alert('No Stock Choose Another Product');
					$("#p_name1"+count).focus();
					$("#tot"+count).val('0');
					$("#cgst_amt"+count).val('0');
					$("#sgst_amt"+count).val('0');
					$("#stot"+count).val('0');
					$("#qty"+count).val('');
					$("#p_id"+count).val('');
					$("#pname"+count).val('');
					$("#p_name1"+count).val('');
					$("#p_price"+count).val('0');
					$("#stock"+count).val('0');
					$("#sgst"+count).val('0');
					$("#cgst"+count).val('0');
				}
				} // /success
			});


}


         });


} // /add row


function removeProductRow(row = null)
 {

 if(confirm('Are you sure delete this row?'))
    {
	if(row) {
		$("#row"+row).remove();
		var a=row-1;
		$("#removeProductRowBtn"+a).show();
		subAmount();
	} else {
		alert('error! Refresh the page again');
    }
    }
    tableLength = $('#tc').val();
    var tc = tableLength-1;
	$('#tc').val(tc);
  }
	
function viewpurchase()
{
    
window.location.href = "<?php echo site_url('Viewbilling'); ?>";

}

function newpurchase()
{
	window.location.href = "<?php echo site_url('Billing'); ?>";
}

function mode1()
{
			var total = Number($("#total").val());
			var advance=Number($("#advance").val());
			var mode=$("#mode").val();



			 if(mode == "Cash")
			 {
			 	$("#advance").val(total);
				$("#balance").val('0');
			 }
			 else if(mode == "Credit")
			 {
				$("#advance").val('0');
				$("#balance").val(total);
			 }

}

function getTotal(row = null) {

if(row) 
{

	var p_price = Number($("#p_price"+row).val());
	var stock = Number($("#stock"+row).val());
	var qty = Number($("#qty"+row).val());
	var sgst = Number($("#sgst"+row).val());
	var cgst = Number($("#cgst"+row).val());
	var total;



				if(stock >= qty)
				{

				var total = p_price * qty;

				total = total.toFixed(2);
				$("#stot"+row).val(total);
				

				var sgst1 = (total/100) * sgst;
				sgst1 = sgst1.toFixed(2);
				$("#sgst_amt"+row).val(sgst1);

				var cgst1 = (total/100) * cgst;
				cgst1 = cgst1.toFixed(2);
				$("#cgst_amt"+row).val(cgst1);


				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
				tot1 = tot1.toFixed(2);
				$("#tot"+row).val(tot1);

				
				
				$("#advance").val(tot1);

					subAmount();

				}
				else
				{
					alert('Available Stock'+stock);
					$("#qty"+row).val('');
					$("#qty"+row).focus();
				}
		
		

	} else {
		alert('no row !! please refresh the page');
	}
}

function subAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
	var totalSubAmount1 = 0;
	var totalSubAmount2 = 0;
	var totalSubAmount3 = 0;
	var totalSubAmount4 = 0;

	for(x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);

totalSubAmount1 = Number(totalSubAmount1) + Number($("#stot"+count).val());
totalSubAmount2 = Number(totalSubAmount2) + Number($("#sgst_amt"+count).val());
totalSubAmount3 = Number(totalSubAmount3) + Number($("#cgst_amt"+count).val());
totalSubAmount4 = Number(totalSubAmount4) + Number($("#tot"+count).val());
	} // /for

	totalSubAmount1 = totalSubAmount1.toFixed(2);
	totalSubAmount2 = totalSubAmount2.toFixed(2);
	totalSubAmount3 = totalSubAmount3.toFixed(2);
	totalSubAmount4 = totalSubAmount4.toFixed(2);

	// sub total
$("#subtot").val(totalSubAmount1);
$("#sgst_tot").val(totalSubAmount2);
$("#cgst_tot").val(totalSubAmount3);
$("#total").val(totalSubAmount4);
$("#advance").val(totalSubAmount4);
$("#balance").val('0');		


	

} // /sub total amount

		function advance1()
		{
			var total = Number($("#total").val());
			var advance=Number($("#advance").val());



			 if(total >= advance)
			 {
			 	var balance=Number(total) - Number(advance);
				balance = balance.toFixed(2);
				$("#balance").val(balance);
			 }
			 else
			 {
					alert('Given Amount is high than Purchase Amount');
					$("#advance").val('0');
					$("#balance").val('0');
			 }

		}

		// create order form function

function save1()
{		

	$(".text-danger").remove();
    // remove the form error
    $('.form-group').removeClass('has-error').removeClass('has-success');
				
			var pdate = $("#pdate").val();
			var cname1 = $("#cname1").val();
			var duedate = $("#duedate").val();
			var advance = $("#advance").val();
			var mode = $("#mode").val();

			// form validation 
			if(pdate == "") {
				$("#pdate").after('<p class="text-danger"> The Order Date field is required </p>');
				$('#pdate').closest('.form-group').addClass('has-error');
			} else {
				$("#pdate").find('.text-danger').remove();
				$('#pdate').closest('.form-group').addClass('has-success');
			} // /else

			if(cname1 == "") {
				$("#cname").after('<p class="text-danger"> Supplier field is required </p>');
				$('#cname').closest('.form-group').addClass('has-error');
			} else {
				$("#cname").find('.text-danger').remove();
				$('#cname').closest('.form-group').addClass('has-success');
			} // /else

			if(duedate == "") {
				$("#duedate").after('<p class="text-danger"> Due Date field is required </p>');
				$('#duedate').closest('.form-group').addClass('has-error');
			} else {
				$("#duedate").find('.text-danger').remove();
				$('#duedate').closest('.form-group').addClass('has-success');
			} // /else

			if(advance == "0") {
				$("#advance").after('<p class="text-danger"> The Advance field is required </p>');
				$('#advance').closest('.form-group').addClass('has-error');
			} else {
				$("#advance").find('.text-danger').remove();
				$('#advance').closest('.form-group').addClass('has-success');
			} // /else

			if(mode == "") {
				$("#mode").after('<p class="text-danger"> The Payment Mode field is required </p>');
				$('#mode').closest('.form-group').addClass('has-error');
			} else {
				$("#mode").find('.text-danger').remove();
				$('#mode').closest('.form-group').addClass('has-success');
			} // /else

			// array validation
			var productName = document.getElementsByName('p_name1[]');				
			var validateProduct;
			for (var x = 0; x < productName.length; x++) 
			{       			
				var productNameId = productName[x].id;	    	
		    if(productName[x].value == '')
		    {	    		    	
		    	$("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-error');	    		    	    	
	        } 
	        else 
	        {      	
				$("#"+productNameId+"").find('.text-danger').remove();
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-success');	    		    		    	
	        }          
	   		} // for

	   		for (var x = 0; x < productName.length; x++) 
	   		{       						
		    if(productName[x].value)
		    {	    		    		    	
		    	validateProduct = true;
	     	}
	     	else
	     	{      	
		    	validateProduct = false;
	        }          
	   		} // for       		   	
	   	
	   
			if(pdate && duedate && cname && advance && mode ) {

				if(validateProduct == true) {
					// create order button
					// $("#createOrderBtn").button('loading');


			$.ajax({
            url : "<?php echo site_url('Edit_billing/update')?>",
            type: 'POST',
            data: $('#form').serialize(),
            dataType: 'JSON',
            success:function(data) 
            {
        
         // reset the form text
         $("#form")[0].reset();
         
         // remove the error text
         $(".text-danger").remove();
         // remove the form error
         $('.form-group').removeClass('has-error').removeClass('has-success');


         // $('#add-brand-messages').html('<div class="alert alert-success">'+
         // '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
         // '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ data +
         // '</div>');

         // $(".alert-success").delay(500).show(10, function()
         // {
         // $(this).delay(3000).hide(10, function() 
         //    {
         //    $(this).remove();
         //    location.reload();
         //    });
         // }); // /.alert
         	alert(data);
			location.reload();
            },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
            


          }); // /ajax
				} // if array validate is true
			} // /if field validate is true
			

}// /create order form function	


// function getProductData(row = null) {
// 	if(row) {
// 		var productId = $("#p_name1"+row).val();		
		
// 		if(productId == "") {
// 			$("#p_name1"+row).focus();
// 			$("#p_id"+row).val("");	
// 			$("#pname"+row).val("");
// 			$("#p_name1"+row).val("");	
// 			$("#p_price"+row).val("0");
// 			$("#stock"+row).val("0");
// 			$("#qty"+row).val("");						
// 			$("#stot"+row).val("0");
// 			$("#tot"+row).val("0");
// 			$("#sgst_amt"+row).val("0");
// 			$("#cgst_amt"+row).val("0");
// 			$("#sgst"+row).val("0");
// 			$("#cgst"+row).val("0");
// 			subAmount();

// 		} else {
// 			$.ajax({
// url : "<?php //echo site_url('Billing/fetchProductData')?>/" + productId,
// 				type: 'POST',
// 				data: {productId : productId},
// 				dataType: 'json',
// 				success:function(response) {
// 					// setting the rate value into the rate input field
					
					
// 					$("#p_id"+row).val(response.id);
// 					$("#pname"+row).val(response.p_name);
// 					$("#p_price"+row).val(response.s_price);
// 					$("#stock"+row).val(response.stock);
// 					$("#sgst"+row).val(response.sgst);
// 					$("#cgst"+row).val(response.cgst);
// 					// $("#sgst1"+row).html(response.sgst);
// 					// $("#cgst1"+row).html(response.cgst);

// 				if(response.stock != 0)
// 				{

// 				$("#qty"+row).val(1);

// 				var total = Number(response.s_price) * 1;
					
//      			total = total.toFixed(2);
// 				$("#stot"+row).val(total);
				

// 				var sgst1 = (total/100) * Number(response.sgst);
// 				sgst1 = sgst1.toFixed(2);
// 				$("#sgst_amt"+row).val(sgst1);

// 				var cgst1 = (total/100) * Number(response.cgst);
// 				cgst1 = cgst1.toFixed(2);
// 				$("#cgst_amt"+row).val(cgst1);


// 				var tot1=Number(total) + Number(sgst1) + Number(cgst1);
// 				tot1 = tot1.toFixed(2);
// 				$("#tot"+row).val(tot1);
			
// 					subAmount();
// 					$("#qty"+row).focus();
// 				}
// 				else
// 				{
					
// 					alert('No Stock Pls Choose Another Product');
// 					$("#p_name1"+row).focus();
// 					$("#tot"+row).val('0');
// 					$("#cgst_amt"+row).val('0');
// 					$("#sgst_amt"+row).val('0');
// 					$("#stot"+row).val('0');
// 					$("#qty"+row).val('');
// 					$("#p_id"+row).val('');
// 					$("#pname"+row).val('');
// 					$("#p_name1"+row).val('');
// 					$("#p_price"+row).val('0');
// 					$("#stock"+row).val('0');
// 					$("#sgst"+row).val('0');
// 					$("#cgst"+row).val('0');
// 				}
// 				} // /success
// 			}); // /ajax function to fetch the product data	
// 		}
				
// 	} else {
// 		alert('no row! please refresh the page');
// 	}
// } // /select on product data

// function getSupplierData()
// {
	
// 		var SupplierID = $("#cname1").val();		
		
// 		if(SupplierID == "") {
// 			$("#cname").val("");	
// 			$("#mobile").val("");
// 			$("#address").val("");
// 			$("#gstin").val("");
			

// 		} else {
// 			$.ajax({
// 			url : "<?php //echo site_url('Billing/fetchSupplierData')?>/" + SupplierID,
// 				type: 'POST',
// 				data: {SupplierID : SupplierID},
// 				dataType: 'json',
// 				success:function(response) {
// 					// setting the rate value into the rate input field
// 					$("#cname").val(response.name);	
// 					$("#mobile").val(response.mobile);
// 					$("#address").val(response.address);
// 					$("#gstin").val(response.gstin);
// 					// $("#sgst1"+row).html(response.sgst);
// 					// $("#cgst1"+row).html(response.cgst);


// 				} // /success
// 			}); // /ajax function to fetch the product data	
// 		}
				
	
// } // /select on product data



	
</script>

 <?php $this->load->view('includes/footer1');?>