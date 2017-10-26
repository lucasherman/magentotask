<?php

/**
 * Created by PhpStorm.
 * User: lherman
 * Date: 26.10.17
 * Time: 13:44
 */
class Sofomo_Customer_Model_Observer
{
    public function hookToSalesQuoteCollectTotalsBefore($observer)
    {
        $quote = $observer->getEvent()->getQuote();
//        var_dump($quote->getAppliedRuleIds());
//        var_dump($quote->getCustomer());
        $total = $quote->getBaseSubtotal();


        $quote->setAppliedRuleIds('');;
        $quote->setBaseGrandTotal(123);
        $discountAmount = 0;
        $quote->setGrandTotal($quote->getBaseSubtotal()-$discountAmount)
            ->setBaseGrandTotal($quote->getBaseSubtotal()-$discountAmount)
            ->setSubtotalWithDiscount($quote->getBaseSubtotal()-$discountAmount)
            ->setBaseSubtotalWithDiscount($quote->getBaseSubtotal()-$discountAmount)
            ->save();
        $quote->save();
        foreach($quote->getAllItems() as $item){
//            $rat=$item->getPriceInclTax()/$total;
//            $ratdisc=$discountAmount*$rat;
//            $item->setDiscountAmount(($item->getDiscountAmount()+$ratdisc) * $item->getQty());
//            $item->setBaseDiscountAmount(($item->getBaseDiscountAmount()+$ratdisc) * $item->getQty())->save();
              $item->setDiscountAmount(0);
        }
    }

    public function hookToSalesQuoteCollectTotalsAfter($observer)
    {
//        $quote = $observer->getEvent()->getQuote();
//        var_dump($quote->getAppliedRuleIds());
////        var_dump($quote->getCustomer());
//        $total = $quote->getBaseSubtotal();
//
//
//        $quote->setAppliedRuleIds('');;
//        $quote->setBaseGrandTotal(123);
//        var_dump($quote->getGrandTotal());
//        $quote->getSubtotalWithDiscount();
//        $discountAmount = 0;
//        $quote->save();
//        foreach($quote->getAllItems() as $item){
//            $rat=$item->getPriceInclTax()/$total;
//            $ratdisc=$discountAmount*$rat;
//            $item->setDiscountAmount(($item->getDiscountAmount()+$ratdisc) * $item->getQty());
//            $item->setBaseDiscountAmount(($item->getBaseDiscountAmount()+$ratdisc) * $item->getQty())->save();
//        }
    }
}