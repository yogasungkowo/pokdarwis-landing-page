<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use App\Models\About;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Forms\Form;

class ManageAbout extends ManageRecords
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        // Cek apakah sudah ada record
        $aboutExists = About::exists();
        
        if (!$aboutExists) {
            return [
                Actions\CreateAction::make()
                    ->label('Buat Halaman Tentang Kami')
                    ->mutateFormDataUsing(function (array $data): array {
                        // Pastikan hanya satu record yang bisa dibuat
                        if (About::exists()) {
                            $this->halt();
                        }
                        return $data;
                    }),
            ];
        }

        return [];
    }

    public function getTitle(): string
    {
        return 'Tentang Kami';
    }

    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        // Ambil atau buat record tunggal
        $about = About::first();
        
        if (!$about) {
            About::create([
                'year_founded' => 2020,
                'history' => 'POKDARWIS (Kelompok Sadar Wisata) didirikan untuk mengembangkan potensi wisata daerah dengan melibatkan masyarakat lokal dalam pengelolaan dan pelestarian objek wisata. Silakan edit untuk mengisi konten yang sesuai.',
                'vision' => '<p>Menjadi organisasi terdepan dalam pengembangan wisata berkelanjutan yang bermanfaat bagi masyarakat lokal.</p>',
                'mission' => '<ol><li>Mengembangkan potensi wisata dengan melibatkan masyarakat lokal</li><li>Melestarikan budaya dan lingkungan hidup</li><li>Meningkatkan kesejahteraan masyarakat melalui pariwisata</li><li>Membangun kesadaran wisata yang bertanggung jawab</li></ol>',
                'location' => 'Yogyakarta, Indonesia',
            ]);
        }

        return About::query()->limit(1);
    }

    protected function getTableActions(): array
    {
        return [
            \Filament\Tables\Actions\EditAction::make()
                ->label('Edit Konten')
                ->icon('heroicon-o-pencil'),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }

    protected function getTableHeaderActions(): array
    {
        return [];
    }
}
