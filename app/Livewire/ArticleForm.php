<?php

namespace App\Livewire;

use App\Models\Article;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;

class ArticleForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public ?int $article = null;

    public function mount(): void
    {
        $articleData = [];

        if(is_int($this->article)){
            $article = Article::find($this->article);
            $articleData = [
                'title' => $article->title,
                'body' => $article->body,
            ];
        }

        $this->form->fill($articleData);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                MarkdownEditor::make('body'),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.article-form');
    }
}
