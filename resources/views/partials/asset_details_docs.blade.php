<style>
label.doctitle {
        font-family: 'Roboto';
        font-weight: 900;
        font-size: 150%;
    }
    table.table.table-border-vertical.table-border-horizontal {
        font-size: 75%;
        font-family: 'Rubik';
    }
    .document-row {
        display: flex;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
    .description, .file-name, .upload-date, .uploaded-by  {
        flex: 1;
        margin: 0 10px;
    }
    .modal-content {
        border-radius: 8px;
    }
    .modal-header {
        background-color: #f8d7da;
        color: #721c24;
    }
    .modal-footer {
        justify-content: flex-end;
    }
</style>
<div class="row">
    <div class="col-2">
        <label class="doctitle">Documents</label>
    </div>
    <div class="col-10">
    <button class="btn btn-primary edit-button pull-right" type="button" data-bs-toggle="modal" data-bs-target=".modalAddDoc" >Add Doc</button>
    </div>
</div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>File Type</th>
                <th>File Name</th>
                <th>Date Uploaded</th>
                <th>User</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="docs-table-body">

        </tbody>
    </table>


<div class="docdatas"></div>



<!-- Upload Document Modal -->
<div id="modalAddDoc" class="modal fade modalAddDoc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Upload Document to Asset</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" class="form-docs theme-form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input class="form-control" type="hidden" id="asset_id" name="asset_id" value="{{ $encrypt_asset_id }}">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" id="doc_description" name="description">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Document *</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="fileInput" name="document">
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

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmDetachModal" tabindex="-1" role="dialog" aria-labelledby="confirmDetachLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDetachLabel">Confirm Detach</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to detach this document?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDetachBtn">Detach</button>
            </div>
        </div>
    </div>
</div>

<script>
    let documentIdToDetach = null;

    document.addEventListener('DOMContentLoaded', function() {
        loadDocuments();

        document.getElementById('uploadForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch('{{ route('upload.document') }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);

                    let modalElement = document.getElementById('modalAddDoc');
                    let modalInstance = bootstrap.Modal.getInstance(modalElement);
                    modalInstance.hide();

                    document.getElementById('uploadForm').reset();
                    loadDocuments();
                } else {
                    alert('Upload failed.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred.');
            });
        });

        document.getElementById('confirmDetachBtn').addEventListener('click', function() {
            if (documentIdToDetach !== null) {
                fetch(`/documents/${documentIdToDetach}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        loadDocuments(); // Reload documents after successful deletion
                    } else {
                        alert('Failed to detach document.');
                    }
                })
                .catch(error => console.error('Error detaching document:', error));

                documentIdToDetach = null;

                let modalElement = document.getElementById('confirmDetachModal');
                let modalInstance = bootstrap.Modal.getInstance(modalElement);
                modalInstance.hide();
            }
        });
    });

    function loadDocuments() {
       /* fetch('{{ route('documents.get') }}')
            .then(response => response.json())
            .then(documents => {
                let docContainer = document.querySelector('.docdatas');
                docContainer.innerHTML = ''; // Clear the container

                documents.forEach(document => {
                    let documentHtml = `
                        <div class="document-row">
                            <div class="description">${document.description}</div>
                            <div class="file-type">${document.file_type}</div>
                            <div class="file-name">${document.file_name}</div>
                            <div class="upload-date">${new Date(document.created_at).toLocaleString()}</div>
                            <div class="uploaded-by">${document.user.name}</div>
                            <div class="actions">
                                <a href="/documents/download/${document.docs_id}" class="btn btn-success">Download</a>
                                <button class="btn btn-danger" onclick="detachDocument(${document.docs_id})">Detach</button>
                            </div>
                        </div>
                    `;

                    docContainer.insertAdjacentHTML('beforeend', documentHtml);
                });
            })
            .catch(error => console.error('Error loading documents:', error));
*/

           // Assuming $encrypt_asset_id is correctly passed as a valid JavaScript variable
var assetId = "{{ $encrypt_asset_id }}"; // Ensure this outputs the correct ID

fetch('/documents/get2/' + assetId)
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('docs-table-body');
        tbody.innerHTML = ''; // Clear existing rows
        
        if (data.length > 0) {
            data.forEach(document => {
                let documentHtml = `
                        <td class="description">${document.description || 'N/A'}</td>
                        <td class="file-type">${document.file_type || 'N/A'}</td>
                        <td class="file-name">${document.file_name || 'N/A'}</td>
                        <td class="upload-date">${new Date(document.created_at).toLocaleString()}</td>
                        <td class="uploaded-by">${document.user ? document.user.name : 'Unknown'}</td>
                        <td class="actions">
                            <a href="/documents/download/${document.docs_id}" class="btn btn-success">Download</a>
                            <button class="btn btn-danger" onclick="detachDocument(${document.docs_id})">Detach</button>
                        </td>
                    
                `;
                
                // Append the row to the tbody
                tbody.insertAdjacentHTML('beforeend', documentHtml);
            });
        } else {
            // If no valid data is returned, show a message
            tbody.innerHTML = '<tr><td colspan="6">No Documents Available.</td></tr>';
        }
    })
    .catch(error => console.error('Error fetching documents:', error));

        

    }

    function detachDocument(documentId) {
        documentIdToDetach = documentId;
        let modal = new bootstrap.Modal(document.getElementById('confirmDetachModal'));
        modal.show();
    }
</script>

