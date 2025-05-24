<?php

namespace App\Filament\Resources\ApplicationResource\Widgets;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ApplicationOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Yangi', Application::query()->where('status', ApplicationStatus::NEW)->count()),
            Stat::make('Qo\'ng\'iroq qilingan', Application::query()->where('status', ApplicationStatus::CALLED)->count()),
            Stat::make('Bekor qilingan', Application::query()->where('status', ApplicationStatus::CANCELLED)->count()),
        ];
    }
}
