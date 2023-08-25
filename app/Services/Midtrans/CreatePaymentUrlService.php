<?php

namespace App\Services\Midtrans;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Midtrans\Snap;

class CreatePaymentUrlService extends Midtrans
{
    protected $order;

    public function __construct()
    {
        parent::__construct();
        // $this->order = $order;
    }

    public function getPaymentUrl($order)
    {

        $item_details = new Collection();

        foreach ($order->orderItems as $item) {
            $product = Product::find($item->product_id);
            $item_details->push([
                'id' => $product->id,
                'price' => $product->price,
                'quantity' => $item->quantity,
                'name' => $product->name,
            ]);
        }

        $params = [
            'transaction_details' => [
                'order_id' => $order->number,
                'gross_amount' => $order->total_price,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $order->user->name,
                'email' => $order->user->email,

            ]
        ];

        $paymentUrl = Snap::createTransaction($params)->redirect_url;

        return $paymentUrl;
    }
}
