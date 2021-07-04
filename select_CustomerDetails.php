<?php
require_once('connect.php');

$request = $_REQUEST;
$col = array(
  0   =>  'vendor',
  1   =>  'site_id',
  2   =>  'type',
  3   =>  'band',
  4   =>  'site_name',
  5   =>  'wp',
  6   =>  'status',
  7   =>  'remark',
  8   =>  'npa_config_status',
  9   =>  'cs_config_status',
  10   =>  'pcn_config_status',
  11   =>  'technology',
  12   =>  'activated_date',
  13   =>  'on_air'
);  //create column like table in database


$sql = "SELECT * FROM `sites` WHERE on_air='OnAir' ORDER BY `id`  DESC";
$query = mysqli_query($con, $sql);

$totalData = mysqli_num_rows($query);

$totalFilter = $totalData;

//Search
$sql = "SELECT * FROM sites WHERE 1=1 AND on_air='OnAir'";
if (!empty($request['search']['value'])) {
  $sql .= " AND (vendor Like '" . $request['search']['value'] . "%' ";
  $sql .= " OR site_id Like '" . $request['search']['value'] . "%' ";
  $sql .= " OR type Like '" . $request['search']['value'] . "%' ";
  $sql .= " OR site_name Like '" . $request['search']['value'] . "%' ";
  $sql .= " OR wp Like '" . $request['search']['value'] . "%' ";
  $sql .= " OR band Like '" . $request['search']['value'] . "%' )";
}

// (`id`, `siteID`, `siteName`, `supplyDate`, `startingBalance`, `noLitresPumped`, `currentMeter`, 
// `previousSupplyDate`, `previousMeter`, `dieselConsumption`, `runningHours`, `consumptionLH`, 
// `amountforDiesel`, `labourTransport`, `NBT`, `VAT`, `totalAmount`, `TPRate`, `runningDays`,
//  `invoiceNo`, `invoiceDate`, `invoicePdDate`, `remark`)
$query = mysqli_query($con, $sql);
$totalData = mysqli_num_rows($query);

