<?php

namespace App\Filament\Widgets;

use App\Models\StarterPack;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class StarterPacksChart extends ChartWidget
{
    protected static ?string $heading = 'Starter Packs Applications';
    
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = $this->getStarterPacksPerMonth();
        
        return [
            'datasets' => [
                [
                    'label' => 'Starter Pack Applications',
                    'data' => $data['data'],
                    'backgroundColor' => '#CC833D',
                    'borderColor' => '#CC833D',
                    'fill' => false,
                    'tension' => 0.1,
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getStarterPacksPerMonth(): array
    {
        $months = [];
        $data = [];

        // Get data for last 12 months
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M Y');
            
            $count = StarterPack::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
                
            $data[] = $count;
        }

        return [
            'labels' => $months,
            'data' => $data,
        ];
    }
} 