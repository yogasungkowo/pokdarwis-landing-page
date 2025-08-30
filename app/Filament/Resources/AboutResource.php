<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Tentang Kami';

    protected static ?string $navigationGroup = "Tentang Kami";

    protected static ?string $pluralLabel = 'Tentang Kami';

    protected static ?string $slug = 'about';

    // Method untuk mendapatkan atau membuat record tunggal
    public static function getAboutRecord()
    {
        return About::firstOrCreate([], [
            'history' => 'Sejarah singkat organisasi belum diisi.',
            'year_founded' => now(),
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('year_founded')
                    ->label('Tahun Berdiri')
                    ->required()
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->placeholder('Contoh: 2020'),
                
                Forms\Components\Textarea::make('history')
                    ->label('Sejarah Singkat')
                    ->required()
                    ->placeholder('Masukkan sejarah singkat organisasi')
                    ->rows(4)
                    ->columnSpanFull(),
                
                RichEditor::make('vision')
                    ->label('Visi')
                    ->required()
                    ->placeholder('Masukkan visi organisasi. Anda bisa menggunakan numbered list atau bullet points.')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'bulletList',
                        'orderedList',
                        'undo',
                        'redo',
                    ])
                    ->columnSpanFull(),
                
                RichEditor::make('mission')
                    ->label('Misi')
                    ->required()
                    ->placeholder('Masukkan misi organisasi. Anda bisa menggunakan numbered list atau bullet points.')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'bulletList',
                        'orderedList',
                        'undo',
                        'redo',
                    ])
                    ->columnSpanFull(),
                
                Forms\Components\TextInput::make('location')
                    ->label('Lokasi')
                    ->required()
                    ->placeholder('Contoh: Yogyakarta, Indonesia')
                    ->columnSpanFull(),
                
                Textarea::make('location_desc')
                    ->label('Deskripsi Lokasi')
                    ->placeholder('Masukkan deskripsi tambahan tentang lokasi, seperti alamat lengkap atau petunjuk arah.')
                    ->rows(3)
                    ->columnSpanFull(),
                
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar Organisasi')
                    ->image()
                    ->directory('about')
                    ->visibility('public')
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('675')
                    ->maxSize(5120) // 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->columnSpanFull(),
                
                Forms\Components\Section::make('Koordinat Lokasi')
                    ->description('Koordinat untuk menampilkan lokasi di peta')
                    ->schema([
                        Forms\Components\TextInput::make('latitude')
                            ->label('Latitude (Lintang)')
                            ->placeholder('Contoh: 3.509770335881451')
                            ->helperText('Koordinat lintang - masukkan angka dengan titik desimal')
                            ->rules(['nullable', 'regex:/^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]+)?$/'])
                            ->columnSpan(1),
                        
                        Forms\Components\TextInput::make('longitude')
                            ->label('Longitude (Bujur)')
                            ->placeholder('Contoh: 99.23357489432333')
                            ->helperText('Koordinat bujur - masukkan angka dengan titik desimal')
                            ->rules(['nullable', 'regex:/^-?([0-9]{1,2}|1[0-7][0-9]|180)(\.[0-9]+)?$/'])
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year_founded')
                    ->label('Tahun Berdiri')
                    ->badge()
                    ->color('success'),
                Tables\Columns\TextColumn::make('history')
                    ->label('Sejarah')
                    ->limit(80)
                    ->wrap(),
                Tables\Columns\TextColumn::make('vision')
                    ->label('Visi')
                    ->html()
                    ->limit(100)
                    ->wrap(),
                Tables\Columns\TextColumn::make('mission')
                    ->label('Misi')
                    ->html()
                    ->limit(100)
                    ->wrap(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->icon('heroicon-m-map-pin'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('latitude')
                    ->label('Latitude')
                    ->numeric(8)
                    ->placeholder('Belum diisi')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('longitude')
                    ->label('Longitude')
                    ->numeric(8)
                    ->placeholder('Belum diisi')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit Konten')
                    ->icon('heroicon-o-pencil')
                    ->color('primary'),
            ])
            ->paginated(false)
            ->striped(false)
            ->bulkActions([
                // Tidak ada bulk actions untuk single record
            ])
            ->emptyStateHeading('Belum Ada Data')
            ->emptyStateDescription('Data tentang organisasi akan dibuat otomatis.');
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
            'index' => Pages\ManageAbout::route('/'),
        ];
    }

    // Override method untuk disable create dan delete
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }
}
