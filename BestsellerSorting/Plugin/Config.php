<?php
namespace Bay20\BestsellerSorting\Plugin;

use Magento\Catalog\Model\Config as MagentoConfig;


class Config
{
	const BEST_SELLER_SORT_BY = 'best_seller';
	/**
	 * Adding new sort option
	 *
	 * @param \Magento\Catalog\Model\Config $catalogConfig
	 * @param [] $result
	 * @return []
	 */
	public function afterGetAttributeUsedForSortByArray(MagentoConfig $subject, $result)
	{
		/*$result = array_reverse($result);
		$result[self::BEST_SELLER_SORT_BY] = __('Best Seller');
		$result = array_reverse($result);
		return $result;*/
		$results=[self::BEST_SELLER_SORT_BY=>__('Best Seller')];
		return $results+$result;
	}
}