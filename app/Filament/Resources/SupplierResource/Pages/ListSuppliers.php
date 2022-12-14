<?php

namespace App\Filament\Resources\SupplierResource\Pages;

use Closure;
use Filament\Pages\Actions;
use Filament\Tables\Filters\Layout;
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
            0 => 'opacity-25',
            default => null,
        };
    }
}
