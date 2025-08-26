<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
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
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Program Management';

    protected static ?string $navigationLabel = 'Aktivitas';

    protected static ?string $pluralLabel = 'Aktivitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Aktivitas')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(4),

                Select::make('program_id')
                    ->label('Program')
                    ->options(Program::pluck('title', 'id'))
                    ->required()
                    ->searchable(),

                DateTimePicker::make('start_datetime')
                    ->label('Waktu Mulai')
                    ->required()
                    ->seconds(false),

                DateTimePicker::make('end_datetime')
                    ->label('Waktu Selesai')
                    ->required()
                    ->seconds(false)
                    ->after('start_datetime'),

                TextInput::make('location')
                    ->label('Lokasi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('max_participants')
                    ->label('Maksimal Peserta')
                    ->numeric()
                    ->minValue(1)
                    ->default(20),

                TextInput::make('current_participants')
                    ->label('Peserta Saat Ini')
                    ->numeric()
                    ->minValue(0)
                    ->default(0),

                FileUpload::make('featured_image')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('activities'),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->default('draft'),

                Toggle::make('is_recurring')
                    ->label('Aktivitas Berulang'),

                Textarea::make('recurring_schedule')
                    ->label('Jadwal Berulang')
                    ->rows(3)
                    ->helperText('Deskripsi jadwal berulang (contoh: Setiap Sabtu pukul 08:00)')
                    ->visible(fn (callable $get) => $get('is_recurring')),
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
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('program.title')
                    ->label('Program')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('start_datetime')
                    ->label('Waktu Mulai')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('participants_info')
                    ->label('Peserta')
                    ->getStateUsing(fn (Activity $record) => "{$record->current_participants}/{$record->max_participants}"),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'secondary' => 'draft',
                        'success' => 'published',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('program_id')
                    ->label('Program')
                    ->options(Program::pluck('title', 'id')),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
