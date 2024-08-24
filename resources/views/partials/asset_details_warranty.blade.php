<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <label class="eventtitle">Warranty</label>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#warrantyModal">
                + Add New
            </button>
        </div>
    </div>
</div>

<!-- Modal for adding warranty -->
<div class="modal fade" id="warrantyModal" tabindex="-1" aria-labelledby="warrantyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warrantyModalLabel">Asset Warranty</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields for the warranty -->
                <form id="addWarrantyForm">
                    <div class="mb-3">
                        <label for="warrantyLength" class="form-label">Length (Months)</label>
                        <input type="number" class="form-control" id="warrantyLength" placeholder="Enter length in months" required>
                    </div>
                    <div class="mb-3">
                        <label for="warrantyExpirationDate" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control" id="warrantyExpirationDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="warrantyNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="warrantyNotes" rows="3" placeholder="Enter any notes"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addWarranty()">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for editing warranty -->
<div class="modal fade" id="editWarrantyModal" tabindex="-1" aria-labelledby="editWarrantyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editWarrantyModalLabel">Edit Warranty</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form fields to edit warranty -->
                <form id="editWarrantyForm">
                    <input type="hidden" id="warrantyId" />
                    <div class="mb-3">
                        <label for="editWarrantyLength" class="form-label">Length</label>
                        <input type="number" class="form-control" id="editWarrantyLength" placeholder="Enter length in months" required>
                    </div>
                    <div class="mb-3">
                        <label for="editWarrantyExpirationDate" class="form-label">Expiration Date</label>
                        <input type="date" class="form-control" id="editWarrantyExpirationDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="editWarrantyNotes" class="form-label">Notes</label>
                        <textarea class="form-control" id="editWarrantyNotes" rows="3" placeholder="Enter any notes"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="updateWarranty()">Save Changes</button>
                <button type="button" class="btn btn-danger" onclick="deleteWarranty()">Delete</button>
            </div>
        </div>
    </div>
</div>


<div class="eventdatas">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Active</th>
                <th>Expiration Date</th>
                <th>Length</th>
                <th style="text-align: center;">Notes</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody id="warranty-table-body">
            <!-- Warranty rows will be populated here by JavaScript -->
        </tbody>
    </table>
</div>

<script>
    function addWarranty() {
        const length = document.getElementById('warrantyLength').value;
        const expirationDate = document.getElementById('warrantyExpirationDate').value;
        const notes = document.getElementById('warrantyNotes').value;
        const assetId = {{ $encrypt_asset_id }};

        // Make an AJAX request to add the warranty
        fetch(`/add-warranty`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                asset_id: assetId,
                length: length,
                expiration_date: expirationDate,
                warranty_notes: notes,
            }),
        })
        .then(response => response.json())
        .then(data => {
            swal(
                "Success!", "Warranty added successfully!", "success"
            );
            // Close the modal
            var myModalEl = document.getElementById('warrantyModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
            // Optionally, refresh the warranty list
            fetchWarranties();
        })
        .catch(error => console.error('Error adding warranty:', error));
    }
    
    fetchWarranties();
    // Function to populate the warranty table
    function fetchWarranties() {
        const assetId = {{ $encrypt_asset_id }};
        fetch(`/get-warranties/${assetId}`)
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('warranty-table-body');
                tbody.innerHTML = ''; // Clear existing rows

                data.forEach(warranty => {
                    const row = document.createElement('tr');
                    
                    row.innerHTML = `
                        <td>${warranty.delete ? '<span style="color: green;">&#10004;</span>' : '<span style="color: red;">&#10008;</span>'}</td>
                        <td>${new Date(warranty.expiration_date).toLocaleDateString()}</td>
                        <td>${warranty.length} months</td>
                        <td style="text-align: center;">${warranty.warranty_notes ? '<i class="fa fa-info-circle" title="' + warranty.warranty_notes + '"></i>' : 'N/A'}</td>
                        <td style="text-align: center;">
                            <button type="button" class="btn btn-success btn-sm" onclick="editWarranty(${warranty.warranty_id})">View/Edit</button>
                        </td>
                    `;
                    
                    tbody.appendChild(row);
                });
            })
            .catch(error => console.error('Error fetching warranties:', error));
    }

    // Function to edit a warranty
    function editWarranty(warrantyId) {
        fetch(`/warranties/${warrantyId}`)
            .then(response => response.json())
            .then(warranty => {
                document.getElementById('warrantyId').value = warranty.warranty_id;
                document.getElementById('editWarrantyLength').value = warranty.length;
                document.getElementById('editWarrantyExpirationDate').value = warranty.expiration_date;
                document.getElementById('editWarrantyNotes').value = warranty.warranty_notes;

                // Show the edit modal
                var myModal = new bootstrap.Modal(document.getElementById('editWarrantyModal'));
                myModal.show();
            })
            .catch(error => console.error('Error fetching warranty:', error));
    }

    // Function to update warranty details
    function updateWarranty() {
        const warrantyId = document.getElementById('warrantyId').value;
        const length = document.getElementById('editWarrantyLength').value;
        const expirationDate = document.getElementById('editWarrantyExpirationDate').value;
        const notes = document.getElementById('editWarrantyNotes').value;

        fetch(`/warranties/${warrantyId}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                length: length,
                expiration_date: expirationDate,
                warranty_notes: notes,
            }),
        })
        .then(response => response.json())
        .then(data => {
            swal(
                "Success!", "Warranty updated successfully!", "success"
            );
            // Hide the modal and refresh the warranty list
            var myModalEl = document.getElementById('editWarrantyModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
            fetchWarranties(); // Refresh the warranty table
        })
        .catch(error => console.error('Error updating warranty:', error));
    }

    function deleteWarranty() {
        const warrantyId = document.getElementById('warrantyId').value;

        if (confirm('Are you sure you want to delete this warranty?')) {
            fetch(`/warranty/${warrantyId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                swal(
                    "Deleted!", "The warranty has been deleted.", "success"
                )
                
                var myModalEl = document.getElementById('editWarrantyModal');
                var modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
                fetchWarranties();
            })
            .catch(error => console.error('Error deleting warranty:', error));
        }
    }
</script>
