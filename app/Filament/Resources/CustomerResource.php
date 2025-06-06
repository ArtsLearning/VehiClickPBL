<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
// use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $slug = 'users';

    public static ?string $label = 'Users';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // TextInput::make('username')
                //     ->required()
                //     ->label('Username')
                //     ->placeholder('Masukkan Username'),
                // TextInput::make('nama_customer')
                //     ->required()
                //     ->label('Nama')
                //     ->placeholder('Masukkan Nama'),
                // TextInput::make('email_customer')
                //     ->required()
                //     ->label('Email')
                //     ->placeholder('Masukkan Email'),
                // TextInput::make('telepon')
                //     ->required()
                //     ->label('Nomor Telepon')
                //     ->placeholder('Masukkan Nomor Telepon')
                //     ->numeric(),
                // TextInput::make('alamat')
                //     ->required()
                //     ->label('Alamat')
                //     ->placeholder('Masukkan Alamat'),
                // FileUpload::make('foto_customer')
                //     ->label('Foto Customer')
                //     ->visibility('public')
                //     ->directory('foto_customer') // folder di storage/app/public/foto-barang
                //     ->image() // memastikan hanya gambar
                //     ->imageEditor() // editor crop bawaan
                //     ->downloadable()
                //     ->previewable(), 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->searchable(),
                TextColumn::make('nama_customer')
                    ->label('Nama'),
                TextColumn::make('email_customer')
                    ->label('Email'),
                TextColumn::make('telepon')
                    ->label('Nomor Telepon'),
                TextColumn::make('alamat'),
                ImageColumn::make('foto_customer')
                    ->label('Foto')
                    ->disk('public')
                    ->size(100),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}