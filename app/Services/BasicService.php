<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Transaction;
use Image;

class BasicService
{
    public function validateImage(object $getImage, string $path)
    {
        if ($getImage->getClientOriginalExtension() == 'jpg' or $getImage->getClientOriginalName() == 'jpeg' or $getImage->getClientOriginalName() == 'png') {
            $image = uniqid() . '.' . $getImage->getClientOriginalExtension();
        } else {
            $image = uniqid() . '.jpg';
        }
        Image::make($getImage->getRealPath())->resize(300, 250)->save($path . $image);
        return $image;
    }

    public function validateDate(string $date)
    {
        if (preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2,4}$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateKeyword(string $search,string $keyword)
    {
       return preg_match('~' . preg_quote($search, '~') . '~i', $keyword);
    }

    public function prepareOrderUpgradation($order)
    {
        $orderObj = new OrderRepository();
        if($orderObj instanceof OrderRepository){
            $prepareOrderData = [
                'user_id' => $order->user_id,
                'amount' => $order->amount,
                'type' => '+',
                'remarks' => OrderRepository::TRXORDER,
            ];
            $prepareOrderData = (object) $prepareOrderData;
            $trxObj = new Transaction();
            $res = $orderObj->orderPaymentUpdate($order, $trxObj, $prepareOrderData);
            return $res;
        }
    }
}
