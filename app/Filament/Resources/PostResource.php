<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\RelationManagers\TopicRelationManager;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\FlareClient\Truncation\AbstractTruncationStrategy;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationLabel = 'Новости';

    protected static ?string $pluralModelLabel = 'Новости';

    protected static ?string $navigationGroup = 'Новости';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Grid::make(2)->schema([
                        Forms\Components\Textarea::make('title')
                            ->label('Название')
                            ->required(),
                        Forms\Components\Textarea::make('tagline')
                            ->required()
                            ->label('Короткая фраза'),
                    ]),
                    Forms\Components\RichEditor::make('body')
                        ->label('Текст статьи')
                        ->fileAttachmentsDirectory('post_pics')

                ])
                    ->columnSpan(['lg' => fn() => 2]),

                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('post_type_id')
                        ->required()
                        ->label('Тип')
                        ->native(False)
                        ->relationship(name: 'PostType', titleAttribute: 'title'),
                    Forms\Components\Select::make('topic_id')
                        ->required()
                        ->native(False)
                        ->label('Тема')
                        ->relationship(name: 'topic', titleAttribute: 'title'),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('post_cover')
                        ->collection('cover')
                        ->image()
                        ->imageEditor()
                        ->imageEditorAspectRatios([
                            '16:9',
                            '4:3'
                        ])
                        ->label('Обложка')
                        ->disk('media'),
                ])->columnSpan(['lg' => 1])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    SpatieMediaLibraryImageColumn::make('post_cover')
                        ->collection('cover')
                        ->extraImgAttributes(['class' => 'w-full rounded'])
                        ->height('auto')
                        ->width('100%'),
                    Tables\Columns\TextColumn::make('title')
                        ->weight(FontWeight::SemiBold)
                        ->limit(50)
                        ->searchable()
                        ->size(Tables\Columns\TextColumn\TextColumnSize::Large),
                    Tables\Columns\TextColumn::make('tagline')
                        ->limit(50)
                        ->searchable()
                        ->html()
                ]),
            ])
            ->filters([
                SelectFilter::make('topic_id')
                    ->relationship('topic', 'title')
                    ->label('Тема')
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ]);
    }


    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit')
        ];
    }

    public static function getWidgets(): array
    {
        return [
            PostResource\Widgets\MainPostWidget::class,
        ];
    }

}
