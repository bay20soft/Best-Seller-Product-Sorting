<?php
namespace Bay20\BestsellerSorting\Block;

use Magento\Catalog\Model\Config\Source\ListSort;

class Defaultconfig extends ListSort
{
	public function toOptionArray()
	{
		$options = [];
		$options[] = ['label' => __('Best Seller'), 'value' => 'best_seller'];
        $options[] = ['label' => __('Position'), 'value' => 'position'];
        foreach ($this->_getCatalogConfig()->getAttributesUsedForSortBy() as $attribute) {
            $options[] = ['label' => __($attribute['frontend_label']), 'value' => $attribute['attribute_code']];
        }
        return $options;
	}
}