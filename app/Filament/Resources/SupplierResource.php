<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Supplier;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SupplierResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SupplierResource\RelationManagers;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationGroup = 'General';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(60),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('street')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('city')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('post_code')
                    ->required()
                    ->maxLength(12),
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('company_code')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Split::make([
                    Tables\Columns\TextColumn::make('id'),
                    Tables\Columns\TextColumn::make('status'),
                    Stack::make([
                        Tables\Columns\TextColumn::make('name')
                        ->weight('bold')
                        ->sortable()
                        ->searchable(),
                        Tables\Columns\TextColumn::make('company_code')
                        ->sortable()
                        ->searchable(),
                    ])->space(1),
                    Stack::make([
                        Tables\Columns\TextColumn::make('email')
                        ->sortable()
                        ->searchable()
                        ->copyable()
                        ->copyMessage('Email address copied')
                        ->copyMessageDuration(1500),
                        Tables\Columns\TextColumn::make('phone'),
                    ])->space(1),
                    Stack::make([
                        Tables\Columns\TextColumn::make('street'),
                        Tables\Columns\TextColumn::make('city'),
                        Tables\Columns\TextColumn::make('post_code'),
                        Tables\Columns\TextColumn::make('country'),
                    ])->space(1),

                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }


}
