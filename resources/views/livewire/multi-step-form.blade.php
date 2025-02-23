<div>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-xl rounded-xl">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-4xl">Multi step form with MongoDB</h1>
        <h2 class="text-base font-semibold mb-4">Step {{ $currentStep }} of 3</h2>

        <div>

            @if ($currentStep == 1)
                <div>
                    <label class="block text-sm">Name</label>
                    <input type="text" wire:model="name" class="border rounded-lg p-2 w-full">
                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    
                    <label class="block mt-2 text-sm">Email</label>
                    <input type="email" wire:model="email" class="border rounded-lg p-2 w-full">
                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>
            @endif
    
            @if ($currentStep == 2)
                <div>
                    <label class="block text-sm">Address</label>
                    <input type="text" wire:model="address" class="border p-2 w-full">
                    @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    
                    <label class="block mt-2">City</label>
                    <input type="text" wire:model="city" class="border p-2 w-full">
                    @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    
                </div>
            @endif
    
            @if ($currentStep == 3)
                <div>
                    <label class="block">Gender</label>
                    <select wire:model="gender" class="border p-2 w-full">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            @endif
    
            <div class="mt-4 flex justify-between">
                @if ($currentStep > 1)
                    <button wire:click="previousStep" class="px-4 py-2 bg-gray-500 text-white rounded">Back</button>
                @endif
    
                @if ($currentStep < 3)
                    <button wire:click="nextStep" class="px-4 py-2 bg-blue-500 text-white rounded">Next</button>
                @else
                    <button wire:click="saveProgress" wire:loading.class="opacity-50" class="px-4 py-2 bg-green-500 text-white rounded">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>
                            Loading..
                        </span>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
