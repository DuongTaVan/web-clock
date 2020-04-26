<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class WarehouseExport implements FromCollection, WithHeadings
{

	private $warehoses;


    public function __construct($warehoses)
    {
        $this->warehoses = $warehoses;

       // dd($warehoses);
    }
    public function collection()
    {
        $warehoses = $this->warehoses;
        //dd($warehoses);
    // }
        $formatWarehoses = [];
        foreach ($warehoses as $key => $item) {
            $formatWarehoses[] = [
                'id'      => $item->id,
                'pro_name' =>$item->pro_name,
	            'pro_slug' =>$item->pro_slug,
	            'pro_price' =>$item->pro_price,
	            'pro_price_entry' =>$item->pro_price_entry,
	            'pro_category_id' =>$item->pro_category_id,
	            'pro_admin_id' =>$item->pro_admin_id,
	            'pro_sale' =>$item->pro_sale,
	            'pro_avatar' =>$item->pro_avatar,
	            'pro_view' =>$item->pro_view,
	            'pro_hot' =>$item->pro_hot,
	            'pro_active' =>$item->pro_active,
	            'pro_pay' =>$item->pro_pay,
	            'pro_description' =>$item->pro_description,
	            'pro_content' =>$item->pro_content,
	            'pro_review_total' =>$item->pro_review_total,
	            'pro_review_star' =>$item->pro_review_star,
	            'created_at' =>$item->created_at,
	            'pro_number' =>$item->pro_number,
	            'pro_resistant' =>$item->pro_resistant,
	            'pro_energy' =>$item->pro_energy,
	            'pro_country' =>$item->pro_country,
	            'updated_at' =>$item->updated_at,
            ];
        }

        return collect($formatWarehoses);
    }
    public function headings(): array
    {
        return [
            '#',
            'pro_name',
            'pro_slug',
            'pro_price',
            'pro_price_entry',
            'pro_category_id',
            'pro_admin_id',
            'pro_sale',
            'pro_avatar',
            'pro_view',
            'pro_hot',
            'pro_active',
            'pro_pay',
            'pro_description',
            'pro_content',
            'pro_review_total',
            'pro_review_star',
            'created_at',
            'pro_number',
            'pro_resistant',
            'pro_energy',
            'pro_country',
            'updated_at',

        ];
    }
}