//Order
$sql .= " ORDER BY " . $col[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " .
  $request['start'] . "  ," . $request['length'] . "  ";

$query = mysqli_query($con, $sql);

$data = array();

while ($row = mysqli_fetch_array($query)) {
  $subdata = array();
  $subdata[] = $row[5];
  $subdata[] = $row[2];
  $subdata[] = $row[3];
  $subdata[] = $row[4];
  $subdata[] = $row[6];
  $subdata[] = $row[7];
  $subdata[] = $row[8];
  $subdata[] = $row[12];
  $subdata[] = $row[16];
  $subdata[] = $row[20];
  $subdata[] = $row[26];
  $subdata[] = $row[28];
  // $subdata[] = $row[13];class='btn'
  $subdata[] = 
 '
 <a href="#my'.$row[0].'" data-toggle="modal"><i class="fas fa-tasks" style="font-size:20px;color:darkorange"></i></a>
 
 <div class="modal fade" id="my'.$row[0].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="" role="document" style="max-width: 1000px;margin: 1.75rem auto;">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Sites On-Air Full Details</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <a onclick="window.location.reload(true);"><span aria-hidden="true">×</span></a>
         </button>
       </div>
 
       <div id="my" class="modal-body">
         <h6 class="card-header py-3 font-weight-bold text-info" >Basic Site Details</h6>
         <div class="card-body">
           <div class="form-row">
             <div class="col-md-4">
               <label>Vendor :</label>
               <label><i>'.$row[5].'</i></label>
             </div>
             <div class="col-md-4">
               <label>Site ID :</label>
               <label>'.$row[2].'</i></label>
             </div>
             <div class="col-md-4">
               <label>Type :</label>
               <label><i>'.$row[3].'</i></label>
             </div>
           </div>
           <div class="form-row">
             <div class="col-md-4">
               <label>Band :</label>
               <label><i>'.$row[4].'</i></label>
             </div>
             <div class="col-md-4">
               <label>Site Name :</label>
               <label><i>'.$row[6].'</i></label>
             </div>
             <div class="col-md-4">
               <label>Date :</label>
               <label><i>'.$row[1].'</i></label>
             </div>
           </div>
		   <div class="form-row">
             <div class="col-md-4">
               <label>Work Description :</label>
               <label><i>'.$row[7].'</i></label>
             </div>
           </div>
         </div>

		 <h6 class="card-header py-3 font-weight-bold text-info">On-Air Details</h6>
         <div class="card-body">
           <div class="form-row">
           <div class="col-md-4">
               <label>On-Air :</label>
               <label><i>'.$row[26].'</i></label>
             </div>
             <div class="col-md-4">
               <label>Activated date :</label>
               <label><i>'.$row[28].'</i></label>
             </div>
             <div class="col-md-4">
               <label>Activated by :</label>
               <label><i>'.$row[29].'</i></label>
             </div>
           </div>

           <div class="form-row">
            <div class="col-md-4">
               <label>Activation Informed by :</label>
               <label><i>'.$row[25].'</i></label>
             </div>
           <div class="col-md-4">
             <label>On-Air remark :</label>
             <label><i>'.$row[27].'</i></label>
           </div>
           <div class="col-md-4">
               <label>SMS :</label>
               <label><i>'.$row[30].'</i></label>
           </div>
            
           </div>
         </div>
		 
         <h6 class="card-header py-3 font-weight-bold text-info">PAT Details</h6>
         <div class="card-body">
           <div class="form-row">
             <div class="col-md-4">
               <label>PAT status :</label>
               <label><i>'.$row[8].'</i></label>
             </div>
             <div class="col-md-4">
               <label>PAT remark :</label>
               <label><i>'.$row[9].'</i></label>
             </div>
             <div class="col-md-4">
               <label>PAT defined by :</label>
               <label><i>'.$row[10].'</i></label>
             </div>
           </div>
           <div class="form-row">
             <div class="col-md-4">
               <label>PAT defined date :</label>
               <label><i>'.$row[11].'</i></label>
             </div>
           </div>
         </div>

         <h6 class="card-header py-3 font-weight-bold text-info">NPA/Vendor Config Details</h6>
         <div class="card-body">
           <div class="form-row">
             <div class="col-md-4">
               <label>NPA/Vendor config status :</label>
               <label><i>'.$row[12].'</i></label>
             </div>
             <div class="col-md-4">
               <label>NPA/Vendor config remark :</label>
               <label><i>'.$row[13].'</i></label>
             </div>
             <div class="col-md-4">
               <label>NPA/Vendor config defined by :</label>
               <label><i>'.$row[14].'</i></label>
             </div>
           </div>

           <div class="form-row">
             <div class="col-md-4">
               <label>NPA config defined date :</label>
               <label><i>'.$row[15].'</i></label>
             </div>
           </div>
         </div>

         <h6 class="card-header py-3 font-weight-bold text-info">CS Config Details</h6>
         <div class="card-body">
           <div class="form-row">
             <div class="col-md-4">
               <label>CS config status :</label>
               <label><i>'.$row[16].'</i></label>
             </div>
             <div class="col-md-4">
               <label>CS config remark :</label>
               <label><i>'.$row[19].'</i></label>
             </div>
             <div class="col-md-4">
               <label>CS config defined by :</label>
               <label><i>'.$row[17].'</i></label>
             </div>
           </div>

           <div class="form-row">
             <div class="col-md-4">
               <label>CS config defined date :</label>
               <label><i>'.$row[18].'</i></label>
             </div>
           </div>
         </div>

         <h6 class="card-header py-3 font-weight-bold text-info">PCN Config Details</h6>
         <div class="card-body">
           <div class="form-row">
             <div class="col-md-4">
               <label>PCN config status :</label>
               <label><i>'.$row[20].'</i></label>
             </div>
             <div class="col-md-4">
               <label>PCN config remark :</label>
               <label><i>'.$row[23].'</i></label>
             </div>
             <div class="col-md-4">
               <label>PCN config defined by :</label>
               <label><i>'.$row[21].'</i></label>
             </div>
           </div>

           <div class="form-row">
             <div class="col-md-4">
               <label>PCN config defined date :</label>
               <label><i>'.$row[22].'</i></label>
             </div>
           </div>
         </div>

         



       </div>
 
 
 
     </div>
   </div>
 </div>
';
  $data[] = $subdata;
}

$json_data = array(
  "draw"              =>  intval($request['draw']),
  "recordsTotal"      =>  intval($totalData),
  "recordsFiltered"   =>  intval($totalFilter),
  "data"              =>  $data
);

echo json_encode($json_data);
