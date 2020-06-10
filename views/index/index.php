<div class="header bg-primary pb-6">
  <div class="container-fluid">
	<div class="header-body">
	  <div class="row">
		<div class="col-xl-3 col-md-6">
		  <div class="card card-stats">
			<div class="card-body">
			  <div class="row">
				<div class="col">
				  <h5 class="card-title text-uppercase text-muted mb-0">S&PBSESENSEX </h5>
				  <span class="h2 font-weight-bold mb-0"><?php echo $this->sensexprice;?></span>
				</div>
				<div class="col-auto">
				  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
					<i class="ni ni-active-40"></i>
				  </div>
				</div>
			  </div>
			  <p class="mt-3 mb-0 text-sm">
				<span class="text-<?php echo floatval($this->sensexchange) > 0 ? 'success mr-3':'warning mr-3';?>"><i class="fa fa-arrow-<?php echo floatval($this->sensexchange) > 0 ? 'up':'down';?>"></i> <?php echo $this->sensexchange;?></span>			  
				<span class="text-nowrap">Since last</span>
			  </p>
			</div>
		  </div>
		</div>
		<div class="col-xl-3 col-md-6">
		  <div class="card card-stats">
			<div class="card-body">
			  <div class="row">
				<div class="col">
				  <h5 class="card-title text-uppercase text-muted mb-0">	NIFTY50</h5>
				  <span class="h2 font-weight-bold mb-0"><?php echo $this->niftyprice;?></span>
				</div>
				<div class="col-auto">
				  <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
					<i class="ni ni-chart-pie-35"></i>
				  </div>
				</div>
			  </div>
			  <p class="mt-3 mb-0 text-sm">
				<span class="text-<?php echo floatval($this->niftychange) > 0 ? 'success mr-3':'warning mr-3';?>"><i class="fa fa-arrow-<?php echo floatval($this->niftychange) > 0 ? 'up':'down';?>"></i> <?php echo $this->niftychange;?></span>
				<span class="text-nowrap">Since last</span>
			  </p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
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