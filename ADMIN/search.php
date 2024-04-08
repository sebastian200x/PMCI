<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Search</title>
    <style>
      .search-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .search-input {
        width: 300px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-right: 10px;
    }
    .search-results {
        margin-top: 20px;
    }
    .search-results ul {
        list-style-type: none;
        padding: 0;
    }
    .search-results li {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }


    .navbar a {
  /* Style for inactive page links */
  color: black;
  text-decoration: none;
}

.navbar a.active {
  /* Style for active page link */
  color: blue;
  font-weight: bold;
}
</style>
</head>
<body>




    <div class="search-container">
      <input type="text" id="searchInput" class="search-input" placeholder="Search...">
  </div>
  <div class="search-results" id="searchResults"></div>

  <script>
    document.getElementById('searchInput').addEventListener('input', function() {
      var query = this.value.trim();
      var searchResults = document.getElementById('searchResults');

  // Clear previous search results
  searchResults.innerHTML = '';

  // Perform search logic (e.g., fetch data from server)
  // For demonstration purposes, we'll simulate search results here
  var results = [
  'Result 1',
  'Result 2',
  'Result 3'
  ];

  if (query !== '') {
    results.forEach(function(result) {
      if (result.toLowerCase().includes(query.toLowerCase())) {
        var li = document.createElement('li');
        li.textContent = result;
        searchResults.appendChild(li);
    }
});
} else {
    var li = document.createElement('li');
    li.textContent = 'No results found';
    searchResults.appendChild(li);
}
});
</script>
</body>
</html>
