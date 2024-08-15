<style>
label.eventtitle {
    font-family: 'Roboto';
    font-weight: 900;
    font-size: 150%;
}
table.table.table-border-vertical.table-border-horizontal {
    font-size: 75%;
    font-family: 'Rubik';
}


</style>
<div class="row">
    <div class="col-2">
        <label class="eventtitle">Events</label>
    </div>
</div>

<div class="eventdatas"></div>

<div class="modal fade modalRepair" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Repair</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-repair-edit theme-form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" id="repair_id" name="repair_id">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Schedule Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" id="re_schedule_date" name="re_schedule_date">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Assigned to</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="re_assigned_to" name="re_assigned_to">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Date Completed</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" id="re_date_completed" name="re_date_completed">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Repair Cost</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">₱</span>
                                            <input class="form-control" type="text" id="re_cost" name="re_cost">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Notes</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="re_notes" name="re_notes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function getAssetIdFromUrl() {
        const url = window.location.href;
        const parts = url.split('/');
        return parts[parts.length - 1];
    }

    const assetId = getAssetIdFromUrl();
    const apiUrl = `/asset_events/${assetId}`;

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        const eventDatasContainer = document.querySelector('.eventdatas');

        data.forEach(item => {
            const assetEvent = item.assetevent;
            const EEvents = item.events;
            
            const tableContainer = document.createElement('div');
            tableContainer.classList.add('table-responsive'); // Optional class for styling
            
            const headhtml = `
                <table class="table table-border-vertical table-border-horizontal">
                    <thead>
                        <!-- Add table headers if needed -->
                    </thead>
                    <tbody>
            `;
            
            tableContainer.innerHTML = headhtml;
            const tbody = tableContainer.querySelector('tbody');

            if (Array.isArray(EEvents)) {
                EEvents.forEach(event => {
                    const row = document.createElement('tr');

                    if (event.repair_id) {
                        row.innerHTML = `
                            <td>
                                <label>Schedule Date</label><br />
                                <label>${event.sched_date || ''}</label>
                            </td>
                            <td>
                                Repair
                            </td>
                            <td>
                                <label>Assigned to</label><br />
                                <label>${event.assigned_to || ''}</label>
                            </td>
                            <td>
                                <label>Completion Date</label><br />
                                <label>${event.date_completed || ''}</label>
                            </td>
                            <td>
                                <label>Cost of Repairs</label><br />
                                <label>${event.repair_cost || ''}</label>
                            </td>
                            <td>
                                <label>Notes</label><br />
                                <label>${event.repair_notes || ''}</label>
                            </td>
                            <td>
                                <button class="btn btn-primary edit-button" type="button" data-bs-toggle="modal" data-bs-target=".modalRepair" data-repair='${JSON.stringify(event)}'>Edit</button>
                            </td>
                        `;
                    } else if (event.dispose_id) {
                        row.innerHTML = `
                            <td>
                                <label>Date Disposed</label><br />
                                <label>${event.date_disposed || ''}</label>
                            </td>
                            <td>
                                Dispose
                            </td>
                            <td>
                                <label>Disposed To</label><br />
                                <label>${event.dispose_to || ''}</label>
                            </td>
                            <td colspan="3">
                                <label>Notes</label><br />
                                <label>${event.dispose_notes || ''}</label>
                            </td>
                            <td>
                                <button class="btn btn-primary edit-button" type="button" data-bs-toggle="modal" data-bs-target=".modalRepair" data-repair='${JSON.stringify(event)}'>Edit</button>
                            </td>
                        `;
                    }
                    else if (event.checkin_id) {
                        row.innerHTML = `
                            <td>
                                <label>Date Disposed</label><br />
                                <label>${event.date_disposed || ''}</label>
                            </td>
                            <td>
                                Check in
                            </td>
                            <td>
                                <label>Disposed To</label><br />
                                <label>${event.dispose_to || ''}</label>
                            </td>
                            <td colspan="3">
                                <label>Notes</label><br />
                                <label>${event.dispose_notes || ''}</label>
                            </td>
                            <td>
                                <button class="btn btn-primary edit-button" type="button" data-bs-toggle="modal" data-bs-target=".modalRepair" data-repair='${JSON.stringify(event)}'>Edit</button>
                            </td>
                        `;
                    }
                    else if (event.checkout_id) {
                        row.innerHTML = `
                            <td>
                                <label>Date Disposed</label><br />
                                <label>${event.date_disposed || ''}</label>
                            </td>
                            <td>
                                Check Out
                            </td>
                            <td>
                                <label>Disposed To</label><br />
                                <label>${event.dispose_to || ''}</label>
                            </td>
                            <td colspan="3">
                                <label>Notes</label><br />
                                <label>${event.dispose_notes || ''}</label>
                            </td>
                            <td>
                                <button class="btn btn-primary edit-button" type="button" data-bs-toggle="modal" data-bs-target=".modalRepair" data-repair='${JSON.stringify(event)}'>Edit</button>
                            </td>
                        `;
                    }

                    tbody.appendChild(row);
                });
            } else {
                // Handle the case where EEvents is a string (e.g., '1')
                const row = document.createElement('tr');
                row.innerHTML = `
                   <!-- <td colspan="7">No events available.</td> -->
                `;
                tbody.appendChild(row);
            }

            const endhtml = `
                    </tbody>
                </table>
            `;

            // Close the table
            tableContainer.innerHTML += endhtml;

            // Append the table container to the event data container
            eventDatasContainer.appendChild(tableContainer);
        });
    })
    .catch(error => console.error('Error fetching data:', error));




    document.querySelector('.eventdatas').addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-button')) {
            const repairData = JSON.parse(event.target.getAttribute('data-repair-edit'));
            document.getElementById('re_schedule_date').value = repairData.sched_date;
            document.getElementById('re_assigned_to').value = repairData.assigned_to;
            document.getElementById('re_date_completed').value = repairData.date_completed;
            document.getElementById('re_cost').value = repairData.repair_cost;
            document.getElementById('re_notes').value = repairData.repair_notes;
            document.getElementById('repair_id').value = repairData.repair_id;
        }
    });

    document.querySelector('.form-repair-edit').addEventListener('submit', function(event) {
        event.preventDefault();

        const repairId = document.getElementById('repair_id').value;
        const formData = new FormData(event.target);
        const updateUrl = `/update_repair/${repairId}`;
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(updateUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': token
            }
        })
        .then(response => response.json())
        .then(data => {
            alert('Repair event updated successfully!');
            location.reload();
        })
        .catch(error => console.error('Error updating repair event:', error));
    });
});
</script>

