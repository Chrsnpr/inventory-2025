<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Item;
use Filament\Widgets\ChartWidget;

class ItemChart extends ChartWidget
{
    protected static ?string $heading = 'Item Stock vs Price Chart';

    protected function getType(): string
    {
        return 'bubble';
    }

    protected function getData(): array
    {
        $bubbles = Item::all()->map(function ($item) {
            return [
                'x' => $item->price,
                'y' => $item->stock,
                'r' => max(5, min(20, $item->stock / 5)), // radius minimal 5, maksimal 20
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Item Stock vs Price',
                    'data' => $bubbles,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.5)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
}
