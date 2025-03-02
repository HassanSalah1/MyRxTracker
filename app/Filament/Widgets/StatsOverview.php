<?php

namespace App\Filament\Widgets;


use App\Enums\Roles;
use App\Models\Doctor;
use App\Models\OnTrackPack;
use App\Models\StarterPack;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Doctors', Doctor::count())
                ->description('Total doctors count')
                ->color('primary')
                ->icon('heroicon-o-user'),
            Stat::make('Patient', User::whereRole(Roles::USER)->count())
                ->description('Total Patient count')
                ->color('primary')
                ->icon('heroicon-o-user'),
        ];
    }
}
