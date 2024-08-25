<?php

namespace App\Livewire;

use App\Models\Article;
use App\Tables\Columns\ArticleActionColumn;


use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;

class ArticlesList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Article::query())
            ->columns([
                TextColumn::make('title')
                    ->label('Article title'),

                TextColumn::make('publication_date')
                    ->label('Publication date')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Author'),

                ArticleActionColumn::make('user_id')
                    ->label('')
                    ->view('tables.columns.article-action-column')

            ])->defaultSort('publication_date', 'desc');

    }
    public function render()
    {
        return view('livewire.articles-list');
    }
}
