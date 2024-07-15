<script>

    function fetchLastID()
    {
        fetch('/assets/last-id')
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(function(data) {
                // Assuming data is an array of objects with id and site_name properties
                var assetsid = document.getElementById('assets_tag_id');

                // Clear existing options (if any)
                assetsid.value = data.last_id;

            })
            .catch(function(error) {
                console.error('Error fetching data:', error);
            });
    }

        setInterval(() => {
            fetchLastID();
        }, 5000);
        fetchLastID();
   
    </script>