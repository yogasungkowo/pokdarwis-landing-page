<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\ArticleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleResource\RelationManagers;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\RichEditor;
use Illuminate\Support\Facades\Auth;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string  $navigationGroup = 'Content';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Article Content')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'create') {
                                    $set('slug', \Illuminate\Support\Str::slug($state));
                                    $set('meta_title', $state . ' - POKDARWIS');
                                }
                            }),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Article::class, 'slug', fn ($record) => $record)
                            ->disabled()
                            ->dehydrated(),
                        Textarea::make('excerpt')
                            ->maxLength(500)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set, Forms\Get $get) {
                                if ($operation === 'create' && $state) {
                                    // Auto-generate meta description from excerpt
                                    $metaDesc = \Illuminate\Support\Str::limit($state, 155);
                                    $set('meta_description', $metaDesc);
                                    
                                    // Auto-generate keywords from title and excerpt
                                    $title = $get('title') ?? '';
                                    $keywords = collect(explode(' ', strtolower($title . ' ' . $state)))
                                        ->filter(fn($word) => strlen($word) > 3)
                                        ->unique()
                                        ->take(10)
                                        ->implode(', ');
                                    $set('meta_keywords', $keywords);
                                }
                            }),
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->maxSize(1024)
                            ->directory('articles/images')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['image/*']),
                        RichEditor::make('content')
                            ->required()
                            ->toolbarButtons([
                                'bold', 'italic', 'underline', 'link', 'bulletList', 'numberedList', 'blockquote', 'codeBlock',
                                'insertTable', 'undo', 'redo',
                            ])
                            ->maxLength(5000)
                            ->columnSpanFull(),
                    ])->columns(2),
                
                Section::make('Article Settings')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->default(fn () => Auth::id())
                            ->required()
                            ->disabled(fn (string $operation): bool => $operation === 'create')
                            ->dehydrated(),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->preload()
                            ->required()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique('categories', 'slug')
                                    ->disabled()
                                    ->dehydrated(),
                            ])
                            ->createOptionUsing(function (array $data): int {
                                return \App\Models\Category::create($data)->getKey();
                            }),
                        Select::make('tags')
                            ->relationship('tags', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique('tags', 'slug')
                                    ->disabled()
                                    ->dehydrated(),
                            ])
                            ->createOptionUsing(function (array $data): int {
                                return \App\Models\Tag::create($data)->getKey();
                            }),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(false),
                        DateTimePicker::make('published_at')
                            ->label('Publish At')
                            ->default(now())
                            ->required(fn ($get) => $get('is_published')),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                        Toggle::make('is_trending')
                            ->label('Trending')
                            ->default(false),
                        TextInput::make('view_count')
                            ->default(0)
                            ->numeric()
                            ->minValue(0)
                            ->required(),
                    ])->columns(2),

                Section::make('SEO Settings')
                    ->description('Meta tags are auto-generated from title and excerpt, but you can customize them')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->nullable()
                            ->placeholder('Auto-generated from title'),
                        TextInput::make('meta_description')
                            ->label('Meta Description')
                            ->maxLength(160)
                            ->nullable()
                            ->placeholder('Auto-generated from excerpt'),
                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->maxLength(255)
                            ->nullable()
                            ->placeholder('Auto-generated from content'),
                        FileUpload::make('meta_image')
                            ->label('Meta Image (Social Media)')
                            ->image()
                            ->maxSize(1024)
                            ->directory('articles/meta_images')
                            ->visibility('public')
                            ->preserveFilenames()
                            ->acceptedFileTypes(['image/*'])
                            ->helperText('Used for social media sharing. If not set, main image will be used.'),
                    ])->columns(2)->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Tables\Columns\TextColumn::make('view_count')
                    ->label('Views')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published At')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),
                Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name'),
                Tables\Filters\SelectFilter::make('tags')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->searchable(),
                Tables\Filters\Filter::make('is_published')
                    ->query(fn (Builder $query): Builder => $query->where('is_published', true)),
                Tables\Filters\Filter::make('is_featured')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
