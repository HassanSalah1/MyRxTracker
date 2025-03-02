<?php

namespace App\Filament\Widgets;


use App\Enums\Roles;
use App\Models\Doctor;
use App\Models\OnTrackPack;
use App\Models\StarterPack;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PacksStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Starter Packs', StarterPack::count())
                ->description('Total starter packs count')
                ->color('primary')
                ->icon('heroicon-o-cube'),
            Stat::make('On Track Packs', OnTrackPack::count())
                ->description('Total ontrack packs count')
                ->color('primary')
                ->icon('heroicon-o-cube'),
            Stat::make('Redeeming Packs', OnTrackPack::count())
                ->description('Total Redeeming packs count')
                ->color('primary')
                ->icon('heroicon-o-cube'),
        ];
    }
}
