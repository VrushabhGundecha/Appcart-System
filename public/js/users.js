document.addEventListener('DOMContentLoaded', function () {
    // Initialize variables for pagination and search
    let currentPage = 1;
    let lastPage = {{ $users->lastPage() }};
    let searchInput = document.getElementById('search');
    let searchButton = document.getElementById('searchButton');
    let usersTableBody = document.getElementById('usersTableBody');

    // Function to fetch and display users
    function fetchUsers(page = 1, search = '') {
        // AJAX request to fetch users
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update table body with fetched users
                    usersTableBody.innerHTML = xhr.responseText;
                } else {
                    console.error('Error fetching users:', xhr.statusText);
                }
            }
        };
        xhr.open('GET', `/users?page=${page}&search=${search}`, true);
        xhr.send();
    }

    // Initial fetch of users on page load
    fetchUsers();

    // Event listener for search button click
    searchButton.addEventListener('click', function () {
        let searchValue = searchInput.value.trim();
        fetchUsers(1, searchValue);
    });

    // Event listener for pagination links click
    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('page-link')) {
            event.preventDefault();
            let pageNumber = parseInt(event.target.getAttribute('href').split('page=')[1]);
            fetchUsers(pageNumber, searchInput.value.trim());
        }
    });
});