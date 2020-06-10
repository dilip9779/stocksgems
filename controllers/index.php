<?php
class Index extends Controller
{
    function __construct() {
       parent::__construct();
	   libxml_use_internal_errors(true);
    }
    function Index()
    {
		$htmlContent = file_get_contents(SHARE_API);	
		$DOM = new DOMDocument();
		$DOM->loadHTML($htmlContent);
		$Header = $DOM->getElementsByTagName('th');
		$Detail = $DOM->getElementsByTagName('td');
		foreach($Header as $NodeHeader) 
		{
			$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
		}
		$aDataTableHeaderHTML[6] = "Average Rank";
		$aDataTableHeaderHTML[7] = "Hight Differnt";
		$aDataTableHeaderHTML[8] = "Current Differnt";
		$i = 1;
		foreach($Detail as $NodeDetail) 
		{
			$datac = str_replace(' ', '', trim($NodeDetail->textContent));
			if($i > 46)
			{
				$aDataTableDetailHTML[] = $datac;
			}
			$i++;	
		}
		$data = array();
		$j = 0;
		for($i=0;$i < count($aDataTableDetailHTML) - 1;$i+=7)
		{
			if($j == 0){
				$sensexprice = $aDataTableDetailHTML[$i+1];
				$sensexchange = $aDataTableDetailHTML[$i+2];
			}
			if($j == 1){
				$niftyprice = $aDataTableDetailHTML[$i+1];
				$niftychange = $aDataTableDetailHTML[$i+2];
			}		
			$data[$j]['company'] = $aDataTableDetailHTML[$i];
			$data[$j]['price'] = $aDataTableDetailHTML[$i+1];
			$data[$j]['change'] = $aDataTableDetailHTML[$i+2];
			$data[$j]['volume'] = $aDataTableDetailHTML[$i+3];
			$data[$j]['day_h_l'] = $aDataTableDetailHTML[$i+4];
			$data[$j]['52_week_h_l'] = $aDataTableDetailHTML[$i+5];
			$j++;    
		}
        $this->view->sensexprice =	$sensexprice;	
        $this->view->sensexchange =	$sensexchange;	
        $this->view->niftyprice =	$niftyprice;	
        $this->view->niftychange =	$niftychange;	
        $this->view->data =	$data;	
        $this->view->table_head =	$aDataTableHeaderHTML;	
        $this->view->render('index/index');
    }
    function globalmarket()
    {
		$htmlContent = file_get_contents('https://economictimes.indiatimes.com/markets/stocks/stock-screener/GARP');	
		$DOM = new DOMDocument();
		$DOM->loadHTML($htmlContent);
		$Detail = $DOM->getElementsByTagName('td'); 
		$i = 1;
		foreach($Detail as $NodeDetail) 
		{
			$datac = str_replace(' ', '', trim($NodeDetail->textContent));
			$aDataTableDetailHTML[] = $datac;
	
		}
	
        $this->view->table_head =	$aDataTableDetailHTML;
        $this->view->render('index/global_indices');
    }	
} ?>