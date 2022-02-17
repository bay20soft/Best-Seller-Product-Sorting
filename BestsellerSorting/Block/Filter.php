<?php
namespace Bay20\BestsellerSorting\Block;

use Magento\Catalog\Block\Product\ProductList\Toolbar;
 
class Filter extends Toolbar
{
     public function setCollection($collection)
        {
        $currentOrder = $this->getCurrentOrder();
		$currentDirection = $this->getCurrentDirection();
		 $direction= 'desc';
         $table = $collection->getTable('sales_order_item');

		if ($currentDirection == 'asc') {
			$direction = 'desc';
		}
		$collection->getSize();
			if($currentOrder=='best_seller'){
			$collection->getSelect()->joinLeft( 
                    $table, 
                    'e.entity_id ='.$table.'.product_id', 
                    array('qty_ordered'=>'SUM('.$table.'.qty_ordered)')) 
                    ->group('e.entity_id') 
                    ->order('qty_ordered '.$direction);
        
		}
            $this->_collection = $collection;
            $this->_collection->setCurPage($this->getCurrentPage());
            $limit = (int)$this->getLimit();
            if ($limit) {
                $this->_collection->setPageSize($limit);
            }
            if ($currentOrder) {
                $this->_collection->setOrder($currentOrder,$currentDirection);
            }
            return $this;
	}
}