function play(userChoice) {
    // Send the user's choice to the server for processing
    fetch('process.php', {
        method: 'POST',
        body: JSON.stringify({ userChoice: userChoice }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Update the result on the client-side
        document.getElementById('result').innerText = data.result;
    })
    .catch(error => console.error(error));
}
