<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $navigationGroup = 'Program Management';

    protected static ?string $navigationLabel = 'Program';

    protected static ?string $pluralLabel = 'Program';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Program')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(4)
                    ->maxLength(1000),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'wisata-alam' => 'Wisata Alam',
                        'wisata-budaya' => 'Wisata Budaya',
                        'wisata-kuliner' => 'Wisata Kuliner',
                        'edukasi' => 'Edukasi',
                        'olahraga' => 'Olahraga',
                        'komunitas' => 'Komunitas',
                    ]),

                FileUpload::make('featured_image')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('programs'),

                Select::make('icon')
                    ->label('Icon')
                    ->options([
                        'heroicon-o-camera' => '📷 Kamera (Camera)',
                        'heroicon-o-map' => '🗺️ Peta (Map)', 
                        'heroicon-o-sun' => '☀️ Matahari (Sun)',
                        'heroicon-o-heart' => '❤️ Hati (Heart)',
                        'heroicon-o-star' => '⭐ Bintang (Star)',
                        'heroicon-o-fire' => '🔥 Api (Fire)',
                        'heroicon-o-globe-alt' => '🌍 Dunia (Globe)',
                        'heroicon-o-mountain' => '🏔️ Gunung (Mountain)',
                        'heroicon-o-water' => '💧 Air (Water)',
                        'heroicon-o-tree-pine' => '🌲 Pohon (Tree)',
                        'heroicon-o-building-office' => '🏢 Gedung (Building)',
                        'heroicon-o-academic-cap' => '🎓 Topi Wisuda (Academic)',
                        'heroicon-o-user-group' => '👥 Grup (Group)',
                        'heroicon-o-cake' => '🍰 Kue (Cake)',
                        'heroicon-o-scissors' => '✂️ Gunting (Scissors)',
                        'heroicon-o-paint-brush' => '🎨 Kuas (Paint Brush)',
                        'heroicon-o-sparkles' => '✨ Kilauan (Sparkles)',
                        'heroicon-o-gift' => '🎁 Hadiah (Gift)',
                    ])
                    ->searchable()
                    ->helperText('Pilih icon yang sesuai dengan program'),

                Textarea::make('custom_svg')
                    ->label('Custom SVG Icon (Opsional)')
                    ->rows(3)
                    ->helperText('Jika diisi, akan menggantikan icon heroicon di atas. Masukkan kode SVG lengkap.')
                    ->columnSpanFull(),

                ColorPicker::make('color')
                    ->label('Warna')
                    ->default('#3B82F6')
                    ->helperText('Kode warna hex (contoh: #3B82F6)'),

                Toggle::make('is_featured')
                    ->label('Program Unggulan'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Aktif',
                        'inactive' => 'Tidak Aktif',
                    ])
                    ->required()
                    ->default('active'),

                TextInput::make('display_order')
                    ->label('Urutan Tampil')
                    ->numeric()
                    ->default(0)
                    ->helperText('Semakin kecil angka, semakin di atas'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')
                    ->label('Gambar')
                    ->size(60),

                TextColumn::make('title')
                    ->label('Judul Program')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('category')
                    ->label('Kategori')
                    ->colors([
                        'primary' => 'wisata-alam',
                        'success' => 'wisata-budaya',
                        'warning' => 'wisata-kuliner',
                        'info' => 'edukasi',
                        'secondary' => 'olahraga',
                        'danger' => 'komunitas',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'wisata-alam' => 'Wisata Alam',
                        'wisata-budaya' => 'Wisata Budaya',
                        'wisata-kuliner' => 'Wisata Kuliner',
                        'edukasi' => 'Edukasi',
                        'olahraga' => 'Olahraga',
                        'komunitas' => 'Komunitas',
                        default => $state,
                    }),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(),

                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-minus'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Aktif',
                        'inactive' => 'Tidak Aktif',
                        default => $state,
                    }),

                TextColumn::make('activities_count')
                    ->label('Aktivitas')
                    ->counts('activities')
                    ->badge(),

                TextColumn::make('display_order')
                    ->label('Urutan')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'wisata-alam' => 'Wisata Alam',
                        'wisata-budaya' => 'Wisata Budaya',
                        'wisata-kuliner' => 'Wisata Kuliner',
                        'edukasi' => 'Edukasi',
                        'olahraga' => 'Olahraga',
                        'komunitas' => 'Komunitas',
                    ]),

                SelectFilter::make('is_featured')
                    ->label('Program Unggulan')
                    ->options([
                        1 => 'Ya',
                        0 => 'Tidak',
                    ]),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'active' => 'Aktif',
                        'inactive' => 'Tidak Aktif',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('display_order', 'asc');
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
