<?php

    use App\Models\Post;

    $search = Post::search($this->search)->paginate($this->page);

    $headers = [
        ['key' => 'id', 'label' => 'No'],
        ['key' => 'title', 'label' => 'Title'],
        ['key' => 'slug', 'label' => 'Slug'],
        ['key' => 'body', 'label' => 'Body'],
        ['key' => 'watch', 'label' => 'Watch']
    ];
    
?>

<div>

 <x-mary-header title="Users" subtitle="Check this on mobile">
     <x-slot:middle class="!justify-end">
         <x-mary-input icon="o-magnifying-glass" wire:model.live="search" placeholder="Search..." />
     </x-slot:middle>
     <x-slot:actions>
         <x-mary-button icon="o-funnel" />
         <x-mary-button icon="o-plus" class="btn-secondary text-amber-50" @click="$wire.showModal()"/>
     </x-slot:actions>
 </x-mary-header>

 <!-- Table -->
 <x-mary-table :headers="$headers" :rows="$search" :row-decoration striped @row-click="$wire.edit($event.detail.id)" with-pagination>
    @scope('header_id', $header)
        <h2 class="text-xl font-bold text-amber-700">
            {{ $header['label'] }}
        </h2>
    @endscope
    @scope('header_title', $header)
        <h2 class="text-xl font-bold text-amber-700">
            {{ $header['label'] }}
        </h2>
    @endscope
    @scope('header_slug', $header)
    <h2 class="text-xl font-bold text-amber-700">
            {{ $header['label'] }}
        </h2>
    @endscope
    @scope('header_body', $header)
        <h2 class="text-xl font-bold text-amber-700">
            {{ $header['label'] }}
        </h2>
    @endscope
    @scope('header_watch', $header)
        <h2 class="text-xl font-bold text-amber-700">
            {{ $header['label'] }}
        </h2>
    @endscope
    
    @scope('actions', $posts)
        <x-mary-button icon="o-trash" wire:click="delete({{ $posts->id }})" wire:confirm="Are you sure you want to delete this post?" spinner class="btn-sm btn-error" />
    @endscope
</x-mary-table>

<!-- Chart JS -->
<div class="grid gap-5 mt-10">
    <x-mary-button label="Randomize" wire:click="randomize" class="btn-primary" spinner />
    <x-mary-button label="Switch" wire:click="switch" spinner />
</div>
 
<x-mary-chart wire:model="myChart" />

<!-- Modal -->
<x-mary-modal wire:model="postModal" class="backdrop-blur">
    <x-mary-form wire:submit="save">
        <x-mary-input label="Title" wire:model="form.title" />
        <x-mary-input label="Slug" wire:model="form.slug" />
        <x-mary-input label="Watch By User" wire:model="form.watch" />

        <template x-if="$wire.postModal">
            <x-mary-markdown wire:model="form.body" label="Blog post" />
        </template>

        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.postModal = false"/>
            <x-mary-button label="Submit" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
</x-mary-modal>



</div>
