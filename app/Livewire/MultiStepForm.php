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
        $this->currentStep++;
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
        }elseif($this->currentStep === 2){
            $rules = [
                'address' => 'required|string',
                'city' => 'required|string',
            ];
        }elseif($this->currentStep === 3){
            $rules = [
                'gender' => 'required|string',
            ];
        }

        $this->validate($rules);
    }

    public function saveProgress()
    {
        try{
            MultiStepFormDB::create([
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address,
                'city' => $this->city,
                'gender' => $this->gender,
            ]);

            session()->flash('success', 'Form saved successfully');
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
