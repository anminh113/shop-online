<?php

namespace App;
use App\Http\Controllers\PageController;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
	public function add($id, $sl, $time){
		$client = new \GuzzleHttp\Client();
		$res = $client->request('GET',PageController::getUrl('products/'.$id.'') );
        $data = json_decode($res->getBody()->getContents(), true);
		// dd($data['product']);

		$resimg = $client->request('GET',PageController::getUrl('productimages/product/'.$id.''));
        $dataimg = json_decode($resimg->getBody()->getContents(), true);
		
		if(empty($data['product']['saleOff']) || $data['product']['saleOff']['dateEnd'] < $time)
		{
			$giohang = ['qty'=>0, 'price' => $data['product']['price'], 'item' => $data['product'] , 'img' => $dataimg['imageList'][0]['imageURL']];
		}else if(!empty($data['product']['saleOff']) || $data['product']['saleOff']['dateEnd'] > $time)
		{
			$giohang = ['qty'=>0, 'price' => ($data['product']['price']-($data['product']['price'] * $data['product']['saleOff']['discount']/100)), 'item' => $data['product'] , 'img' => $dataimg['imageList'][0]['imageURL']];
		}
		else{
			$giohang = ['qty'=>0, 'price' => $data['product']['price'], 'item' => $data['product'] , 'img' => $dataimg['imageList'][0]['imageURL']];
		}
		// dd($this->items);
		if($this->items){
			if(array_key_exists($data['product']['_id'], $this->items)){
				$giohang = $this->items[$data['product']['_id']];
			}
		}

		$giohang['qty'] += $sl;

		if(empty($data['product']['saleOff']) || $data['product']['saleOff']['dateEnd'] < $time){
			$giohang['price'] = $data['product']['price'] ;
		}else if(!empty($data['product']['saleOff']) || $data['product']['saleOff']['dateEnd'] > $time){
			$giohang['price'] = ($data['product']['price']-($data['product']['price'] * $data['product']['saleOff']['discount']/100)) ;
		}
		else{
			$giohang['price'] = $data['product']['price'] ;
		}

		$this->items[$id] = $giohang;

		$this->totalQty += $sl;

		if(empty($data['product']['saleOff']) || $data['product']['saleOff']['dateEnd'] < $time){
			$this->totalPrice += $data['product']['price'] * $sl;
		}else if(!empty($data['product']['saleOff']) && $data['product']['saleOff']['dateEnd'] > $time){
			$this->totalPrice += ($data['product']['price']-($data['product']['price'] * $data['product']['saleOff']['discount']/100)) * $sl;
		}
		else{
			$this->totalPrice += $data['product']['price'] * $sl;
		}



	}
	// public function add($item, $id, $sl, $img, $time){
		
	// 	if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] < $time)
	// 	{
	// 		$giohang = ['qty'=>0, 'price' => $item['price'], 'item' => $item , 'img' => $img];
	// 	}else if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time)
	// 	{
	// 		$giohang = ['qty'=>0, 'price' => ($item['price']-($item['price'] * $item['saleOff']['discount']/100)), 'item' => $item , 'img' => $img];
	// 	}
	// 	else{
	// 		$giohang = ['qty'=>0, 'price' => $item['price'], 'item' => $item , 'img' => $img];
	// 	}

	// 	if($this->items){
	// 		if(array_key_exists($id, $this->items)){
	// 			$giohang = $this->items[$id];
	// 		}
	// 	}

	// 	$giohang['qty']+= $sl;

	// 	if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] < $time){
	// 		$giohang['price'] = $item['price'] * $giohang['qty'];
	// 	}else if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time){
	// 		$giohang['price'] = ($item['price']-($item['price'] * $item['saleOff']['discount']/100)) * $giohang['qty'];
	// 	}
	// 	else{
	// 		$giohang['price'] = $item['price'] * $giohang['qty'];
	// 	}

	// 	$this->items[$id] = $giohang;

	// 	$this->totalQty+= $sl;

	// 	if(empty($item['saleOff']) || $item['saleOff']['dateEnd'] < $time){
	// 		$this->totalPrice += $item['price'];
	// 	}else if(!empty($item['saleOff']) && $item['saleOff']['dateEnd'] > $time){
	// 		$this->totalPrice += $item['price']-($item['price'] * $item['saleOff']['discount']/100);
	// 	}
	// 	else{
	// 		$this->totalPrice += $item['price'];
	// 	}

		
	// }
	//xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
