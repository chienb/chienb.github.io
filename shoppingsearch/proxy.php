// Enter your Google API key here
// you can obtain it from the API console
// $key = 'YOUR API KEY GOES HERE';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {

    $search = urlencode($_POST['search']);
    $url = 'https://api.semantics3.com/v1/products?q={"search":"' . $search . '"}';

    echo file_get_contents($url);
}