<?php
echo "<pre>";
print_r($this->table_head);
echo "</pre>";
?>
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="table-responsive">
              <table class="table table-bordered" id="share_list"  style="width:100%">
                <thead class="thead-light">
                  <tr>
					<th scope="col">Sr No</th>
					<?php foreach($this->table_head as $value){
						echo "<th  scope='col'>$value</th>";
					} ?>
					</tr>				  
                  </tr>
                </thead>
                <tbody>
				<?php
				$c = 1;
				foreach($this->data as $rows){ 
				$price_h_l 	= 	explode('/',$rows['52_week_h_l']);
				$price_h 	=	trim(str_replace(',', '', $price_h_l[0]));
				$price_l 	=	trim(str_replace(',', '', $price_h_l[1]));
				$price 		=	trim(str_replace(',', '', $rows['price']));
				$cdiff 	= ($price_h !='' ? $price_h:0) - ($price !='' ? $price:0 );
				$diff 	= ($price_h !='' ? $price_h:0) - ($price_l !='' ? $price_l:0 );
				$rank = '';
				if($price_h) {
					$rank = (($price*100)/$price_h); 
				}
				if($price_h && $price && $price_l) { 
				?>
				<tr>
				<th scope="row"><?php echo $c++;?></th>
				<td><?php echo $rows['company'];?></td>
				<td><?php echo $price;?></td>
				<td><span class="text-<?php echo floatval($rows['change']) > 0 ? 'success mr-3':'warning mr-3';?>"><i class="fa fa-arrow-<?php echo floatval($rows['change']) > 0 ? 'up':'down';?>"></i> <?php echo $rows['change'];?></span></td>
				<td><?php echo $rows['volume'];?></td>
				<td><?php echo $rows['day_h_l'];?></td>
				<td><?php echo $price_h.'/'.$price_l;?></td>
				<td><?php echo round($rank,2);?></td>
				<td><?php echo $diff;?></td>
				<td><?php echo $cdiff;?></td>
				</tr>
				<?php } } ?>				
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>