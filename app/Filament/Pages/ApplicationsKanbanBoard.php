<?php

namespace App\Filament\Pages;

use App\Enums\ApplicationStatus;
use App\Models\Application;
use Mokhosh\FilamentKanban\Pages\KanbanBoard;

class ApplicationsKanbanBoard extends KanbanBoard
{
    protected static string $model = Application::class;
    protected static string $statusEnum = ApplicationStatus::class;

    protected static string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Arizalar Kanban Taxtasi';
}
