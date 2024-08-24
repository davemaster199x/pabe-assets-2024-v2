<div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2>List of Insurance Policies</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newInsuranceModal" wire:click="resetForm">
            New Insurance Policy +
        </button>
    </div>
    <p>
        The list below displays insurance policies associated with your organization. 
        <span style="color: red;">Entries in red</span> indicate expired policies.
    </p>
    
    <!-- Filter options (e.g., dropdown) can be added here if needed -->
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Active</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Description</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Insurer</th>
                <th style="border: 1px solid #ddd; padding: 8px;">Start Date</th>
                <th style="border: 1px solid #ddd; padding: 8px;">End Date</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($insurances as $insurance)
                <tr style="{{ \Carbon\Carbon::parse($insurance->end_date)->isPast() ? 'color: red;' : '' }}">
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        @if($insurance->active === '1')
                            <span style="color: green;">&#10004;</span> <!-- Checkmark for active -->
                        @else
                            <span style="color: red;">&#10008;</span> <!-- Cross for inactive -->
                        @endif
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        {{ $insurance->description }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        {{ $insurance->insurance_co }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        {{ \Carbon\Carbon::parse($insurance->start_date)->format('m/d/Y') }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        {{ \Carbon\Carbon::parse($insurance->end_date)->format('m/d/Y') }}
                    </td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newInsuranceModal" wire:click="loadInsurance({{ $insurance->insurance_id }})">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="newInsuranceModal" tabindex="-1" aria-labelledby="newInsuranceModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newInsuranceModalLabel">
                        @if($selected_insurance_id) 
                            Edit Insurance Policy 
                        @else 
                            New Insurance Policy 
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for new insurance policy -->
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description*</label>
                            <input type="text" class="form-control" id="description" placeholder="Enter description" wire:model="description" required>
                        </div>
                        <div class="mb-3">
                            <label for="insurance_co" class="form-label">Insurance Co.*</label>
                            <input type="text" class="form-control" id="insurance_co" placeholder="Enter insurance company" wire:model="insurance_co" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_person" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" placeholder="Enter contact person" wire:model="contact_person">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="policy_no" class="form-label">Policy No.</label>
                                <input type="text" class="form-control" id="policy_no" placeholder="Enter policy number" wire:model="policy_no">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone number" wire:model="phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="coverage" class="form-label">Coverage</label>
                                <input type="text" class="form-control" id="coverage" placeholder="Enter coverage" wire:model="coverage">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" wire:model="email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="limits" class="form-label">Limits</label>
                                <input type="text" class="form-control" id="limits" placeholder="Enter limits" wire:model="limits">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Start Date*</label>
                                <input type="date" class="form-control" id="start_date" wire:model="start_date" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">End Date*</label>
                                <input type="date" class="form-control" id="end_date" wire:model="end_date" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="deductible" class="form-label">Deductible</label>
                                <div class="input-group">
                                    <span class="input-group-text">₱</span>
                                    <input type="text" class="form-control" id="deductible" placeholder="Enter deductible amount" wire:model="deductible">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="premium" class="form-label">Premium</label>
                                <div class="input-group">
                                    <span class="input-group-text">₱</span>
                                    <input type="text" class="form-control" id="premium" placeholder="Enter premium amount" wire:model="premium">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="active" wire:model="active" checked>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="save">
                        @if($selected_insurance_id)
                            Update
                        @else
                            Submit
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
<script>
    document.getElementById('insurance-navbar').classList.add('active');

    document.addEventListener('livewire:load', function () {
        Livewire.on('close-modal', function () {
            var myModalEl = document.getElementById('newInsuranceModal')
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        });

        Livewire.on('insuranceSaved', function (insurance) {
            console.log('Insurance Saved:', insurance);
        });

        Livewire.on('success', function () {
            swal(
                "Success!", "Insurance successfully Saved!", "success"           
            )
        });

        Livewire.on('validation-error', function (errors) {
            let errorMessages = errors.join(' ');
            console.log(errorMessages);
            swal({
                title: "Error!",
                html: true, // Allows HTML tags like <br> in the text
                text: errorMessages, // The error messages with line breaks
                icon: "error", // The type of alert (error, success, etc.)
                button: "OK" // Replace confirmButtonText with button
            });
        });

        // If the modal is shown for creating or editing, ensure the title and button text are correct
        $('#newInsuranceModal').on('shown.bs.modal', function () {
            let title = document.getElementById('newInsuranceModalLabel');
            let button = document.querySelector('#newInsuranceModal .btn-primary');

            if (Livewire.find(Livewire.components.getComponentsById().find(component => component.fingerprint).id).get('selected_insurance_id')) {
                title.textContent = "Edit Insurance Policy";
                button.textContent = "Update";
            } else {
                title.textContent = "New Insurance Policy";
                button.textContent = "Submit";
            }
        });
    });
</script>
@endsection
