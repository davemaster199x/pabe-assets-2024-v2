<div class="row">
    <div class="col-2">
        <label>Events</label>
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
                <form class="form-repair theme-form">
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
                const repairEvents = item.repairevents;
                
                repairEvents.forEach(repair => {
                    const row = document.createElement('div');
                    row.classList.add('row');

                    row.innerHTML = `
                        <div class="col-2">
                            <label>Schedule Date</label><br />
                            <label>${repair.sched_date}</label>
                        </div>
                        <div class="col-2">Repair</div>
                        <div class="col-2">
                            <label>Assigned to</label><br />
                            <label>${repair.assigned_to}</label>
                        </div>
                        <div class="col-2">
                            <label>Completion Date</label><br />
                            <label>${repair.date_completed}</label>
                        </div>
                        <div class="col-2">
                            <label>Cost of Repairs</label><br />
                            <label>${repair.repair_cost}</label>
                        </div>
                        <div class="col-2">
                            <label>Notes</label><br />
                            <label>${repair.repair_notes}</label>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary edit-button" type="button" data-bs-toggle="modal" data-bs-target=".modalRepair" data-repair='${JSON.stringify(repair)}'>Edit</button>
                        </div>
                    `;

                    eventDatasContainer.appendChild(row);
                });
            });
        })
        .catch(error => console.error('Error fetching data:', error));

    document.querySelector('.eventdatas').addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-button')) {
            const repairData = JSON.parse(event.target.getAttribute('data-repair'));
            document.getElementById('re_schedule_date').value = repairData.sched_date;
            document.getElementById('re_assigned_to').value = repairData.assigned_to;
            document.getElementById('re_date_completed').value = repairData.date_completed;
            document.getElementById('re_cost').value = repairData.repair_cost;
            document.getElementById('re_notes').value = repairData.repair_notes;
            document.getElementById('repair_id').value = repairData.repair_id;
        }
    });

    document.querySelector('.form-repair').addEventListener('submit', function(event) {
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
            alert('Repair event added successfully!');
            location.reload();
        })
        .catch(error => console.error('Error updating repair event:', error));
    });
});
</script>

