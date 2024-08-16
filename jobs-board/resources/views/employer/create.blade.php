<x-layout>
    <x-card>
        <form action="{{route('employers.store')}}" method="post">
            @csrf
            <div class="mb-4">
                <x-label for="company_name">Company Name</x-label>
                <x-text-input name="company_name" placeholder="company name" />
            </div>

            <x-button>Create</x-button>
        </form>
    </x-card>
</x-layout>