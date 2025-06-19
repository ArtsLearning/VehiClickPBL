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

    protected static ?string $navigationIcon = 'heroicon-o-truck';

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

                TextInput::make('kategori')
                    ->required()
                    ->placeholder('Masukkan Kategori'),

                TextInput::make('stok')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan Stok Barang'),

                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan Rating'),

                TextInput::make('deskripsi')
                    ->required()
                    ->placeholder('Masukkan Deskripsi Barang'),

                TextInput::make('kapasitas')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan Kapasitas'),

                TextInput::make('nomor_plat')
                    ->required()
                    ->placeholder('Masukkan Nomor Plat Kendaraan'),

                TextInput::make('harga_barang')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan Harga Barang')
                    ->label('Harga Barang'),

                FileUpload::make('foto_barang')
                    ->label('Foto Barang')
                    ->directory('foto-barang') // Disimpan di storage/app/public/foto-barang
                    ->visibility('public')    // Agar bisa diakses via /storage/foto-barang/
                    ->image()                 // Validasi hanya file gambar
                    ->imageEditor()          // Crop bawaan
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->downloadable()
                    ->previewable()
                    ->getUploadedFileNameForStorageUsing(function ($file) {
                        // Simpan nama dengan UUID + ekstensi asli
                        return (string) str()->uuid() . '.' . $file->getClientOriginalExtension();
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang')
                    ->searchable()
                    ->label('Nama Barang'),
                
                TextColumn::make('kategori')
                    ->searchable(),

                TextColumn::make('stok'),

                TextColumn::make('rating'),

                TextColumn::make('deskripsi'),

                TextColumn::make('kapasitas'),

                TextColumn::make('nomor_plat'),

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