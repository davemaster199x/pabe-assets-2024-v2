<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <label class="eventtitle">Insurances</label>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#linkInsuranceModal">
                + Link Insurance
            </button>
        </div>
    </div>
</div>

<!-- Modal for linking insurance -->
<div class="modal fade" id="linkInsuranceModal" tabindex="-1" aria-labelledby="linkInsuranceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkInsuranceModalLabel">Link Insurance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields to link insurance here -->
                <form id="linkInsuranceForm">
                    <div class="mb-3">
                        <label for="insuranceSelect" class="form-label">Select Insurance</label>
                        <select class="form-control" id="insuranceSelect">
                            <!-- Options populated via JS -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="linkInsurance()">Link Insurance</button>
            </div>
        </div>
    </div>
</div>

<div class="eventdatas">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>Insurance Co.</th>
                <th>Contact Person</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="insurance-table-body">

        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var assetId = {{ $encrypt_asset_id }}; // Replace this with the actual asset_id

        function fetchInsurances() {
            fetch(`/insurances/${assetId}`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('insurance-table-body');
                    tbody.innerHTML = ''; // Clear existing rows
                    console.log(data);
                    // Check if the data is an object and not null
                    if (data && typeof data === 'object' && data.insurance_id) {
                        const row = document.createElement('tr');
                        
                        row.innerHTML = `
                            <td>${data.description}</td>
                            <td>${data.insurance_co}</td>
                            <td>${data.contact_person || 'N/A'}</td>
                            <td>${new Date(data.start_date).toLocaleDateString()}</td>
                            <td>${new Date(data.end_date).toLocaleDateString()}</td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="detachInsurance(${data.insurance_id})">Detach</button>
                            </td>
                        `;
                        
                        tbody.appendChild(row);
                    } else {
                        // If no valid data is returned, show a message
                        tbody.innerHTML = '<tr><td colspan="6">No insurance linked to this asset.</td></tr>';
                    }
                })
                .catch(error => console.error('Error fetching insurances:', error));
        }

        // Initial fetch of insurances linked to the asset
        fetchInsurances();

        fetch(`/insurance-data`)
            .then(response => response.json())
            .then(data => {
                const insuranceSelect = document.getElementById('insuranceSelect');
                insuranceSelect.innerHTML = ''; // Clear existing options

                data.forEach(insurance => {
                    const option = document.createElement('option');
                    option.value = insurance.insurance_id;
                    option.text = `${insurance.description} (${new Date(insurance.start_date).toLocaleDateString()} - ${new Date(insurance.end_date).toLocaleDateString()})`;
                    insuranceSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching insurances:', error));

        function linkInsurance() {
            const insuranceId = document.getElementById('insuranceSelect').value;

            // Make an AJAX request to link the insurance with the asset
            fetch(`/link-insurance`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ asset_id: assetId, insurance_id: insuranceId }),
            })
            .then(response => response.json())
            .then(data => {
                swal(
                    "Success!", "Insurance linked successfully!", "success"           
                )
                fetchInsurances(); // Refresh the insurance table
                var myModalEl = document.getElementById('linkInsuranceModal');
                var modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
            })
            .catch(error => console.error('Error linking insurance:', error));
        }

        function detachInsurance(insuranceId) {
            if (confirm('Are you sure you want to detach this insurance?')) {
                fetch(`/insurance/${insuranceId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    swal(
                        "Success!", "Insurance successfully unlinked!", "success"           
                    )
                    fetchInsurances(); // Refresh the insurance table
                })
                .catch(error => console.error('Error detaching insurance:', error));
            }
        }

        // Expose the functions globally if they need to be called from HTML
        window.linkInsurance = linkInsurance;
        window.detachInsurance = detachInsurance;
    });
</script>
