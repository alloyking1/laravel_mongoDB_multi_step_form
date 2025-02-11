<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MultiStepForm extends Component
{
    public $currentStep = 1;
    public $formData = [
        'step_1' => ['name' => '', 'email' => ''],
        'step_2' => ['address' => '', 'city' => ''],
        'step_3' => ['preferences' => []],
    ];

    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
        $this->saveProgress();
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function validateStep()
    {
        $rules = [
            'formData.step_1.name' => 'required|string',
            'formData.step_1.email' => 'required|email',
            'formData.step_2.address' => 'required|string',
            'formData.step_2.city' => 'required|string',
            'formData.step_3.preferences' => 'array',
        ];

        $this->validate($rules);
    }

    public function saveProgress()
    {
        DB::collection('multi_step_forms')->updateOrInsert(
            ['user_id' => auth()->id()], 
            ['form_data' => $this->formData, 'current_step' => $this->currentStep]
        );
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
