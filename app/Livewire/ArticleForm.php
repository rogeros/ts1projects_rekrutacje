<?php

namespace App\Livewire;

use App\Models\Article;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
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

        if (is_int($this->article)) {
            $article = Article::find($this->article);
            $articleData = [
                'id' => $article->id,
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
                Hidden::make('id'),
                TextInput::make('title')
                    ->required()
                    ->maxLength(100),
                MarkdownEditor::make('body')
                    ->required()
                    ->maxLength(3000),
            ])
            ->statePath('data');
    }

    public function send()
    {
        $formData = $this->form->getState();
        if (is_int($formData['id'])) {
            $arcitle = Article::findOrFail($formData['id']);

            if($arcitle->user_id != auth()->user()->id){
                abort(401);
            }

            $arcitle->title = $formData['title'];
            $arcitle->body = $formData['body'];

            $arcitle->save();

            return redirect()->route('home')->with('status', 'Your article has been successfully updated.');

        } else {
            Article::create([
                'user_id' => auth()->user()->id,
                'title' => $formData['title'],
                'body' => $formData['body'],
            ]);
            return redirect()->route('home')->with('status', 'Yupi. Your article has been added.');
        }


    }

    public function render()
    {
        return view('livewire.article-form');
    }
}
