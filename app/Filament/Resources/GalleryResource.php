<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use App\Models\Activity;
use App\Models\Program;
use Filament\Forms;
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
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Galeri';

    protected static ?string $pluralLabel = 'Galeri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3),

                FileUpload::make('image_path')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->directory('gallery')
                    ->imageEditor(),

                Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'activity' => 'Aktivitas',
                        'program' => 'Program',
                        'general' => 'Umum',
                    ])
                    ->required()
                    ->default('general'),

                Select::make('activity_id')
                    ->label('Aktivitas Terkait')
                    ->options(Activity::with('program')->get()->mapWithKeys(function ($activity) {
                        return [$activity->id => "{$activity->title} ({$activity->program->title})"];
                    }))
                    ->searchable()
                    ->visible(fn (callable $get) => $get('type') === 'activity'),

                DatePicker::make('photo_date')
                    ->label('Tanggal Foto'),

                Toggle::make('is_featured')
                    ->label('Tampilkan di Beranda'),

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
                ImageColumn::make('image_path')
                    ->label('Gambar')
                    ->size(80)
                    ->square(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                BadgeColumn::make('type')
                    ->label('Tipe')
                    ->colors([
                        'success' => 'activity',
                        'warning' => 'program',
                        'info' => 'general',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'activity' => 'Aktivitas',
                        'program' => 'Program',
                        'general' => 'Umum',
                        default => $state,
                    }),

                TextColumn::make('activity.title')
                    ->label('Aktivitas')
                    ->limit(20)
                    ->toggleable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_featured')
                    ->label('Unggulan')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-minus'),

                TextColumn::make('photo_date')
                    ->label('Tanggal Foto')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                SelectFilter::make('type')
                    ->label('Tipe')
                    ->options([
                        'activity' => 'Aktivitas',
                        'program' => 'Program',
                        'general' => 'Umum',
                    ]),

                SelectFilter::make('activity_id')
                    ->label('Aktivitas')
                    ->options(Activity::pluck('title', 'id')),

                SelectFilter::make('is_featured')
                    ->label('Unggulan')
                    ->options([
                        1 => 'Ya',
                        0 => 'Tidak',
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
            ->defaultSort('display_order', 'asc')
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
