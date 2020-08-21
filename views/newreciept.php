
<?php
include("configuratioon/config.php"); 
$lid = lastid("id","recipts");
$no = $lid[0]['max(id)']+1098;
$no = str_pad($no + 1, 4, 0, STR_PAD_LEFT);
$rno = "AP".$no;
?>
<form action="" method="POST" id="repiectcreation">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Receipt No</label>
                                                <input type="text" class="form-control" name="v1" value="<?php echo $rno; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="text" class="form-control" name="v2" value="<?php echo date("d-m-Y"); ?>" >
                                            </div>
                                        </div>
										<div class="col-md-4">
                                            <div class="form-group">
                                                <label>Site Number</label>
                                                <input type="text" class="form-control" name="v25" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
											<input type="hidden" id="setsiteno"/>
                                                <label>Project Name</label>
													<select name="v3" id="projectnameid" class="form-control dropdown">
														<option>select</option>
														<?php
														$sql2 = "select * from projects";
														$dat = runQuery2($sql2);
														$n = sizeof($dat);
														for($i=0;$i<$n;$i++){
															echo "<option data-optionval='".$dat[$i]['pname']."'>".$dat[$i]['pname']."</option>";
														}
														?>
													</select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BDM Name</label>
                                                       <select name="v5" class="form-control dropdown">
														<option>select</option>
															<?php
															$sql2 = "select * from 	managers";
															$dat = runQuery2($sql2);
															$n = sizeof($dat);
															for($i=0;$i<$n;$i++){
																echo "<option>".$dat[$i]['name']."</option>";
															}
															?>
												</select>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BDE Name</label>
                                                <select name="v6" class="form-control dropdown">
														<option>select</option>
														<?php
														$sql2 = "select * from 	bde";
														$dat = runQuery2($sql2);
														$n = sizeof($dat);
														for($i=0;$i<$n;$i++){
															echo "<option>".$dat[$i]['name']."</option>";
														}
														?>
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" placeholder="Customer Name" name="v4">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment mode</label>
                                                <select name="v7" class="form-control dropdown">
													<option>select</option>
													<option>Cash</option>
													<option>Card</option>
													<option>Cheque</option>
													<option>DD</option>
													<option>NEFT</option>
												</select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" >
                                                <label>Chq/ card number</label>
												<select name="v8" class="form-control dropdown">
													<option>select</option>
													<option>Cheque</option>
													<option>Card</option>
													<option>DD</option>
													<option>Cash</option>
													<option>NEFT</option>
												</select>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group" >
											<label>&nbsp;</label>
                                               <input type="text" class="form-control" name="v15" value="" placeholder="Number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Amout</label>
                                                <input type="text" class="form-control" placeholder="Amount" name="v9" onblur="set(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>INR</label>
                                                <input type="text" class="form-control" placeholder="Amount" id="rupee" name="v10" style="text-transform: capitalize;" >
												<input type="hidden" id="rupee1" name="v10">
										   </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Remarks</label>
                                                <textarea rows="5" class="form-control" name="v17" placeholder="Here can be your description" value="Mike"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-info btn-fill pull-right" name="actionbutton" id="btnactionbutton">Submit</button>
                                    <div class="clearfix"></div>
                                </form>
<script>
	function set(val){
	document.getElementById("rupee").value=inWords(val.value);
	document.getElementById("rupee1").value=inWords(val.value);
}
</script>