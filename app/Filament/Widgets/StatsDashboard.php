<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Pesan;
use App\Models\Barang;
use App\Models\Order;
use App\Models\Ulasan;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $countUser = User::count();
        $countPesan = Pesan::count();
        $countBarang = Barang::count();
        $countOrder = Order::count();
        $countUlasan = Ulasan::count();
        return [
            Stat::make('Jumlah User', $countUser . ' User'),
            Stat::make('Jumlah Pesan', $countPesan . ' Pesan'),
            Stat::make('Jumlah Barang', $countBarang . ' Barang'),
            Stat::make('Jumlah Orderan', $countOrder . ' Order'),
            Stat::make('Jumlah Ulasan', $countUlasan . ' Ulasan'),
        ];
    }
}
