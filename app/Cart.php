<?php

namespace App;

class Cart 
{	
    public $items = null;  // will hold the individual products in groups
    public $totalQty = 0;
    public $totalPrice = 0; 

    public function __construct($oldCart)
    {
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
    }

    public function add($item, $id)
    {		
		// configure the items to identified the data
		$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];

		// check if we already have an items
		if($this->items){
				// check if items already exists in the array
    			if(array_key_exists($id, $this->items)){
    					// stored in the array or override it, to keep the same item
    					$storedItem = $this->items[$id];
    			}
		}

		$storedItem['qty']++;
		$storedItem['price'] = $item->price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty++;
		$this->totalPrice += $item->price;
    }

    public function reduceByOne($id)
    {
			// dd($id);
			$this->items[$id]['qty']--;
			$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
			$this->totalQty--;
			$this->totalPrice -= $this->items[$id]['item']['price'];

			// check if reduce by 0 and remove the item
			if($this->items[$id]['qty'] <= 0){
					unset($this->items[$id]);
			}
    }

    // public function removeItem($id)
    // {	
    // 	 	$this->totalQty -= $this->items[$id]['qty'];
    // 		$this->totalPrice -= $this->items[$id]['price'];
    // 		unset($this->items[$id]);
    // }
}
 