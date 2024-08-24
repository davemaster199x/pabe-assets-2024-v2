<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\InsuranceModel;

class Insurance extends Component
{
    public $insurances_list;

    // Form fields
    public $description;
    public $insurance_co;
    public $contact_person;
    public $policy_no;
    public $phone;
    public $email;
    public $start_date;
    public $end_date;
    public $coverage;
    public $limits;
    public $deductible;
    public $premium;
    public $active = 1; // Default to active

    public function mount()
    {
        $this->insurances_list = InsuranceModel::orderBy('insurance_id', 'desc')->get();
    }

    public function save()
    {
        // Validate the form fields
        $this->validate([
            'description' => 'required|string|max:255',
            'insurance_co' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:100',
            'policy_no' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'coverage' => 'nullable|string|max:255',
            'limits' => 'nullable|string|max:255',
            'deductible' => 'nullable|string|max:255',
            'premium' => 'nullable|string|max:255',
            'active' => 'boolean',
        ]);

        // // Create a new insurance entry
        $insurance = InsuranceModel::create([
            'description' => $this->description,
            'insurance_co' => $this->insurance_co,
            'contact_person' => $this->contact_person,
            'policy_no' => $this->policy_no,
            'phone' => $this->phone,
            'email' => $this->email,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'coverage' => $this->coverage,
            'limits' => $this->limits,
            'deductible' => $this->deductible,
            'premium' => $this->premium,
            'active' => $this->active,
        ]);

        // Refresh the insurance list
        $this->insurances_list = InsuranceModel::orderBy('insurance_id', 'desc')->get();

        // Clear the form fields
        $this->resetForm();

        $this->emit('close-modal');

        // $this->emit('insuranceSaved', $insurance);

        // $this->emitSelf('$refresh');

        // $this->emit('$refresh');

        // $this->dispatch('$refresh');

        $this->emit('testemit');
    }

    public function resetForm()
    {
        $this->description = '';
        $this->insurance_co = '';
        $this->contact_person = '';
        $this->policy_no = '';
        $this->phone = '';
        $this->email = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->coverage = '';
        $this->limits = '';
        $this->deductible = '';
        $this->premium = '';
        $this->active = 1; // Reset to active
    }

    public function render()
    {
        return view('livewire.insurance', [
            'insurances' => $this->insurances_list,
        ]);
    }
}
