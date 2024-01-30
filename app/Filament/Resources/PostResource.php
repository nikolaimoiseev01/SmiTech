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
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\FlareClient\Truncation\AbstractTruncationStrategy;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Grid::make(4)->schema([
                        Forms\Components\TextInput::make('title')->required(),
                        Forms\Components\Select::make('topic_id')
                            ->required()
                            ->relationship(name: 'topic', titleAttribute: 'title'),
                        Toggle::make('flg_big_banner')->label('Большой банер'),
                        Forms\Components\TextInput::make('tagline')->label('Короткая фраза')
                    ]),
                    Forms\Components\SpatieMediaLibraryFileUpload::make('post_cover')
                        ->collection('cover')
                        ->disk('media'),
                    Forms\Components\RichEditor::make('body')
                        ->fileAttachmentsDirectory('post_pics')

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('topic.title'),
                Tables\Columns\TextColumn::make('tagline')
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
