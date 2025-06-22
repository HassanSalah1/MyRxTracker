<?php

namespace App\Filament\Widgets;

use App\Enums\Roles;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class PatientSignupsChart extends ChartWidget
{
    protected static ?string $heading = 'Patient Signups';
    
    protected static ?int $sort = 2;
    
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $data = $this->getPatientSignupsPerMonth();
        
        return [
            'datasets' => [
                [
                    'label' => 'Patient Signups',
                    'data' => $data['data'],
                    'backgroundColor' => '#553782',
                    'borderColor' => '#553782',
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

    private function getPatientSignupsPerMonth(): array
    {
        $months = [];
        $data = [];

        // Get data for last 12 months
        for ($i = 11; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M Y');
            
            $count = User::whereRole(Roles::USER)
                ->whereYear('created_at', $month->year)
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