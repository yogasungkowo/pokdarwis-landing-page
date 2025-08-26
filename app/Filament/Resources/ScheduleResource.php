<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use App\Models\Activity;
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
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Program Management';

    protected static ?string $navigationLabel = 'Jadwal';

    protected static ?string $pluralLabel = 'Jadwal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('day_of_week')
                    ->label('Hari')
                    ->options([
                        0 => 'Minggu',
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jumat',
                        6 => 'Sabtu',
                    ])
                    ->required(),

                TextInput::make('activity_name')
                    ->label('Nama Aktivitas')
                    ->required()
                    ->maxLength(255),

                TimePicker::make('start_time')
                    ->label('Waktu Mulai')
                    ->required()
                    ->seconds(false),

                TimePicker::make('end_time')
                    ->label('Waktu Selesai')
                    ->required()
                    ->seconds(false)
                    ->after('start_time'),

                TextInput::make('participants_info')
                    ->label('Info Peserta')
                    ->maxLength(255)
                    ->placeholder('Contoh: Max 15 peserta'),

                TextInput::make('location')
                    ->label('Lokasi')
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(3),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),

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
                TextColumn::make('day_of_week')
                    ->label('Hari')
                    ->formatStateUsing(fn (int $state): string => match ($state) {
                        0 => 'Minggu',
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jumat',
                        6 => 'Sabtu',
                        default => 'Unknown',
                    })
                    ->sortable(),

                TextColumn::make('activity_name')
                    ->label('Nama Aktivitas')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                TextColumn::make('time_range')
                    ->label('Waktu')
                    ->getStateUsing(function (Schedule $record) {
                        return $record->start_time_formatted . ' - ' . $record->end_time_formatted;
                    }),

                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->limit(20)
                    ->toggleable(),

                TextColumn::make('participants_info')
                    ->label('Peserta')
                    ->limit(15)
                    ->toggleable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

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
                SelectFilter::make('day_of_week')
                    ->label('Hari')
                    ->options([
                        0 => 'Minggu',
                        1 => 'Senin',
                        2 => 'Selasa',
                        3 => 'Rabu',
                        4 => 'Kamis',
                        5 => 'Jumat',
                        6 => 'Sabtu',
                    ]),

                SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        1 => 'Aktif',
                        0 => 'Tidak Aktif',
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
            ->defaultSort('day_of_week', 'asc')
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
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}
