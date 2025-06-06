<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Produk';

    protected static ?string $navigationLabel = 'Product';

    protected static ?string $slug = 'products';

    public static ?string $label = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->required()
                    ->label('Nama Barang')
                    ->placeholder('Masukkan Nama Barang'),
                TextInput::make('stok')
                    ->required()
                    ->placeholder('Masukkan Stok Barang'),
                TextInput::make('deskripsi')
                    ->required()
                    ->placeholder('Masukkan Deskripsi Barang'),
                TextInput::make('harga_barang')
                    ->required()
                    ->placeholder('Masukkan Harga Barang')
                    ->label('Harga Barang'),
                FileUpload::make('foto_barang')
                    ->label('Foto Barang')
                    ->visibility('public')
                    ->directory('foto-barang') // folder di storage/app/public/foto-barang
                    ->image() // memastikan hanya gambar
                    ->imageEditor() // editor crop bawaan
                    ->downloadable()
                    ->previewable(), 
            ]); 
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')
                    ->searchable()
                    ->label('Nama Barang'),
                TextColumn::make('stok'),
                TextColumn::make('deskripsi'),
                TextColumn::make('harga_barang')
                    ->label('Harga Barang'),
                ImageColumn::make('foto_barang')
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}