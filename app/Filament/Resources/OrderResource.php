<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\TrackingStatus; // Pastikan ini ada
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model; // Pastikan ini ada
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;


class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'process' => 'Process',
                        'disewa' => 'Disewa',
                        'completed' => 'Completed',
                        'canceled' => 'Canceled',
                    ])
                    ->required()
                    ->afterStateUpdated(function ($state, Model $record) {
                        $deskripsi = match ($state) {
                            'process' => 'Pesanan telah dikonfirmasi dan sedang diproses.',
                            'disewa' => 'Mobil telah diantar atau diambil oleh pelanggan.',
                            'completed' => 'Mobil telah dikembalikan dan pesanan selesai.',
                            'canceled' => 'Pesanan telah dibatalkan oleh admin.',
                            default => null,
                        };

                        if ($deskripsi) {
                            TrackingStatus::create([
                                'pesanan_id' => $record->id,
                                'deskripsi' => $deskripsi,
                            ]);
                        }
                    })
                    ->visible(fn () => auth()->user()->role === 'admin'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('pickup_method'),
                TextColumn::make('alamat_detail')
                    ->label('Alamat')
                    ->wrap()
                    ->limit(40),
                TextColumn::make('tanggal_mulai')
                    ->date(),
                TextColumn::make('tanggal_selesai')
                    ->date(),
                TextColumn::make('durasi')
                    ->label('Durasi (Hari)'),
                TextColumn::make('total_harga')
                    ->money('IDR'),
                TextColumn::make('nama_kendaraan'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'process' => 'info',
                        'disewa' => 'success',
                        'completed' => 'success',
                        'canceled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                //
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}