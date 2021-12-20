<x-tests.app>

    <x-slot name="header">
        ヘッダー1
    </x-slot>

    this is component-test1

    <x-tests.card title="タイトル" content="本文" :message="$message" />
    <x-tests.card title="タイトル2です" />
    <x-tests.card title="CSSを変えてみる" class="bg-blue-200"  />
</x-tests.app>
