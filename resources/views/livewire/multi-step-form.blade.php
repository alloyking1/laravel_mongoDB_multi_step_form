<div>
    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-md">
        <h2 class="text-xl font-semibold mb-4">Step {{ $currentStep }} of 3</h2>

        @if ($currentStep == 1)
            <div>
                <label class="block">Name</label>
                <input type="text" wire:model="formData.step_1.name" class="border p-2 w-full">
                
                <label class="block mt-2">Email</label>
                <input type="email" wire:model="formData.step_1.email" class="border p-2 w-full">
            </div>
        @endif

        @if ($currentStep == 2)
            <div>
                <label class="block">Address</label>
                <input type="text" wire:model="formData.step_2.address" class="border p-2 w-full">

                <label class="block mt-2">City</label>
                <input type="text" wire:model="formData.step_2.city" class="border p-2 w-full">
            </div>
        @endif

        @if ($currentStep == 3)
            <div>
                <label class="block">Preferences</label>
                <select wire:model="formData.step_3.preferences" multiple class="border p-2 w-full">
                    <option value="Option1">Option 1</option>
                    <option value="Option2">Option 2</option>
                    <option value="Option3">Option 3</option>
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
                <button wire:click="saveProgress" class="px-4 py-2 bg-green-500 text-white rounded">Submit</button>
            @endif
        </div>
    </div>
</div>
