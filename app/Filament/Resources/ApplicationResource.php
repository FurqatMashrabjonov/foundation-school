<?php

namespace App\Filament\Resources;

use App\Enums\ApplicationStatus;
use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationLabel = 'Arizalar';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->orderBy('created_at', 'desc');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options(\App\Enums\ApplicationStatus::toSelectArray())
                    ->required(),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->label('ID'),
                TextColumn::make('name')
                    ->sortable()
                    ->searchable()
                    ->label('F.I.O'),
                TextColumn::make('phone')
                    ->sortable()
                    ->searchable()
                    ->label('Telefon raqami'),
                TextColumn::make('course_type')
                    ->sortable()
                    ->searchable()
                    ->label('Kurs turi'),
                TextColumn::make('status')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'primary',
                        'called' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->label('Status'),
                TextColumn::make('created_at')
                    ->since()
                    ->sortable()
                    ->label('Yaratilgan vaqt'),
            ])->filters([
                //
            ])->headerActions([
                //
            ])->actions([
                //
            ])->bulkActions([
                //
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(ApplicationStatus::toSelectArray())
                    ->label('Status'),
                //filter by created_at from and to
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Boshlanish sanasi'),
                        Forms\Components\DatePicker::make('created_until')->label('Tugash sanasi'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'], fn ($q) => $q->whereDate('created_at', '>=', $data['created_from']))
                            ->when($data['created_until'], fn ($q) => $q->whereDate('created_at', '<=', $data['created_until']));
                    })
                    ->label('Yaratilgan sana'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
//            'create' => Pages\CreateApplication::route('/create'),
//            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}
