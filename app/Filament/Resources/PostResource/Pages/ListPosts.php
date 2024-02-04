<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PostResource\Widgets\MainPostWidget::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'Все' => ListRecords\Tab::make(),
            'Технологии' => ListRecords\Tab::make()->modifyQueryUsing(function (Builder $query) {
                $query->where('post_type_id', 1);
            }),
            'Обзоры' => ListRecords\Tab::make()->modifyQueryUsing(function (Builder $query) {
                $query->where('post_type_id', 2);
            }),
            'Игры' => ListRecords\Tab::make()->modifyQueryUsing(function (Builder $query) {
                $query->where('post_type_id', 3);
            })
        ];
    }
}
