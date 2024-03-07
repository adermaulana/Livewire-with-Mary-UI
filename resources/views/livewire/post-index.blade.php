<?php

    use App\Models\Post;

    $posts = Post::latest()->paginate(3);

    $headers = [
        ['key' => 'id', 'label' => 'No'],
        ['key' => 'title', 'label' => 'Title'],
        ['key' => 'slug', 'label' => 'Slug'],
        ['key' => 'body', 'label' => 'Body']
    ];
    

?>

<div>

 <x-mary-header title="Users" subtitle="Check this on mobile">
     <x-slot:middle class="!justify-end">
         <x-mary-input icon="o-magnifying-glass" placeholder="Search..." />
     </x-slot:middle>
     <x-slot:actions>
         <x-mary-button icon="o-funnel" />
         <x-mary-button icon="o-plus" class="btn-secondary text-amber-50" @click="$wire.postModal = true"/>
     </x-slot:actions>
 </x-mary-header>
 <x-mary-table :headers="$headers" :rows="$posts" :row-decoration striped @row-click="alert($event.detail.title)" with-pagination>
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
</x-mary-table>

<!-- Modal -->

<x-mary-modal wire:model="postModal" class="backdrop-blur">
    <x-mary-form wire:submit="save">
        <x-mary-input label="Title" wire:model="form.title" />
        <x-mary-input label="Slug" wire:model="form.slug" />
        <x-mary-textarea
            label="Body"
            wire:model="form.body"
            placeholder="Your story ..."
            hint="Max 1000 chars"
            rows="5"
             />
        <x-slot:actions>
            <x-mary-button label="Cancel" @click="$wire.postModal = false"/>
            <x-mary-button label="Submit" class="btn-primary" type="submit" spinner="save" />
        </x-slot:actions>
    </x-mary-form>
</x-mary-modal>

</div>
