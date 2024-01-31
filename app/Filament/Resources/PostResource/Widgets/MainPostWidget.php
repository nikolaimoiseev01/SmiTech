<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class MainPostWidget extends Widget implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.resources.post-resource.widgets.main-post-widget';

    public ?array $data = [];

    public function mount(Post $post): void
    {
        $cur_main_post = Post::where('flg_main_banner', True)->first();
        $this->form->fill([
            'main_post_id' => $cur_main_post['id'] ?? 0,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('main_post_id')
                    ->options(Post::all()->pluck('title', 'id'))
                    ->label('')
//                    ->native(false)
            ])
            ->statePath('data');
    }

    public function set_main_post()
    {
        Post::where('flg_main_banner', True)->update([
            'flg_main_banner' => False
        ]);

        Post::where('id', $this->data['main_post_id'])->update([
            'flg_main_banner' => True
        ]);

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
