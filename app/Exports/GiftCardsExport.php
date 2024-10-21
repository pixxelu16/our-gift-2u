<?php

namespace App\Exports;

use App\Models\PurchagedGiftCard;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class GiftCardsExport implements FromCollection, WithHeadings
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        $login_user_id = auth()->user()->id;
        $purchasedGiftCard = PurchagedGiftCard::where('id', $this->id)
            ->where('company_id', $login_user_id)
            ->with('coupon_code_list')
            ->first();

        $data = new Collection();

        if ($purchasedGiftCard && $purchasedGiftCard->coupon_code_list) {
            foreach ($purchasedGiftCard->coupon_code_list as $coupon) {
                $data->push([
                    'code' => $coupon->code,
                    'price' => $coupon->price,
                    'expire_date' => $coupon->expire_date,
                ]);
            }
        }

        return $data;
    }

    public function headings(): array
    {
        return [
            'Coupon Code',
            'Price',
            'Expire Date',
        ];
    }
}

