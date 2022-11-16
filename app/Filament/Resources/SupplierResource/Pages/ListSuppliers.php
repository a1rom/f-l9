<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use Closure;
use Filament\Pages\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SupplierResource;

class ListSuppliers extends ListRecords
{
    protected static string $resource = SupplierResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableRecordClassesUsing(): ?Closure
    {
        return fn (Model $record) => match ($record->status) {
            'n' => 'opacity-30',
            0 => [
                'border-l-2 border-orange-600',
                'dark:border-orange-300' => config('tables.dark_mode'),
            ],
            1 => 'border-l-2 border-green-600',
            default => null,
        };
    }
}
