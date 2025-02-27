<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\MultiStepForm as MultiStepFormDB;

class MultiStepForm extends Component
{
    public $currentStep = 1;
    public $totalSteps = 3;

    public $name;
    public $email;
    public $address;
    public $city;
    public $gender;

    public function nextStep()
    {
        $this->validateStep();
        if($this->currentStep < $this->totalSteps){
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function validateStep()
    {
        if($this->currentStep === 1){

            $rules = [
                'name' => 'required|string',
                'email' => 'required|email',
            ];
            $this->saveProgress($this->email, ['name' => $this->name], ['email' => $this->email]);
            session()->flash('success', 'Step '.$this->currentStep.' saved');

        }elseif($this->currentStep === 2){
            $rules = [
                'address' => 'required|string',
                'city' => 'required|string',
            ];
            $this->saveProgress($this->email, ['address' => $this->address], ['city' => $this->city]);
            session()->flash('success', 'Step '.$this->currentStep.' saved');

        }elseif($this->currentStep === 3){
            $rules = [
                'gender' => 'required|string',
            ];
            $this->saveProgress($this->email, ['gender' => $this->gender]);
            session()->flash('success', 'Step '.$this->currentStep.' saved');
        }

        $this->validate($rules);
    }

    public function saveProgress($email, ...$formFields)
    {
        $data = [];
        foreach($formFields as $value){
            if (is_array($formFields)) {
                $data = array_merge($data, $value);
            }
        }

        try{
            MultiStepFormDB::updateOrCreate(['email' => $email], $data);
        }catch(\Exception $e){

            \Log::error('Error saving MultiStepForm: ' . $e->getMessage());
            session()->flash('error', 'There was an error saving your data. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
